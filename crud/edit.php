<?php
$db = mysqli_connect('localhost', 'root', '', 'crud');

$id = $name = $contact = $email = "";


if (isset($_GET['id'])) {
    $getid = $_GET['id'];
    $res = mysqli_query($db, "SELECT * FROM view WHERE id=$getid");
    $data = mysqli_fetch_assoc($res);
    if ($data) {
        $id = $data['id'];
        $name = $data['name'];
        $contact = $data['contact'];
        $email = $data['email'];
    }
}


if (isset($_POST['update'])) {
    $u_id = $_POST['id'];
    $u_name = $_POST['name'];
    $u_email = $_POST['email'];
    $u_contact = $_POST['contact'];

    $sql = "UPDATE view SET name='$u_name', email='$u_email', contact='$u_contact' WHERE id='$u_id'";

    if (mysqli_query($db, $sql)) {
        header('location:index.php');
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit User</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 border border-warning p-4">
                <h3 class="text-center">Update Information</h3>
                <form action="edit.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>"><br>
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>"><br>
                    <label>Contact:</label>
                    <input type="text" name="contact" class="form-control" value="<?php echo $contact; ?>"><br>
                    <input type="submit" name="update" value="Update Data" class="btn btn-warning w-100">
                    <a href="index.php" class="btn btn-link">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>