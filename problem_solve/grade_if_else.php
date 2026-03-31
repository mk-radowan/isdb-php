<form action="" method="post">
    <label for="">Enter Marks</label>
    <input type="text" name="marks" id="">
    <input type="submit" value="submit" name="submit">
</form>

<?php
if (isset($_POST['submit'])) {

    $marks = $_POST['marks'];
    $result = "";

    if ($marks >= 80 && $marks <= 100) {
        $result = "A+";
    } else if ($marks >= 70 && $marks < 80) {
        $result = "A";
    } else if ($marks >= 60 && $marks < 70) {
        $result = "B";
    } else if ($marks >= 0 && $marks < 60) {
        $result = "F";
    } else {
        $result = "Invaild mark";
    }

    echo "Marks: " . $marks;
    echo "<br>";
    echo "Grade: " . $result;
}
