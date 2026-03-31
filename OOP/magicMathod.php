<?php
/* class Missile
{
    public $model = 110;
    public $name = "Fateh";

    public function __destruct()
    {
        echo "Fateh is redy for attack <br>";
        echo "<br>";
    }

    public function __construct()
    {
        echo $this->name . "is attack in Tel aviv";
    }
}

$resul = new Missile();
 */

class Dron
{
    public $name;
    public $color;

    public function __destruct()
    {
        echo "<br> bye";
    }

    public function __construct()
    {
        echo "Start " . $this->name = $n . " is " . $this->color = $c;
    }
}

$resul = new Dron("Shahed 136", "Black");
