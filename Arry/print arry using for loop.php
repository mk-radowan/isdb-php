<?php
$data = array(
    array('Moin', 'khondoker', 'Pagol kobi'),
    array(1295147, 1295148, 1295149, 129550),
    array(3.95, 3.67, 3.20, 3.00)
);

echo "<b>Data Array:</b><br>";

for ($i = 0; $i < count($data); $i++) {
    for ($j = 0; $j < count($data[$i]); $j++) {
        echo $data[$i][$j] . " , ";
    }
    echo "<br>";
}

echo "<br>";

$arr = [
    ["1", "2", "3", "4"],
    ["i", "ii", "iii", "iv"],
    ["A", "B", "C", "D"]
];

echo "<b>Arr Array:</b><br>";

for ($i = 0; $i < count($arr); $i++) {
    for ($j = 0; $j < count($arr[$i]); $j++) {
        echo $arr[$i][$j] . " ";
    }
    echo "<br>";
}
