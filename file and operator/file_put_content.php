<?php
$write = file_put_contents("store.txt", "hello\n", FILE_APPEND);

echo "Successfully";

$result = file_get_contents("store.txt");
