<?php
if (isset($_FILES['filen'])) {
    echo "<h3>File Detalis:</h3>";

    echo "<b>File name:</b> " . $_FILES['filen']['name'] . "<br>";
    echo "<b>File type:</b> " . $_FILES['filen']['type'] . "<br>";
    echo "<b>File temporary path:</b> " . $_FILES['filen']['tmp_name'] . "<br>";
    echo "<b>File size:</b> " . $_FILES['filen']['size'] . " Bytes<br>";
    echo "<b>Error code:</b> " . $_FILES['filen']['error'] . "<br>";


    if (isset($_FILES['filen']['full_path'])) {
        echo "<b>Full Path:</b> " . $_FILES['filen']['full_path'] . "<br>";
    }
}
?>

<hr>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="filen"> <br> <br>
    <input type="submit" value="Submit">
</form>