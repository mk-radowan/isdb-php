<?php

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $db->query("DELETE FROM Manufacturer WHERE id = $id");
    echo "Manufacturer and related products deleted.";
}
