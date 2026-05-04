<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Main Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .welcome-section {
            margin-top: 50px;
            text-align: center;
        }

        .success-banner {
            color: #155724;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyPanel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-collapse navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="main.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php">Settings</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="index.php" class="btn btn-outline-danger btn-sm">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container welcome-section">
        <?php
        if (isset($_GET['status']) && $_GET['status'] == 'success') {
            echo "<div class='success-banner'>Login Success!</div>";
        }
        ?>

        <div class="card shadow-sm p-5">
            <h1>Welcome to the Dashboard</h1>
            <p class="text-secondary">আপনি এখন সিস্টেমের মূল পাতায় আছেন। উপরের মেনু বার থেকে বিভিন্ন পেজে নেভিগেট করতে পারেন।</p>
            <hr>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="p-3 border bg-white">🏠 <b>Home</b><br>সাম্প্রতিক আপডেট দেখুন</div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 border bg-white">👤 <b>Profile</b><br>ইউজার তথ্য পরিবর্তন করুন</div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 border bg-white">⚙️ <b>Settings</b><br>সিস্টেম কনফিগারেশন</div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>