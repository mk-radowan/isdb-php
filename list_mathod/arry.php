
<?php
/* $salary = [
    [1, "Kobi Moindro Nath", 51, "moindronath@dipti.com", "01789456212"],
    [2, "Ifty Kharul Lyes", 40, "lyces@gmail.com", "01789456789"],
    [3, "Asad Candabaj", 25, "asad@gtv.com", "0178945454657"],
    [4, "Rakib vai", 30, "rakib@creative.com", "01789425858"],
];


foreach ($salary as list($id, $name, $gmail, $phone)) {
    echo "$id | $name | $gmail | $phone <br>";
}
*/
$empoloye = [
    1,
    "Kobi Moindro Nath",
    51,
    "moindronath@dipti.com",
    "01789456212",
    2,
    "Ifty Kharul Lyes",
    40,
    "lyces@gmail.com",
    "01789456789",
    3,
    "Asad Candabaj",
    25,
    "asad@gtv.com",
    "0178945454657",
    4,
    "Rakib vai",
    30,
    "rakib@creative.com",
    "01789425858",
];

$empoloye = array_chunk($empoloye, 43);

foreach ($empoloye as [$name, $age, $email, $contact]) {
    echo "$name - $age - $email - $contact <br>";
}
?>