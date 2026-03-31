<?php

$cha1 = ["a", "b", "u"];
$cha2 = ["a", "w", "t"];
$cha3 = ["g", "a", "c"];

$result = array_diff($cha2, $cha3, $cha1);
print_r($result);
