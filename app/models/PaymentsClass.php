<?php


class PaymentsClass
{
    private $table = "payments";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
}