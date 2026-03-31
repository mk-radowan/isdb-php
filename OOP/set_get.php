<?php
class Dron
{
    public $name;
    public $color;

    public function setName($nam)
    {
        $this->name = $nam;
    }

    public function getName()
    {
        return $this->name;
    }
}
$resul = new Dron();
echo $resul->setName("Shahed 136");
echo $resul->getName();
