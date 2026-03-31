<?php

echo time();
echo "<br>";

echo date('d');
echo "<br>";

echo date('D');
echo "<br>";

echo date('m');
echo "<br>";

echo date('M');
echo "<br>";

//Check today

echo date('d/m/Y');
echo "<br>";

echo date('n');
echo "<br>";

echo date('L');
echo "<br>";

echo date('F');
echo "<br>";

echo date('y');
echo "<br>";

$timezone = new DateTimeZone("Asia/Dhaka");
$date = new DateTime("now", $timezone);

echo $date->format("Y-m-d h:i:s A");

date_default_timezone_set("Asia/Dhaka");
echo "<br>";
echo date_default_timezone_get() . ' today: ' . date('d/m/Y h:i A');

//mktime => (hour, miniute, second, month, day, year)
mktime(10, 47, 48, 03, 11, 2026);
echo "<br>";
//Find out my age

$birthDate = "03/02/2004";
$birth = new DateTime($birthDate);
$today = new DateTime();

$age = $today->diff($birth)->y;

echo "Your age is " . $age;
