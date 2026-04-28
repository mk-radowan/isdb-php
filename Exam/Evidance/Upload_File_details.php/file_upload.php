<?php
if (isset($_FILES['filen']) && $_FILES['filen']['error'] == 0) {

    // ইমেজের অস্থায়ী পথ (temporary path) থেকে ডেটা নেওয়া
    $tmp_name = $_FILES['filen']['tmp_name'];
    $file_name = $_FILES['filen']['name'];

    // ১. প্রথমে ইমেজটি শো করার জন্য (Base64 ব্যবহার করে অথবা সরাসরি পাথ থেকে)
    // আমরা এখানে অস্থায়ীভাবে ফাইলটি দেখানোর ব্যবস্থা করছি
    echo "<h3>Image Preview:</h3>";
    echo "<img src='data:image/jpeg;base64," . base64_encode(file_get_contents($tmp_name)) . "' style='max-width: 300px; border: 2px solid #ddd; padding: 5px;'><br><br>";

    // ২. এরপর ইমেজের বিস্তারিত তথ্য শো করবে
    echo "<h3>File Details:</h3>";
    echo "<b>File name:</b> " . $file_name . "<br>";
    echo "<b>File type:</b> " . $_FILES['filen']['type'] . "<br>";
    echo "<b>File temporary path:</b> " . $tmp_name . "<br>";
    echo "<b>File size:</b> " . number_format($_FILES['filen']['size'] / 1024, 2) . " KB<br>";
    echo "<b>Error code:</b> " . $_FILES['filen']['error'] . "<br>";

    if (isset($_FILES['filen']['full_path'])) {
        echo "<b>Full Path:</b> " . $_FILES['filen']['full_path'] . "<br>";
    }
}
?>

<hr>

<form action="" method="post" enctype="multipart/form-data">
    <label>Select Image:</label><br>
    <input type="file" name="filen" accept="image/*"> <br> <br>
    <input type="submit" value="Submit">
</form>