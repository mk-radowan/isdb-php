<?php include 'db_config.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $sql = "INSERT INTO students (name, email, contact, address) VALUES ('$name', '$email', '$contact', '$address')";

    if ($conn->query($sql)) {
        header("Location: index.php");
    }
}
?>

<form method="post">
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="text" name="contact" placeholder="Contact" required><br>
    <textarea name="address" placeholder="Address"></textarea><br>
    <button type="submit" name="submit">Submit</button>
</form>