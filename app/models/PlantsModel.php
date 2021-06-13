<?php

class PlantsModel
{
    private $table = "plants";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPlants()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function addNewPlant($data)
    {
        $query = "INSERT INTO " . $this->table . " (name, price) VALUES (:name, :price)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('price', $data['price']);

        $this->db->execute();

        return $this->db->lastInsertId();
    }

    public function getPlantById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updatePlantById($data)
    {
        $query = "UPDATE " . $this->table . " SET name=:plant_name, price=:plant_price WHERE id=:plant_id";
        $this->db->query($query);
        $this->db->bind("plant_name", $data['plant_name']);
        $this->db->bind("plant_price", $data['plant_price']);
        $this->db->bind("plant_id", $data['plant_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

}
