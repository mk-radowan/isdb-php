<?php

//anonymus function
$div = function ($x, $y) {
    echo "Div: ";
    echo  $x / $y;
};
$div(10, 2);
echo "<br>";
//arrow function
$data = fn() => "Hello Moin";
echo $data();

//arry
$student = ["Moin", "Pakku Boy", "Rafin", "Panku", "Boy"];
print_r($student);
