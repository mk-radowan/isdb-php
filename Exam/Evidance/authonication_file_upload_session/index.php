<?php
session_start();

if (isset($_SESSION['loggedin'])) {
    header("Location: upload.php");
    exit;
}

$error = "";
$msg = "";

// --- রেজিস্ট্রেশন লজিক ---
if (isset($_POST['register'])) {
    $u_id     = trim($_POST['u_id']);
    $u_name   = trim($_POST['name']);
    $u_email  = trim($_POST['email']);
    $u_pass   = $_POST['password'];
    $re_pass  = $_POST['re_password'];

    if ($u_pass !== $re_pass) {
        $error = "Passwords do not match!";
    } else {
        // ডাটা ফরম্যাট: user_id,password,name,email
        $user_data = $u_id . "," . $u_pass . "," . $u_name . "," . $u_email . PHP_EOL;

        // ফাইলে ডাটা সেভ করা
        file_put_contents("data.txt", $user_data, FILE_APPEND);
        $msg = "Registration Successful! Now Login with User ID.";
    }
}

// --- লগইন লজিক ---
if (isset($_POST['login'])) {
    $login_id = trim($_POST['login_id']);
    $login_pass = $_POST['login_pass'];

    if (file_exists("data.txt")) {
        $file = fopen("data.txt", "r");
        $valid = false;

        while ($line = fgets($file)) {
            $data = explode(",", trim($line));
            // $data[0] হলো User ID এবং $data[1] হলো Password
            if (isset($data[0]) && isset($data[1])) {
                if ($data[0] == $login_id && $data[1] == $login_pass) {
                    $valid = true;
                    break;
                }
            }
        }
        fclose($file);

        if ($valid) {
            $_SESSION['loggedin'] = $login_id;
            header("Location: upload.php");
            exit;
        } else {
            $error = "Invalid User ID or Password!";
        }
    } else {
        $error = "No users found. Please register first.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login & Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .auth-card {
            max-width: 450px;
            width: 100%;
            margin: auto;
            border: none;
            border-radius: 15px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card auth-card shadow-lg p-4">

            <ul class="nav nav-pills nav-justified mb-4" id="authTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#loginView">Login</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#regView">Register</button>
                </li>
            </ul>

            <?php if ($error) echo "<div class='alert alert-danger py-2 small text-center'>$error</div>"; ?>
            <?php if ($msg) echo "<div class='alert alert-success py-2 small text-center'>$msg</div>"; ?>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="loginView">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">User ID</label>
                            <input type="text" name="login_id" class="form-control" placeholder="Enter User ID" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="login_pass" class="form-control" placeholder="Enter Password" required>
                        </div>
                        <button name="login" class="btn btn-primary w-100">Sign In</button>
                    </form>
                </div>

                <div class="tab-pane fade" id="regView">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">User ID</label>
                            <input type="text" name="u_id" class="form-control" placeholder="Unique ID (e.g. fahim123)" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Confirm Pass</label>
                                <input type="password" name="re_password" class="form-control" required>
                            </div>
                        </div>
                        <button name="register" class="btn btn-success w-100">Create Account</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</body>

</html>