<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="main.php">MyPanel</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link active" href="main.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="settings.php">Settings</a></li>
                </ul>
                <span class="navbar-text me-3 text-white">
                    স্বাগতম, <?php echo $_SESSION['username']; ?>!
                </span>
                <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="jumbotron p-5 bg-white shadow-sm rounded">
            <h1>হ্যালো, <?php echo $_SESSION['username']; ?>!</h1>
            <p class="lead">এটি আপনার ড্যাশবোর্ডের প্রধান পাতা। এখান থেকে আপনি আপনার প্রোফাইল এবং সেটিংস নিয়ন্ত্রণ করতে পারবেন।</p>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-3 text-center">
                        <h3>প্রোফাইল</h3>
                        <p>আপনার তথ্য দেখতে প্রোফাইল পেজে যান।</p>
                        <a href="profile.php" class="btn btn-primary">Go Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>