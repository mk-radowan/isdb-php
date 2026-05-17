<?php

require_once __DIR__ . '/../config/database.php';

class AuthController {

    // =========================
    // LOGIN PAGE
    // =========================
    public function showLogin() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Already logged in
        if (isset($_SESSION['user_id'])) {
            $this->redirectBasedOnRole($_SESSION['role']);
        }

        require_once __DIR__ . '/../views/login.php';
    }

    // =========================
    // PROCESS LOGIN
    // =========================
    public function processLogin() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $identity = trim($_POST['identity']);
            $password = trim($_POST['password']);

            $database = new Database();
            $db = $database->getConnection();

            $query = "SELECT * FROM users 
                      WHERE phone_number = :identity 
                      OR email = :identity 
                      LIMIT 1";

            $stmt = $db->prepare($query);
            $stmt->bindParam(':identity', $identity);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // CHANGED: plain text password comparison (no hashing)
            if ($user && $password === $user['password_hash']) {

                // Check active status
                if (!$user['is_active']) {

                    $error = "আপনার অ্যাকাউন্ট নিষ্ক্রিয় রয়েছে।";

                    require_once __DIR__ . '/../views/login.php';
                    return;
                }

                // Session store
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['role']    = $user['role'];
                $_SESSION['phone']   = $user['phone_number'];

                // Redirect
                $this->redirectBasedOnRole($user['role']);

            } else {

                $error = "ভুল ফোন নম্বর/ইমেইল অথবা পাসওয়ার্ড!";

                require_once __DIR__ . '/../views/login.php';
            }
        }
    }

    // =========================
    // REGISTER PAGE
    // =========================
    public function showRegister() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Already logged in
        if (isset($_SESSION['user_id'])) {

            header("Location: index.php?url=home");
            exit();
        }

        require_once __DIR__ . '/../views/register.php';
    }

    // =========================
    // PROCESS REGISTER
    // =========================
    public function processRegister() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $fullName    = trim($_POST['full_name']);
            $phoneNumber = trim($_POST['phone_number']);
            $email       = !empty($_POST['email']) ? trim($_POST['email']) : null;
            $idNumber    = trim($_POST['id_number']);
            $password    = trim($_POST['password']);

            $database = new Database();
            $db = $database->getConnection();

            try {

                // Check duplicate user
                $checkQuery = "SELECT user_id 
                               FROM users 
                               WHERE phone_number = :phone";

                if ($email) {
                    $checkQuery .= " OR email = :email";
                }

                $checkStmt = $db->prepare($checkQuery);

                $checkStmt->bindParam(':phone', $phoneNumber);

                if ($email) {
                    $checkStmt->bindParam(':email', $email);
                }

                $checkStmt->execute();

                if ($checkStmt->rowCount() > 0) {

                    $error = "এই মোবাইল নম্বর অথবা ইমেইল ইতোমধ্যে ব্যবহৃত হয়েছে।";

                    require_once __DIR__ . '/../views/register.php';
                    return;
                }

                // Begin transaction
                $db->beginTransaction();

                // CHANGED: storing plain text password (no hashing)
                $insert_password = $password;

                // Insert user
                $userQuery = "INSERT INTO users 
                              (phone_number, email, password_hash, role, is_active)
                              VALUES
                              (:phone, :email, :password, 'customer', 1)";

                $userStmt = $db->prepare($userQuery);

                $userStmt->bindParam(':phone', $phoneNumber);
                $userStmt->bindParam(':email', $email);
                $userStmt->bindParam(':password', $insert_password);

                $userStmt->execute();

                // New user ID
                $newUserId = $db->lastInsertId();

                // Insert profile
                $profileQuery = "INSERT INTO user_profiles
                                 (user_id, full_name)
                                 VALUES
                                 (:user_id, :full_name)";

                $profileStmt = $db->prepare($profileQuery);

                $profileStmt->bindParam(':user_id', $newUserId);
                $profileStmt->bindParam(':full_name', $fullName);

                $profileStmt->execute();

                // Insert verification
                $verifyQuery = "INSERT INTO identity_verification
                                (user_id, id_type, id_number, verification_status)
                                VALUES
                                (:user_id, 'NID', :id_number, 'pending')";

                $verifyStmt = $db->prepare($verifyQuery);

                $verifyStmt->bindParam(':user_id', $newUserId);
                $verifyStmt->bindParam(':id_number', $idNumber);

                $verifyStmt->execute();

                // Commit
                $db->commit();

                // Login session
                $_SESSION['user_id'] = $newUserId;
                $_SESSION['role']    = 'customer';
                $_SESSION['phone']   = $phoneNumber;

                // Redirect
                header("Location: index.php?url=home");
                exit();

            } catch (Exception $e) {

                if ($db->inTransaction()) {
                    $db->rollBack();
                }

                $error = "রেজিস্ট্রেশন ব্যর্থ হয়েছে: " . $e->getMessage();

                require_once __DIR__ . '/../views/register.php';
            }
        }
    }

    // =========================
    // LOGOUT
    // =========================
    public function logout() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();

        header("Location: index.php?url=login");
        exit();
    }

    // =========================
    // ROLE REDIRECT
    // =========================
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