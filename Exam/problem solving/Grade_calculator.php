<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator (PHP)</title>
</head>

<body>

    <form method="GET">
        <input type="number" name="mark" placeholder="Enter mark" required>
        <button type="submit">Calculate</button>
    </form>

    <?php
    if (isset($_GET['mark'])) {
        // Get the mark from the URL and convert to a number
        $mark = floatval($_GET['mark']);
        $result = "";

        // PHP switch(true) works exactly like JavaScript
        switch (true) {
            case ($mark >= 80 && $mark <= 100):
                $result = "A+";
                break;

            case ($mark >= 70 && $mark < 80):
                $result = "A";
                break;

            case ($mark >= 60 && $mark < 70):
                $result = "B";
                break;

            case ($mark >= 0 && $mark < 60):
                $result = "F";
                break;

            default:
                $result = "Invalid mark";
                break;
        }

        echo "<h3>" . $mark . ", GPA: " . $result . "</h3>";
    }
    ?>

</body>

</html>