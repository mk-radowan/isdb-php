<?php
class Student
{
    public $name = "Kobi Moinro Nath Dotto ";
    private $age = 22;
    protected $Degree = " BSc";

    public function fullInfo()
    {
        return $this->name . " " . $this->age . " " . $this->Degree;
    }
}

$result = new Student();
echo $result->fullInfo();
