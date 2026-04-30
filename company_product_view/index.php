<?php
$conn = new mysqli("localhost", "root", "", "company");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['submit_brand'])) {
    $name = $_POST['brand_name'];
    $contact = $_POST['brand_contact'];
    $conn->query("INSERT INTO brand (name, contact) VALUES ('$name', '$contact')");
}


if (isset($_POST['submit_product'])) {
    $name = $_POST['p_name'];
    $price = $_POST['p_price'];
    $brand_id = $_POST['p_brand_id'];


    $upload_dir = "uploads/";


    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $image = $_FILES['p_image']['name'];
    $target = $upload_dir . basename($image);


    if (move_uploaded_file($_FILES['p_image']['tmp_name'], $target)) {
        $conn->query("INSERT INTO products (Name, Price, Brand_id, Product_image) VALUES ('$name', '$price', '$brand_id', '$image')");
        echo "<script>alert('Product and Image uploaded successfully!');</script>";
    } else {
        echo "Image upload failed!";
    }
}

$brands = $conn->query("SELECT * FROM brand");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Brand & Product</title>
</head>

<body>
    <h2>Add Brand</h2>
    <form method="POST">
        Name: <input type="text" name="brand_name" required><br><br>
        Contact: <input type="text" name="brand_contact" required><br><br>
        <button type="submit" name="submit_brand">Add Brand</button>
    </form>

    <hr>

    <h2>Add Product</h2>
    <form method="POST" enctype="multipart/form-data">
        Product Name: <input type="text" name="p_name" required><br><br>
        Price: <input type="number" step="0.01" name="p_price" required><br><br>
        Brand:
        <select name="p_brand_id">
            <option value="">Select Brand</option>
            <?php while ($row = $brands->fetch_assoc()): ?>
                <option value="<?= $row['Id'] ?>"><?= $row['name'] ?></option>
            <?php endwhile; ?>
        </select><br><br>
        Image: <input type="file" name="p_image" required><br><br>
        <button type="submit" name="submit_product">Add Product</button>
    </form>
    <br><a href="view.php">View Products List</a>
</body>

</html>