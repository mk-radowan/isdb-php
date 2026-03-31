<?php
class Car
{
    public $model = "sd12";
    public $color = "Pink";
    public $name = "Marsitices";

    function info($c)
    {
        $this->color = $c;
        return $this->color;
    }
}

$result = new Car();
echo $result->model;
echo "<br>";
echo $result->info("Black");
