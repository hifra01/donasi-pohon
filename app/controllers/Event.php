<?php


class Event extends Controller
{
    public function index()
    {
        $data['judul'] = 'Semua Event';
        $data['events'] = $this->model("EventsModel")->getAllEvents();
        $this->view('event/index', $data);
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Event';
        $data['event'] = $this->model("EventsModel")->getEventById($id);
        $data['plants'] = $this->model("EventsPlantsModel")->getPlantsNameFromEventId($id);
        $this->view('event/detail', $data);
    }

    public function payment()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (AuthManager::isLoggedIn()) {
                $data['judul'] = "Pembayaran";
                $data['event_id'] = (int)$_POST['event_id'];
                $data['plant_id'] = (int)$_POST['plant_id'];
                $data['plant_amount'] = (int)$_POST['plant_amount'];
                $event = $this->model("EventsModel")->getEventById($data['event_id']);
                $data['event_name'] = $event['name'];

                $plant = $this->model("PlantsModel")->getPlantById($data['plant_id']);

                $data['plant_name'] = $plant['name'];
                $data['plant_price'] = (int)$plant['price'];
                $data['total_price'] = $data['plant_amount'] * $data['plant_price'];

                $this->view('event/payment', $data);
            } else {
                $this->view('error/403');
            }
        } else {
            $this->view('error/405');
        }
    }

    public function confirm_payment()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (AuthManager::isLoggedIn()) {
                $data['user_id'] = AuthManager::getUserId();
                $data['event_id'] = (int)$_POST['event_id'];
                $data['plant_id'] = (int)$_POST['plant_id'];
                $data['price'] = (int)$_POST['plant_price'];
                $data['amount'] = (int)$_POST['plant_amount'];
                $data['total_price'] = (int)$_POST['total_price'];
                $data['bank_name'] = $_POST['bank_name'];
                $data['bank_account'] = $_POST['bank_account'];
                $data['donation_id'] = $this->model("DonationsModel")->addDonation($data);
                if ($data['donation_id'] > 0) {
                    $payment_id = $this->model("PaymentsModel")->addPayment($data);
                    SweetAlert::setAlert('Sukses!', "Berhasil menambahkan donasi", 'success');
                    header("Location: " . BASEURL . "user");
                } else {
                    SweetAlert::setAlert('Error!', "Gagal membuat donasi", 'error');
                    header("Location: " . BASEURL . "event");
                }
            } else {
                $this->view('error/403');
            }

        } else {
            $this->view('error/405');
        }
    }
}