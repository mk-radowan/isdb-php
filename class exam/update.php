<?php include 'db_config.php';

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM students WHERE id=$id");
$data = $res->fetch_assoc();

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $sql = "UPDATE students SET name='$name', email='$email', contact='$contact', address='$address' WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: index.php");
    }
}
?>

<form method="post">
    <input type="text" name="name" value="<?php echo $data['name']; ?>"><br>
    <input type="email" name="email" value="<?php echo $data['email']; ?>"><br>
    <input type="text" name="contact" value="<?php echo $data['contact']; ?>"><br>
    <textarea name="address"><?php echo $data['address']; ?></textarea><br>
    <button type="submit" name="update">Update</button>
</form>