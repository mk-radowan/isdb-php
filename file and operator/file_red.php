<?php

$result = fopen("myInfo.txt", "r") or die("file is not found");

echo fread($result, filesize("myInfo.txt"));
fclose($result);
