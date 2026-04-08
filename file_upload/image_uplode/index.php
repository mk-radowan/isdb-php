<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload with Size Validation</title>
</head>

<body>

    <?php
    if (isset($_POST['submitbtn'])) {
        $fileName = $_FILES['filen']['name'];
        $tmp      = $_FILES['filen']['tmp_name'];
        $fileSize = $_FILES['filen']['size'];
        $type     = pathinfo($fileName, PATHINFO_EXTENSION);

        $folder   = "img/" . $fileName;
        $maxSize  = 400 * 1024;


        if (($type == "jpg" || $type == "png" || $type == "jpeg") && ($fileSize <= $maxSize)) {



            if (move_uploaded_file($tmp,  $folder)) {
                echo "File upload succes <br>";
                echo "<img src=' $folder' width='400px' alt='Uploaded Image'>";
            }
        } else {

            echo "file type must be  JPG/PNG and file size must be maximum 400kb";
        }
    }


    ?>

    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="filen"> <br><br>
        <input type="submit" value="Submit" name="submitbtn">
    </form>

</body>

</html>