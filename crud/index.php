<?php
$db = mysqli_connect('localhost', 'root', '', 'crud'); // Database name logic consistent

// Delete logic
if (isset($_GET['deleteid'])) {
    $delete_id = $_GET['deleteid'];
    $sql = "DELETE FROM view WHERE id = $delete_id";
    if (mysqli_query($db, $sql)) {
        header('location:index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Data</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12 text-center mb-3">
                <a href="insert.php" class="btn btn-primary">Add new data</a>
            </div>
            <div class="col-sm-10 offset-sm-1 border border-success p-4">
                <h3 class="text-center p-2 bg-success text-white">Student Information</h3>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $users = $db->query("SELECT * FROM view");
                        while ($row = $users->fetch_assoc()) {
                            echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['contact']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                            <a href='index.php?deleteid={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>