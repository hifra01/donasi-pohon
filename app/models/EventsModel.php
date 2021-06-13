<?php


class EventsModel
{
    private $table = "events";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllEvents(){
        $query = "SELECT * FROM ".$this->table." ORDER BY id DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getEventById($id) {
        $query = "SELECT * FROM ".$this->table." WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addEvent($data)
    {
        $query = "INSERT INTO " . $this->table . " (name, location, description, start_date) VALUES (:name, :location, :description, :date)";
        $this->db->query($query);
        $this->db->bind('name', $data['event_name']);
        $this->db->bind('location', $data['event_location']);
        $this->db->bind('description', $data['event_description']);
        $this->db->bind('date', $data['event_datetime']);

        $this->db->execute();

        return $this->db->lastInsertId();
    }

    public function updateEvent($data)
    {
        $query = "UPDATE ".$this->table." SET name=:name, location=:location, description=:description, status=:status, start_date=:start_date WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('name', $data['event_name']);
        $this->db->bind('location', $data['event_location']);
        $this->db->bind('description', $data['event_description']);
        $this->db->bind('status', $data['event_status']);
        $this->db->bind('start_date', $data['event_datetime']);
        $this->db->bind('id', $data['event_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}