<?php


class DonationsModel
{
    private $table = "donations";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addDonation($data)
    {
        $query = "INSERT INTO " . $this->table . " (user_id, event_id, plant_id, price, amount, total_price) VALUES (:user_id, :event_id, :plant_id, :price, :amount, :total_price)";
        $this->db->query($query);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('event_id', $data['event_id']);
        $this->db->bind('plant_id', $data['plant_id']);
        $this->db->bind('price', $data['price']);
        $this->db->bind('amount', $data['amount']);
        $this->db->bind('total_price', $data['total_price']);

        $this->db->execute();
        return $this->db->lastInsertId();
    }

    public function getDonationsByUserId($user_id)
    {
        $query = "SELECT d.id, d.event_id, e.name as event_name, p.name as plant_name, d.amount, d.total_price, d.status FROM " . $this->table . " d 
         JOIN events e ON d.event_id=e.id
         JOIN plants p ON d.plant_id=p.id
         WHERE d.user_id=:user_id";
        $this->db->query($query);
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();

    }

    public function getDonationDetailById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id=:donation_id";
        $this->db->query($query);
        $this->db->bind('donation_id', $id);
        return $this->db->single();
    }

    public function getAllDonations()
    {
        $query = "SELECT * FROM " . $this->table;
        $this->db->query($query);
        return $this->db->resultSet();

    }

    public function updateDonationStatus($id, $status)
    {
        $query = "UPDATE " . $this->table . " SET status=:status WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('status', $status);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function sumValidDonations()
    {
        $query = "SELECT SUM(total_price) total FROM " . $this->table . " WHERE status!=1";
        $this->db->query($query);
        return $this->db->single();
    }
}