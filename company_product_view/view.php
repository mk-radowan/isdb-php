<?php
$conn = new mysqli("localhost", "root", "", "company");

// ডিলিট লজিক
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $conn->query("DELETE FROM products WHERE id=$id");
    header("location: view.php");
}

$sql = "SELECT p.*, b.name as brand_name, b.contact FROM products p JOIN brand b ON p.Brand_id = b.Id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Product List</title>
</head>

<body>
    <h2>Product Management List</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr bgcolor="#eee">
            <th>Serial</th>
            <th>Product Name</th>
            <th>Brand Name</th>
            <th>Contact</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php
        $sn = 1;
        while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $sn++ ?></td>
                <td><?= $row['Name'] ?></td>
                <td><?= $row['brand_name'] ?></td>
                <td><?= $row['contact'] ?></td>
                <td><img src="uploads/<?= $row['Product_image'] ?>" width="50"></td>
                <td>
                    <a href="single_view.php?id=<?= $row['id'] ?>">View</a> |
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="view.php?del_id=<?= $row['id'] ?>" onclick="return confirm('নিশ্চিত ডিলিট করবেন?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br><a href="index.php">Add New Product</a>
</body>

</html>