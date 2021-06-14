<?php


class Admin extends Controller
{
    public function index()
    {
        if (AuthManager::isAdmin()) {
            $data['judul'] = 'Dashboard Admin';
            $data['total_events'] = $this->model("EventsModel")->countAllEvents();
            $data['upcoming_events'] = $this->model("EventsModel")->countEventsWhereStatus(1);
            $data['ongoing_events'] = $this->model("EventsModel")->countEventsWhereStatus(2);
            $data['finished_events'] = $this->model("EventsModel")->countEventsWhereStatus(3);
            $data['donation'] = $this->model("DonationsModel")->sumValidDonations();
            $this->view('admin/index', $data);
        } else {
            $this->view('error/403');
        }
    }

    public function events()
    {
        if (AuthManager::isAdmin()) {
            $data['judul'] = 'Semua Event';
            $data['events'] = $this->model("EventsModel")->getAllEvents();
            $this->view('admin/all_events', $data);
        } else {
            $this->view('error/403');
        }
    }

    public function add_event()
    {
        if (AuthManager::isAdmin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $this->add_new_event();
            } else {
                $data['judul'] = 'Tambah Event Baru';
                $data['plants'] = $this->model("PlantsModel")->getAllPlants();
                $this->view('admin/add_event', $data);
            }
        } else {
            $this->view('error/403');
        }
    }

    private function add_new_event()
    {
        if (!array_key_exists("event_plants", $_POST)) {
            header('Location: ' . BASEURL . 'admin/add_event');
        }
        $data['event_name'] = $_POST['event_name'];
        $data['event_location'] = $_POST['event_location'];
        $date = $_POST['event_date'];
        $time = $_POST['event_time'];
        $data['event_datetime'] = $date . " " . $time . ":00";
        $data['event_description'] = $_POST['event_description'];
        var_dump($_POST);
        $insert_event = $this->model("EventsModel")->addEvent($data);
        if ($insert_event > 0) {
            foreach ($_POST['event_plants'] as $plant) {
                $this->model("EventsPlantsModel")->addPlantsForEvent($insert_event, (int)$plant);
            }
            SweetAlert::setAlert('Berhasil!', "Event berhasil ditambahkan!", 'success');
            header('Location: ' . BASEURL . 'admin/events');
        }
    }

    public function update_event($id)
    {
        if (AuthManager::isAdmin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $this->post_update_event();
            } else {
                $data['judul'] = "Update Event";
                $data['plants'] = $this->model("PlantsModel")->getAllPlants();
                $data['event'] = $this->model("EventsModel")->getEventById((int)$id);
                if ($data['event']) {
                    $data['selected_plants'] = array();
                    $selected_plants = $this->model("EventsPlantsModel")->getPlantsFromEventId((int)$id);
                    foreach ($selected_plants as $plant) {
                        array_push($data['selected_plants'], $plant['plant_id']);
                    }
                    $this->view('admin/update_event', $data);
                } else {
                    $this->view('error/404');
                }
            }
        } else {
            $this->view('error/403');
        }
    }

    private function post_update_event()
    {
        $event_id = (int)$_POST['event_id'];

        $data['event_id'] = $event_id;
        $data['event_name'] = $_POST['event_name'];
        $data['event_location'] = $_POST['event_location'];
        $data['event_description'] = $_POST['event_description'];
        $date = $_POST['event_date'];
        $time = $_POST['event_time'];
        $data['event_datetime'] = $date . " " . $time . ":00";
        $data['event_status'] = (int)$_POST['event_status'];

        $this->model("EventsModel")->updateEvent($data);

        $get_old_plants = $this->model("EventsPlantsModel")->getPlantsFromEventId($event_id);
        $old_plants = array();
        foreach ($get_old_plants as $plant) {
            array_push($old_plants, (int)$plant['plant_id']);
        }
        $get_new_plants = $_POST['event_plants'];
        $new_plants = array();
        foreach ($get_new_plants as $plant) {
            array_push($new_plants, (int)$plant);
        }
        $new_plants_to_add = array_diff($new_plants, $old_plants);
        if (!empty($new_plants_to_add)) {
            $old_plants_to_remove = array_diff($old_plants, $new_plants);
            foreach ($old_plants_to_remove as $old) {
                $this->model("EventsPlantsModel")->removePlantIdByEventId($event_id, $old);
            }
            foreach ($new_plants_to_add as $new) {
                $this->model("EventsPlantsModel")->addPlantsForEvent($event_id, $new);
            }
        }
        SweetAlert::setAlert('Berhasil!', "Event berhasil diperbarui!", 'success');
        header("Location: " . BASEURL . "admin/events");
    }

    public function donations()
    {
        if (AuthManager::isAdmin()) {
            $data['judul'] = "Semua Donasi";
            $data['donations'] = $this->model("DonationsModel")->getAllDonations();
            $this->view('admin/donations', $data);
        } else {
            $this->view('error/403');
        }
    }

    public function donation($id)
    {
        if (AuthManager::isAdmin()) {
            $data['judul'] = "Detail Donasi";
            $data['donation'] = $this->model("DonationsModel")->getDonationDetailById($id);
            if ($data['donation']) {
                $data['event'] = $this->model("EventsModel")->getEventById($data['donation']['event_id']);
                $data['plant'] = $this->model("PlantsModel")->getPlantById($data['donation']['plant_id']);
                $data['payment'] = $this->model("PaymentsModel")->getPaymentByDonationId($id);
                $this->view('admin/donation_detail', $data);
            } else {
                $this->view('error/404');
            }
        } else {
            $this->view('error/403');
        }
    }

    public function payments()
    {
        if (AuthManager::isAdmin()) {
            $data['judul'] = "Konfirmasi Pembayaran";
            $data['payments'] = $this->model("PaymentsModel")->getAllPayments();
            $this->view('admin/payments', $data);
        } else {
            $this->view('error/404');
        }
    }

    public function payment($id)
    {
        if (AuthManager::isAdmin()) {
            $data['judul'] = "Detail Pembayaran";
            $data['payment'] = $this->model("PaymentsModel")->getPaymentById($id);
            if ($data['payment']) {
                $this->view('admin/payment_detail', $data);
            } else {
                $this->view('error/404');
            }
        } else {
            $this->view('error/403');
        }

    }

    public function plants()
    {
        if (AuthManager::isAdmin()) {
            $data['judul'] = "Semua Tanaman";
            $data['plants'] = $this->model("PlantsModel")->getAllPlants();
            $this->view('admin/plants', $data);
        } else {
            $this->view('error/403');
        }
    }

    public function add_plant()
    {
        if (AuthManager::isAdmin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $this->add_new_plant();
            } else {
                $data['judul'] = "Semua Tanaman";
                $this->view('admin/add_plant', $data);
            }
        } else {
            $this->view('error/403');
        }
    }

    private function add_new_plant()
    {
        $data['name'] = $_POST['plant_name'];
        $data['price'] = $_POST['plant_price'];
        $insert_plant = $this->model("PlantsModel")->addNewPlant($data);
        if ($insert_plant > 0) {
            SweetAlert::setAlert('Berhasil!', "Tanaman berhasil ditambahkan!", 'success');
            header("Location: " . BASEURL . "admin/plants");
        } else {
            SweetAlert::setAlert('Error!', "Gagal menambahkan tanaman.", 'error');
            header("Location: ".BASEURL."admin/add_plant");
        }
    }

    public function update_plant($id)
    {
        if (AuthManager::isAdmin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $data['plant_id'] = (int)$_POST['plant_id'];
                $data['plant_name'] = $_POST['plant_name'];
                $data['plant_price'] = $_POST['plant_price'];
                $this->model("PlantsModel")->updatePlantById($data);
                SweetAlert::setAlert('Berhasil!', "Tanaman berhasil diperbarui!", 'success');
                header('Location: ' . BASEURL . 'admin/plants');
            } else {
                $data['judul'] = "Update Tanaman";
                $data['plant'] = $this->model("PlantsModel")->getPlantById($id);
                $this->view('admin/update_plant', $data);
            }
        } else {
            $this->view('error/403');
        }
    }

    public function confirm_payment()
    {
        if (AuthManager::isAdmin()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $payment = $this->model("PaymentsModel")->updatePaymentStatus($_POST['payment_id'], 2);
                $donation = $this->model("DonationsModel")->updateDonationStatus($_POST['donation_id'], 2);
                if ($payment && $donation) {
                    SweetAlert::setAlert('Berhasil!', "Pembayaran berhasil diverifikasi!", 'success');
                    header("Location: " . BASEURL . "admin/payments");
                } else {
                    SweetAlert::setAlert('Error!', "Gagal mengonfirmasi pembayaran", 'error');
                    header("Location: ".BASEURL."admin/payment/".$_POST['payment_id']);
                }
            } else {
                $this->view('error/405');
            }
        } else {
            $this->view('error/403');
        }
    }

    public function update_donation()
    {
        if (AuthManager::isAdmin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $donation = $this->model("DonationsModel")->updateDonationStatus($_POST['donation_id'], (int)$_POST['donation_status']);
                if ($donation) {
                    SweetAlert::setAlert('Sukses!', "Berhasil memperbarui donasi", 'success');
                    header("Location: " . BASEURL . "admin/donations");
                } else {
                    SweetAlert::setAlert('Error!', "Gagal memperbarui donasi", 'error');
                    header("Location: ".BASEURL."admin/donation/".$_POST['donation_id']);
                }
            } else {
                $this->view('error/405');
            }
        } else {
            $this->view('error/403');
        }
    }
}