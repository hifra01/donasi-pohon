<?php


class EventsPlantsModel
{
    private $table = "events_plants";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPlantsFromEventId($event_id)
    {
        $query = "SELECT plant_id FROM " . $this->table . " WHERE event_id=:event_id";
        $this->db->query($query);
        $this->db->bind('event_id', $event_id);
        return $this->db->resultSet();
    }

    public function getPlantsNameFromEventId($event_id) {
        $query = "SELECT ep.plant_id, p.name FROM " . $this->table . " ep JOIN plants p ON ep.plant_id=p.id WHERE ep.event_id=:event_id";
        $this->db->query($query);
        $this->db->bind('event_id', $event_id);
        return $this->db->resultSet();
    }

    public function addPlantsForEvent($event_id, $plant_id)
    {
        $query = "INSERT INTO " . $this->table . " (event_id, plant_id) VALUES (:event_id, :plant_id)";
        $this->db->query($query);
        $this->db->bind('event_id', $event_id);
        $this->db->bind("plant_id", $plant_id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function removePlantIdByEventId($event_id, $plant_id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE event_id=:event_id AND plant_id=:plant_id";
        $this->db->query($query);
        $this->db->bind('event_id', $event_id);
        $this->db->bind('plant_id', $plant_id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}