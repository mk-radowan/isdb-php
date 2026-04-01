<?php
$r = fopen("data1.txt", "w");
$d = "Name: Kobi Moindro Nath, Age: 420, Locatio: Zigatola";
fwrite($r, $d);
fclose($r);

$read = fopen("data1.txt", "r");
echo fread($read, filesize("data1.txt"));
