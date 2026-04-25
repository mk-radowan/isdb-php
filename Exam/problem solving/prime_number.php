<form action="" method="post">
    <label for="">Input any number</label>
    <input type="text" name="num" id="">
    <input type="submit" value="submit" name="submit">
</form>

<?php
if (isset($_POST['submit'])) {

    $number = $_POST['num'];
    $count = 0;

    if ($number <= 1) {
        echo $number . " :Invalid Range";
    } else {
        for ($i = 2; $i < $number; $i++) {
            if ($number % $i == 0) {
                $count++;
                break;
            }
        }
        if ($count == 0) {
            echo $number . " is prime";
        } else {
            echo $number . " is not prime";
        }
    }
}
