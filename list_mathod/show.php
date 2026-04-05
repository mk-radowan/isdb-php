<?php

$files = file("text.txt");

foreach ($files as $file) {
    list($x, $y, $z) = explode(",", "$file");

    echo "ID: " . $x . " " . "Name: " . $y . " " . " City: " . $z . "<br>";
}
