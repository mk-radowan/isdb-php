<?php

$contact = "01712345678";

$pattern = "/^01[3-9][0-9]{8}$/";

if (preg_match($pattern, $contact)) {
    echo "$contact : Valiad phone number";
} else {
    echo "$contact : Invaild Number, Please input currect number.";
}
