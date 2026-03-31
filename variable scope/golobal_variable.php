<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    echo $_SERVER['SERVER_ADDR'];
    echo "<br>";
    echo $_SERVER["SERVER_NAME"];
    echo "<br>";
    echo $_SERVER['SCRIPT_NAME'];
    echo "<br>";
     echo $_SERVER['SERVER_PORT'];
    echo "<br>";
    echo $_SERVER['DOCUMENT_ROOT'];
    echo "<br>";
    echo $_SERVER['SERVER_ADMIN'];
    echo "<br>";


    // $x = 20;
    // function add(){
    //     global $x,
    //     global $y = 10;
    // $c = $x + $y;
    //     echo $c;
    // }
    ?>
</body>
</html>