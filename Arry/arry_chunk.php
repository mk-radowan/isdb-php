<?php
$data = array("Kobi", "Maikel", "Moinena", "Sudhon", "Dotto");

$poronanun = array_chunk($data, 2);
print_r($poronanun);
echo "<br>";
echo json_encode($poronanun);
