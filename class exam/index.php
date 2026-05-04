<?php include 'db_config.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Student Management</title>
</head>

<body>
    <h2>Student Details</h2>
    <a href="insert.php">Insert Student Info</a><br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["contact"] . "</td>
                        <td>" . $row["address"] . "</td>
                        <td>
                            <a href='update.php?id=" . $row["id"] . "'>Edit</a> | 
                            <a href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        ?>
    </table>
</body>

</html>