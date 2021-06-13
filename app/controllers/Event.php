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

        }
    }

    public function confirm_payment()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            var_dump($_POST);
        }
    }
}