<?php

class UsersModel
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLogin($data)
    {
        $this->db->query('SELECT id, email, full_name, role FROM ' . $this->table . ' WHERE email=:email AND password=:password');
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', md5($data['password']));
        return $this->db->single();
    }

    public function isEmailExist($email)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email=:email');
        $this->db->bind('email', $email);
        $result = $this->db->single();
        if ($result) {
            return true;
        }
        return false;
    }

    public function addUser($data)
    {
        $this->db->query("INSERT INTO " . $this->table . " (full_name, email, password) VALUES (:full_name, :email, :pwd)");
        $this->db->bind('full_name', $data['full_name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('pwd', $data['password']);
        $this->db->execute();
        return $this->db->rowCount();
    }

}