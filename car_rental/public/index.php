<?php
/**
 * Front Controller & Routing Engine
 * Car Rental System
 */

// URL থেকে রুট প্যারামিটার নেওয়া
$route = isset($_GET['url']) ? trim($_GET['url'], '/') : 'home';

// পাথ ট্র্যাকিং সহজ করার জন্য রুট ডিরেক্টরি ডিফাইন করা
define('ROOT_DIR', __DIR__ . '/../');

// ==========================================
// ROUTING SYSTEM
// ==========================================
switch ($route) {

    // --------------------------------------
    // HOME PAGE
    // --------------------------------------
    case '':
    case 'home':
        require_once ROOT_DIR . 'controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;

    // --------------------------------------
    // LOGIN PAGE & PROCESS
    // --------------------------------------
    case 'login':
        require_once ROOT_DIR . 'controllers/AuthController.php';
        $controller = new AuthController();
        $controller->showLogin();
        break;

    case 'login/process':
        require_once ROOT_DIR . 'controllers/AuthController.php';
        $controller = new AuthController();
        $controller->processLogin();
        break;

    // --------------------------------------
    // REGISTER PAGE & PROCESS
    // --------------------------------------
    case 'register':
        require_once ROOT_DIR . 'controllers/AuthController.php';
        $controller = new AuthController();

        // মেথডটি ক্লাসের ভেতর আছে কিনা তা নিশ্চিত করা
        if (!method_exists($controller, 'showRegister')) {
            die("<div style='padding:20px; background:#fff5f5; color:#e53e3e; border:1px solid #fed7d7; font-family:sans-serif; margin:20px; rounded:5px;'>
                    <strong>Fatal Error:</strong> <code>showRegister()</code> method is missing inside your <code>controllers/AuthController.php</code> file. Please re-check the class structure.
                 </div>");
        }
        $controller->showRegister();
        break;

    case 'register/process':
        require_once ROOT_DIR . 'controllers/AuthController.php';
        $controller = new AuthController();

        if (!method_exists($controller, 'processRegister')) {
            die("<div style='padding:20px; background:#fff5f5; color:#e53e3e; border:1px solid #fed7d7; font-family:sans-serif; margin:20px; rounded:5px;'>
                    <strong>Fatal Error:</strong> <code>processRegister()</code> method is missing inside your <code>controllers/AuthController.php</code> file.
                 </div>");
        }
        $controller->processRegister();
        break;

    // --------------------------------------
    // LOGOUT
    // --------------------------------------
    case 'logout':
        require_once ROOT_DIR . 'controllers/AuthController.php';
        $controller = new AuthController();
        $controller->logout();
        break;

    // --------------------------------------
    // ADMIN DASHBOARD
    // --------------------------------------
    case 'admin':
    case 'admin/dashboard':
        require_once ROOT_DIR . 'controllers/AdminController.php';
        $controller = new AdminController();
        $controller->dashboard();
        break;

    // --------------------------------------
    // BOOKING API
    // --------------------------------------
    case 'booking/submit':
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'message' => 'Route working!'
        ]);
        break;

    // --------------------------------------
    // 404 NOT FOUND
    // --------------------------------------
    default:
        http_response_code(404);
        echo "
        <div style='text-align:center; margin-top:100px; font-family:sans-serif;'>
            <h1 style='color:#dc3545; font-size: 50px; margin-bottom:10px;'>404</h1>
            <h2 style='color:#333; margin-top:0;'>Page Not Found</h2>
            <p style='color:#666;'>The page you are looking for does not exist.</p>
            <a href='index.php?url=home' style='display:inline-block; padding:10px 20px; background:#007bff; color:#fff; text-decoration:none; border-radius:5px; margin-top:15px;'>Go Back Home</a>
        </div>
        ";
        break;
}