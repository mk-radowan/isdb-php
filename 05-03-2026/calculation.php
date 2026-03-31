<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //int
      $a = 50;
      $b = 20;
      $c = $a + $b;

      echo $c;
       echo "<br>";
      var_dump($c);

      //boolean

      $vtype = true;
      echo "<br>";
      var_dump($vtype );

      //float

       $f = 50.56;
      echo "<br>";
      var_dump($f);

      $data = "Hello Moin";
      echo "<br>";
      var_dump($data);

      //arry

       $student = array("Moin", "Rakib Bhai", "Radowan");
      echo "<br>";
      var_dump($student);

      //object
      class Studen2{
        public $name = "Moin";
        public $age = 75;
      }

      $stu = new Studen2();
      var_dump($stu);
      echo "<br>";

    ?>
</body>
</html>