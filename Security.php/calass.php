<?php
$password = "Moindro nath";
//m5()

echo md5($password);
echo "<br>";

echo hash('SHA512', "redoy$2004");
echo "<br>";

echo hash('SHA256', "redoy$2004");
echo "<br>";

echo hash('SHA384', "redoy$2004");
echo "<br>";

echo hash('SHA224', "redoy$2004");
echo "<br>";
$pass = "admin";
echo password_hash($pass, PASSWORD_DEFAULT);
echo "<br>";
$store = "Redoy$123";
// echo base64_encode($store);
echo base64_decode("UmVkb3kkMTIz");
echo "<br>";


$kobi = "MoindroNath$123";
$key = "fbKobi";

$method = "AES-128-CTR";

$iv = str_repeat("\0", 16);

$encrypted = openssl_encrypt($kobi, $method, $key, 0, $iv);

$decrypted = openssl_decrypt($encrypted, $method, $key, 0, $iv);

echo "Original: " . $kobi . "<br>";
echo "Encrypted: " . $encrypted . "<br>";

echo "Decrypted: " . $decrypted . "<br>";
