<?php
class Vehicle {
    private $conn;
    private $table_name = "vehicles";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fetch all available vehicles for the front-end user
    public function getAvailableVehicles() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE status = 'available'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Count active vehicles for the admin dashboard
    public function countActive() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name . " WHERE status != 'maintenance'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }
}
?>