<?php
$conn = new mysqli("localhost", "root", "", "company");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Manufacturer Insert (Using Procedure)
if (isset($_POST['submit_mfg'])) {
    $name = $_POST['m_name'];
    $address = $_POST['m_address'];
    $contact = $_POST['m_contact'];

    $conn->query("CALL add_manufacturer('$name', '$address', '$contact')");
    echo "Manufacturer Added!";
}

// Product Insert (Using Procedure)
if (isset($_POST['submit_prod'])) {
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $m_id = $_POST['m_id'];

    $conn->query("CALL add_product('$p_name', '$p_price', '$m_id')");
    echo "Product Added!";
}

// Delete Manufacturer (Trigger will automatically delete products)
if (isset($_GET['del_mfg_id'])) {
    $id = $_GET['del_mfg_id'];
    $conn->query("DELETE FROM Manufacturer WHERE id=$id");
    header("Location: index.php");
}

$manufacturers = $conn->query("SELECT * FROM Manufacturer");
$expensive_prods = $conn->query("SELECT * FROM expensive_products"); // View call
?>

<!DOCTYPE html>
<html>

<head>
    <title>Management System</title>
</head>

<body>

    <h2>Add Manufacturer</h2>
    <form method="POST">
        Name: <input type="text" name="m_name" required><br>
        Address: <input type="text" name="m_address" required><br>
        Contact: <input type="text" name="m_contact" required><br>
        <button type="submit" name="submit_mfg">Save</button>
    </form>

    <hr>

    <h2>Add Product</h2>
    <form method="POST">
        Product Name: <input type="text" name="p_name" required><br>
        Price: <input type="number" name="p_price" required><br>
        Manufacturer:
        <select name="m_id">
            <?php while ($row = $manufacturers->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
            <?php endwhile; ?>
        </select><br>
        <button type="submit" name="submit_prod">Save</button>
    </form>

    <hr>

    <h2>Delete Manufacturer:</h2>
    <form method="GET" onsubmit="return confirm('Are you sure? This will also delete all related products via Trigger.');">
        <!-- <label for="del_mfg_id">Delete Manufacturer :</label> -->
        <select name="del_mfg_id" id="del_mfg_id" required>
            <!-- The first option will be a prompt -->
            <option value="">--- Select Manufacturer ---</option>

            <?php
            // Fetching list from database
            $m_list = $conn->query("SELECT * FROM Manufacturer");

            // Looping through the results to display options
            if ($m_list->num_rows > 0) {
                while ($m = $m_list->fetch_assoc()) {
                    echo "<option value='" . $m['id'] . "'>" . $m['id'] . " - " . $m['name'] . "</option>";
                }
            } else {
                echo "<option value=''>No Manufacturer Found</option>";
            }
            ?>
        </select>

        <button type="submit" style="color: red; cursor: pointer; font-weight: bold;">
            Delete
        </button>
    </form>


    <hr>
    <hr>

<h2>Expensive Products (From VIEW - Price > 5000)</h2>
<table border="1" cellpadding="10" cellspacing="0">
    <tr bgcolor="#eee">
        <th>ID</th>
        <th>Product Name</th>
        <th>Manufacturer</th> <!-- নতুন হেড কলাম -->
        <th>Price</th>
    </tr>

    <?php 
    // ভিউ থেকে আপডেট করা ডাটা পুনরায় কুয়েরি করা হচ্ছে
    $expensive_prods = $conn->query("SELECT * FROM expensive_prods");

    if ($expensive_prods && $expensive_prods->num_rows > 0):
        while ($vp = $expensive_prods->fetch_assoc()): 
    ?>
            <tr>
                <td><?= $vp['id'] ?></td>
                <td><?= $vp['name'] ?></td>
                <td><?= $vp['manufacturer_name'] ?></td> <!-- ভিউ থেকে আসা কোম্পানির নাম -->
                <td><?= $vp['price'] ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="4" style="text-align:center;">No expensive products found.</td>
        </tr>
    <?php endif; ?>
</table>

</body>

</html>