<?php
session_start();

include('navbar.php');

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Settings</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="main.php">Dashboard</a>
            <div class="navbar-nav">
                <a class="nav-link" href="main.php">Home</a>
                <a class="nav-link" href="profile.php">Profile</a>
                <a class="nav-link active" href="settings.php">Settings</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>সেটিংস ও অ্যাকশন</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card p-3">
                    <h5>পাসওয়ার্ড পরিবর্তন করুন</h5>
                    <form>
                        <input type="password" class="form-control mb-2" placeholder="বর্তমান পাসওয়ার্ড">
                        <input type="password" class="form-control mb-2" placeholder="নতুন পাসওয়ার্ড">
                        <button type="submit" class="btn btn-primary btn-sm">Update Password</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card p-3">
                    <h5>সিস্টেম প্রিফারেন্স</h5>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" id="darkMode">
                        <label class="form-check-label" for="darkMode">ডার্ক মোড এনাবল করুন</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">ইমেইল নোটিফিকেশন</label>
                    </div>
                    <button class="btn btn-success btn-sm mt-3">সেভ সেটিংস</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>