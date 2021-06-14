<?php


class User extends Controller
{
    public function index() {
        $data['judul'] = "Dashboard User";
        $data['donations'] = $this->model("DonationsModel")->getDonationsByUserId(AuthManager::getUserId());
        $this->view("user/index", $data);
    }

    public function donation($id) {
        $data['judul'] = "Detail Donasi";
        $data['donation'] = $this->model("DonationsModel")->getDonationDetailById($id);
        $data['event'] = $this->model("EventsModel")->getEventById($data['donation']['event_id']);
        $data['plant'] = $this->model("PlantsModel")->getPlantById($data['donation']['plant_id']);
        $data['payment'] = $this->model("PaymentsModel")->getPaymentByDonationId($id);
        $this->view("user/donation", $data);
    }
}