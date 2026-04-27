<?php
$db = mysqli_connect('localhost', 'root', '', 'crud');

if (isset($_POST['submit'])) {
    $n = $_POST['sname'];
    $e = $_POST['semail'];
    $c = $_POST['scontact'];

    $sql = "INSERT INTO view (name, email, contact) VALUES ('$n', '$e', '$c')";
    if (mysqli_query($db, $sql)) {
        header('location:index.php'); // Redirect to index after insert
        exit();
    } else {
        echo "Data not inserted: " . mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Insert Data</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 border border-primary p-4">
                <h3 class="text-center">Add New Student Data</h3>
                <form action="insert.php" method="POST">
                    <label>Name:</label>
                    <input type="text" name="sname" class="form-control" required><br>
                    <label>Email:</label>
                    <input type="email" name="semail" class="form-control" required><br>
                    <label>Contact:</label>
                    <input type="text" name="scontact" class="form-control" required><br>
                    <input type="submit" name="submit" value="Insert Data" class="btn btn-primary w-100">
                    <a href="index.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>