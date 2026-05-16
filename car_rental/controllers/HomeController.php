<?php
// __DIR__ ব্যবহার করে এক ধাপ পেছনে গিয়ে config/database.php লোড করা হচ্ছে
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Vehicle.php';

class HomeController {
    public function index() {
        $database = new Database();
        $db = $database->getConnection();
        $vehicleModel = new Vehicle($db);

        $availableCars = $vehicleModel->getAvailableVehicles();
        $locations = ['Uttara, Dhaka', 'Gulshan, Dhaka', 'Dhanmondi, Dhaka', 'Mirpur, Dhaka'];

        require_once __DIR__ . '/../views/home.php';
    }
}
?>