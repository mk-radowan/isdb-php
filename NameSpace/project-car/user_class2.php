<?php

namespace UserTwo;

class User
{
    public $name = "Mohiuddin Dotto";
    public $deg = "MD";

    public function show()
    {
        echo "This is " . $this->name;
    }
}
