<?php
$conn = new mysqli("localhost", "root", "", "company");
$id = $_GET['id'];
$sql = "SELECT p.*, b.name as b_name, b.contact FROM products p JOIN brand b ON p.Brand_id = b.Id WHERE p.id=$id";
$data = $conn->query($sql)->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        .product-box {
            width: 350px;
            border: 2px solid #333;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            font-family: Arial;
        }

        .product-box img {
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .details {
            text-align: left;
            background: #f9f9f9;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="product-box">
        <h3>Product Details</h3>
        <img src="uploads/<?= $data['Product_image'] ?>" width="250">
        <div class="details">
            <p><strong>Name:</strong> <?= $data['Name'] ?></p>
            <p><strong>Price:</strong> <?= $data['Price'] ?> TK</p>
            <p><strong>Brand:</strong> <?= $data['b_name'] ?></p>
            <p><strong>Brand Contact:</strong> <?= $data['contact'] ?></p>
            <p><strong>Product ID:</strong> <?= $data['id'] ?></p>
        </div>
        <br>
        <a href="view.php">Back to List</a>
    </div>
</body>

</html>