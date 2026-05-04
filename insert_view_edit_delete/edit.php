<?php
$conn = new mysqli("localhost", "root", "", "company");
$id = $_GET['id'];

if (isset($_POST['update'])) {
    $name = $_POST['p_name'];
    $price = $_POST['p_price'];
    $brand_id = $_POST['p_brand_id'];

    if ($_FILES['p_image']['name'] != "") {
        $image = $_FILES['p_image']['name'];
        move_uploaded_file($_FILES['p_image']['tmp_name'], "uploads/" . $image);
        $conn->query("UPDATE products SET Name='$name', Price='$price', Brand_id='$brand_id', Product_image='$image' WHERE id=$id");
    } else {
        $conn->query("UPDATE products SET Name='$name', Price='$price', Brand_id='$brand_id' WHERE id=$id");
    }
    header("location: view.php");
}

$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
$brands = $conn->query("SELECT * FROM brand");
?>

<h2>Edit Product</h2>
<form method="POST" enctype="multipart/form-data">
    Name: <input type="text" name="p_name" value="<?= $product['Name'] ?>"><br><br>
    Price: <input type="number" name="p_price" value="<?= $product['Price'] ?>"><br><br>
    Brand:
    <select name="p_brand_id">
        <?php while ($b = $brands->fetch_assoc()): ?>
            <option value="<?= $b['Id'] ?>" <?= ($b['Id'] == $product['Brand_id']) ? 'selected' : '' ?>><?= $b['name'] ?></option>
        <?php endwhile; ?>
    </select><br><br>
    Current Image: <img src="uploads/<?= $product['Product_image'] ?>" width="50"><br>
    New Image: <input type="file" name="p_image"><br><br>
    <button type="submit" name="update">Update Product</button>
</form>