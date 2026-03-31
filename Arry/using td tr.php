<?php

$arr = [
    ['A', 't', 'r', 'w'],
    ['B', 'C', 'y', 's', 'y'],
    [3, 5, 2, 1, 7]
];

// foreach ($array as $rowIndex => $row) {
//     echo "Row number $rowIndex";
//     echo "<ul>";

//     foreach ($row as $value) {
//         echo "<li>$value</li>";
//     }

//     echo "</ul>";
// };

for ($row = 0; $row < count($arr); $row++) {
    echo "<p><b>Category - $row</b></p>";
    echo "<ul>";

    for ($col = 0; $col < count($arr[$row]); $col++) {
        echo "<li>" . $arr[$row][$col] . "</li>";
    }

    echo "</ul>";
}
