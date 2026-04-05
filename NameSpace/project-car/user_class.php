<?php

namespace UserOne;

class User
{
    public $name = "Moindro Nath";
    public $deg = "Kobi";

    public function userInfo()
    {
        echo "This is " . $this->name;
    }
}
