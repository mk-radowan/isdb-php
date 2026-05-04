<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci Sequence</title>
</head>

<body>

    <h2>Fibonacci Series</h2>

    <form method="POST" action="">
        <label for="">Input range</label>
        <input type="number" name="fibo" required min="1">
        <br><br>
        <button type="submit" name="prime">Submit</button>
    </form>

    <?php
    if (isset($_POST['prime'])) {
        $number = intval($_POST['fibo']);
        $first = 0;
        $second = 1;
        $result = "";

        for ($i = 1; $i <= $number; $i++) {
            $result .= $first . " ";

            $next = $first + $second;
            $first = $second;
            $second = $next;
        }


        echo "<strong>Fibonacci series:</strong><br>" . trim($result);
    }
    ?>

</body>

</html>