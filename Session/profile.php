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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Profile</title>
</head>

<body>
    <?php include('navbar.php'); // নেভবারটি আলাদা ফাইলে রেখে ইনক্লুড করা ভালো 
    ?>

    <div class="container mt-5">
        <div class="card p-4 shadow-sm">
            <h3>আমার প্রোফাইল</h3>
            <hr>
            <p><strong>ইউজারনেম:</strong> <?php echo $_SESSION['username']; ?></p>
            <p><strong>পেশা:</strong> ওয়েব ডেভেলপার</p>
            <p><strong>দক্ষতা:</strong> আমি PHP, JavaScript এবং Bootstrap নিয়ে কাজ করতে পছন্দ করি। বর্তমানে আমি পিএইচপি দিয়ে একটি ডেটা ম্যানেজমেন্ট সিস্টেম তৈরির ওপর কাজ করছি।</p>
            <p><strong>লক্ষ্য:</strong> একজন দক্ষ ব্যাকএন্ড ডেভেলপার হওয়া এবং নতুন নতুন টেকনোলজি শেখা।</p>
        </div>
    </div>
</body>

</html>