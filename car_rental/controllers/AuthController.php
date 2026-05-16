<?php
require_once __DIR__ . '/../config/database.php';

class AuthController {
    
    // লগইন পেজ ভিউ করা
    public function showLogin() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // ইউজার অলরেডি লগইন থাকলে রিডাইরেক্ট করে দেওয়া
        if (isset($_SESSION['user_id'])) {
            $this->redirectBasedOnRole($_SESSION['role']);
        }
        require_once __DIR__ . '/../views/login.php';
    }

    // লগইন প্রসেস করা
    public function processLogin() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $identity = trim($_POST['identity']);
            $password = trim($_POST['password']);

            $database = new Database();
            $db = $database->getConnection();

            // আপনার SQL স্ট্রাকচার অনুযায়ী ফোন নম্বর অথবা ইমেইল যেকোনো একটি দিয়ে লগইনের সুবিধা
            $query = "SELECT * FROM users WHERE phone_number = :identity OR email = :identity LIMIT 1";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':identity', $identity);
            $stmt->execute();
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // পাসওয়ার্ড ভেরিফিকেশন (password_hash এর সাথে ম্যাচিং)
            if ($user && password_verify($password, $user['password_hash'])) {
                if (!$user['is_active']) {
                    $error = "আপনার অ্যাকাউন্টটি নিষ্ক্রিয় রয়েছে। অ্যাডমিনের সাথে যোগাযোগ করুন।";
                    require_once __DIR__ . '/../views/login.php';
                    return;
                }

                // সেশন ডেটা সেট করা
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['phone'] = $user['phone_number'];

                // রোল অনুযায়ী রিডাইরেক্ট
                $this->redirectBasedOnRole($user['role']);
            } else {
                $error = "ভুল ফোন নম্বর/ইমেইল অথবা পাসওয়ার্ড!";
                require_once __DIR__ . '/../views/login.php';
            }
        }
    }

    // লগআউট লজিক
    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header("Location: index.php?url=login");
        exit();
    }

    // রোল ভিত্তিক রিডাইরেকশন হেল্পার
    private function redirectBasedOnRole($role) {
        if ($role === 'admin' || $role === 'staff') {
            header("Location: index.php?url=admin/dashboard");
        } else {
            header("Location: index.php?url=home");
        }
        exit();
    }
}
?>