<?php


class Admin extends Controller
{
    public function index()
    {
        $data['judul'] = 'Dashboard Admin';
        $this->view('admin/index', $data);
    }

    public function all_events()
    {
        $data['judul'] = 'Semua Event';
        $data['events'] = $this->model("EventsModel")->getAllEvents();
        $this->view('admin/all_events', $data);
    }

    public function add_event()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->add_new_event();
        } else {
            $data['judul'] = 'Tambah Event Baru';
            $data['plants'] = $this->model("PlantsModel")->getAllPlants();
            $this->view('admin/add_event', $data);
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
            header('Location: ' . BASEURL . 'admin/all_events');
        }
    }

    public function update_event($id)
    {
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
            }
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

        header("Location: " . BASEURL . "admin/all_events");
    }

    public function donations()
    {
        $data['judul'] = "Semua Donasi";
        $this->view('admin/donations', $data);
    }

    public function confirm_donations()
    {
        $data['judul'] = "Konfirmasi Donasi";
        $this->view('admin/confirm_donation_list', $data);
    }

    public function plants()
    {
        $data['judul'] = "Semua Tanaman";
        $data['plants'] = $this->model("PlantsModel")->getAllPlants();
        $this->view('admin/plants', $data);
    }

    public function add_plant()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->add_new_plant();
        } else {
            $data['judul'] = "Semua Tanaman";
            $this->view('admin/add_plant', $data);
        }
    }

    private function add_new_plant()
    {
        $data['name'] = $_POST['plant_name'];
        $data['price'] = $_POST['plant_price'];
        $insert_plant = $this->model("PlantsModel")->addNewPlant($data);
        if ($insert_plant > 0) {
            header("Location: " . BASEURL . "admin/plants");
        } else {
            echo "Error";
        }
    }

    public function update_plant($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data['plant_id'] = (int)$_POST['plant_id'];
            $data['plant_name'] = $_POST['plant_name'];
            $data['plant_price'] = $_POST['plant_price'];
            $this->model("PlantsModel")->updatePlantById($data);
            header('Location: '.BASEURL.'admin/plants');
        } else {
            $data['judul'] = "Update Tanaman";
            $data['plant'] = $this->model("PlantsModel")->getPlantById($id);
            $this->view('admin/update_plant', $data);
        }
    }
}