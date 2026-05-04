<?php
$db = new mysqli("localhost", "root", "", "class_1");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

# =========================
# ADD MANUFACTURER
# =========================
if (isset($_POST['btnManufacturer'])) {
    $mname = $_POST['m_name'];
    $maddress = $_POST['m_address'];
    $mnumbers = $_POST['m_numbers'];

    $stmt = $db->prepare("CALL add_manufacturer(?, ?, ?)");
    $stmt->bind_param("sss", $mname, $maddress, $mnumbers);
    $stmt->execute();
    $stmt->close();
}

# =========================
# DELETE MANUFACTURER
# =========================
if (isset($_POST['btnDelete'])) {
    $mid = $_POST['m_id'];

    $stmt = $db->prepare("DELETE FROM manufacturer WHERE id = ?");
    $stmt->bind_param("i", $mid);
    $stmt->execute();
    $stmt->close();
}

# =========================
# ADD PRODUCT
# =========================
if (isset($_POST['addProduct'])) {
    $pname = $_POST['p_name'];
    $pprice = $_POST['p_price'];
    $m_brand_id = $_POST['m_brand_id'];

    $stmt = $db->prepare("CALL add_product(?, ?, ?)");
    $stmt->bind_param("sii", $pname, $pprice, $m_brand_id);
    $stmt->execute();
    $stmt->close();
}

# =========================
# PRICE FILTER
# =========================
$filter_price = isset($_POST['price_limit']) ? $_POST['price_limit'] : 0;
?>

<!DOCTYPE html>
<html>

<head>
    <title>ERP System</title>
    <style>
        body {
            font-family: Arial;
        }

        table {
            border-collapse: collapse;
            width: 60%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background: #f2f2f2;
        }
    </style>
</head>

<body>

    <!-- ========================= -->
    <!-- ADD MANUFACTURER -->
    <!-- ========================= -->
    <h2>Add Manufacturer</h2>
    <form method="post">
        <input type="text" name="m_name" placeholder="Name" required><br><br>
        <input type="text" name="m_address" placeholder="Address"><br><br>
        <input type="text" name="m_numbers" placeholder="Contact"><br><br>
        <button type="submit" name="btnManufacturer">Add Manufacturer</button>
    </form>

    <hr>

    <!-- ========================= -->
    <!-- DELETE MANUFACTURER -->
    <!-- ========================= -->
    <h2>Delete Manufacturer</h2>
    <form method="post" onsubmit="return confirm('Delete this manufacturer?')">
        <select name="m_id" required>
            <option value="">Select Manufacturer</option>

            <?php
            $result = $db->query("SELECT id, name FROM manufacturer");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
        </select>

        <button type="submit" name="btnDelete">Delete</button>
    </form>

    <hr>

    <!-- ========================= -->
    <!-- ADD PRODUCT -->
    <!-- ========================= -->
    <h2>Add Product</h2>
    <form method="post">

        <input type="text" name="p_name" placeholder="Product Name" required><br><br>

        <input type="number" name="p_price" placeholder="Price" required><br><br>

        <select name="m_brand_id" required>
            <option value="">Select Manufacturer</option>

            <?php
            $result = $db->query("SELECT id, name FROM manufacturer");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
        </select><br><br>

        <button type="submit" name="addProduct">Add Product</button>
    </form>

    </table>

</body>

</html>