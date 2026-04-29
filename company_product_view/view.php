<?php
$conn = new mysqli("localhost", "root", "", "company");

// ডিলিট করার লজিক
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $conn->query("DELETE FROM products WHERE id=$id");
    header("location: view.php");
}

// JOIN ব্যবহার করে প্রোডাক্ট এবং ব্র্যান্ডের তথ্য আনা
$sql = "SELECT p.*, b.contact FROM products p JOIN brand b ON p.Brand_id = b.Id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<body>
    <h2>Product Management List</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>Serial No</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Image</th>
            <th>Brand ID (Products Table ID)</th>
            <th>Action</th>
        </tr>
        <?php
        $sn = 1;
        while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $sn++ ?></td>
                <td><?= $row['Name'] ?></td>
                <td><?= $row['contact'] ?></td>
                <td><img src="uploads/<?= $row['Product_image'] ?>" width="60"></td>
                <td><?= $row['id'] ?></td>
                <td>
                    <a href="single_view.php?id=<?= $row['id'] ?>">View</a> |
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="view.php?del_id=<?= $row['id'] ?>" onclick="return confirm('আপনি কি নিশ্চিত?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br><a href="index.php">Add More Data</a>
</body>

</html>