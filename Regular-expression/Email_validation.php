<?php

$mail = "radowan@kust.com";
$p = "/^[a-zA-Z0-9._]+@[a-zA-Z]+\.[a-zA-Z]{2,6}$/";

echo preg_match($p, $mail);
