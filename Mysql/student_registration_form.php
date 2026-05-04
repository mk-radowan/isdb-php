<?php
$conn = mysqli_connect("localhost", "root", "", "student_registration");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['submit'])) {
    $m_id = $_POST['id'];
    $m_name = $_POST['name'];
    $m_address = $_POST['address'];
    $m_contact = $_POST['contact'];


    $stmt = $conn->prepare("CALL student_info(?, ?, ?, ?)");
    $stmt->bind_param("isss", $m_id, $m_name, $m_address, $m_contact);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Data inserted successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Registration Form</title>
</head>

<body>
    <h2>Student Registration Form</h2>
    <form method="post" action="">
        <label>ID:</label><br>
        <input type="number" name="id" required><br><br>

        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Address:</label><br>
        <textarea name="address" required></textarea><br><br>

        <label>Contact No:</label><br>
        <input type="text" name="contact" required><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>