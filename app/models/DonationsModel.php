<?php


class DonationsModel
{
    private $table = "donations";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
}