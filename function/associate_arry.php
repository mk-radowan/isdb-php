<?php
$person = ['Name: ' => 'Fahim', 'age' => 30, 'round' => '70'];
echo $person['name'];
echo "<br>";
echo $person['round'];
echo "<br>";
print_r($person);

//key and value
$a_key = array_key_first($person);
echo "<br>";
$a_value = $person[$a_key];
echo "<br>";
echo $a_key . ":" . $a_value;
echo "<br>";
