<?php
class Booking {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Get statistics for Admin
    public function countTotalBookings() {
        $query = "SELECT COUNT(*) as total FROM bookings";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }

    // Fetch recent bookings joined with user and vehicle info
    public function getRecentBookings() {
        $query = "SELECT b.booking_id, up.full_name as customer, CONCAT(v.brand, ' ', v.model) as vehicle, b.booking_status 
                  FROM bookings b
                  JOIN user_profiles up ON b.customer_id = up.user_id
                  JOIN vehicles v ON b.vehicle_id = v.vehicle_id
                  ORDER BY b.created_at DESC LIMIT 5";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>