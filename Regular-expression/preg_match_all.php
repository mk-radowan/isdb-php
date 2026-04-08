<?php

/* $data = "Kobi Moyindro Nath";
$pattern = "/i/i";

echo preg_match_all($pattern, $data); */

$data = "rk789";

$p = "/^[a-zA-Z0-9]{3,8}$/";

echo preg_match_all($p, $data);
