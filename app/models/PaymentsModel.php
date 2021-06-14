<?php


class PaymentsModel
{
    private $table = "payments";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPayment($data)
    {
        $query = "INSERT INTO " . $this->table . " (donation_id, amount, bank_name, bank_account) VALUES (:donation_id, :amount, :bank_name, :bank_account)";
        $this->db->query($query);
        $this->db->bind('donation_id', $data['donation_id']);
        $this->db->bind('amount', $data['total_price']);
        $this->db->bind('bank_name', $data['bank_name']);
        $this->db->bind('bank_account', $data['bank_account']);
        $this->db->execute();
        return $this->db->lastInsertId();
    }

    public function getPaymentByDonationId($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE donation_id=:donation_id";
        $this->db->query($query);
        $this->db->bind('donation_id', $id);
        return $this->db->single();
    }

    public function getAllPayments()
    {
        $query = "SELECT * FROM " . $this->table;
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getPaymentById($id)
    {
        $query = "SELECT * FROM ".$this->table." WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updatePaymentStatus($id, $status){
        $query = "UPDATE ".$this->table." SET status=:status WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('status', $status);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}