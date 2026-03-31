<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">

        <input type="number" name="num1" placeholder="Input first number" required> <br> <br>

        <input type="number" name="num2" placeholder="Input second number" required> <br> <br>

        <input type="number" name="num3" placeholder="Input third number" required> <br> <br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {

        $a = $_POST['num1'];
        $b = $_POST['num2'];
        $c = $_POST['num3'];
        $largest = 0;


        switch (true) {
            case ($a >= $b && $a >= $c):
                $largest = $a;
                break;

            case ($b >= $a && $b >= $c):
                $largest = $b;
                break;

            default:
                $largest = $c;
        }

        echo "The three number: $a, $b, $c <br>";
        echo "Largest number: $largest";
    }
    ?>
</body>

</html>