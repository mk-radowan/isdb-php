<?php
class Student
{
    public $name = "Name: Kobi Moindro Nath";
    public $age  = "Age: 65";
    public $address = "Address: Zigatolla, Dhanmondi - 4";
    public $id = "ID: 1295178";
    public $subject = "Subject: ChatGpt";

    public function info()
    {
        echo $this->name . "<br>";
        echo $this->age . "<br>";
        echo $this->address . "<br>";
        echo $this->id . "<br>";
        echo $this->subject . "<br>";
    }

    public function __construct()
    {
        echo "Hello Moindro Nath" . "<br>";
    }

    public function __destruct()
    {
        echo "<br> Good night" . "<br>";
    }
}

class Instractor extends Student
{
    public $expriance;
    public function teacherDetails() {}
}

class Authority extends Instractor
{
    public $position = "Consultan";
    public  $Name = "Mosahidul Islam";
    public function monitor()
    {
        echo $this->position . "<br>";
        echo $this->Name . "<br>";
    }
}

$atu = new Authority;
echo $atu->info();
