<?php
include 'db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM students WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: index.php");
    }
}
