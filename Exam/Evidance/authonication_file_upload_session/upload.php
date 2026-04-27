<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit;
}

$uploaded_image = "";
$msg = "";

if (isset($_POST['submit'])) {

    $target_dir = "File/";


    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_name = $_FILES["file"]["name"];
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));


    $allowed = array("jpg", "jpeg", "png");

    if (in_array($ext, $allowed)) {

        $new_name = $target_dir . time() . "_" . $file_name;

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $new_name)) {
            $uploaded_image = $new_name;
            $msg = "<b class='text-success'>File uploaded successfully in 'File' folder!</b>";
        } else {
            $msg = "<b class='text-danger'>File Upload error!</b>";
        }
    } else {
        $msg = "<b class='text-danger'>Only JPG, JPEG, PNG Supported</b>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark px-3">
        <span class="navbar-brand">User: <?php echo $_SESSION['loggedin']; ?></span>
        <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 card p-4 shadow-sm text-center">
                <h4>Upload yor image </h4>
                <hr>

                <form method="POST" enctype="multipart/form-data" class="mt-3">
                    <input type="file" name="file" class="form-control mb-3" required>
                    <button name="submit" class="btn btn-primary w-100">Submit</button>
                </form>

                <div class="mt-3"><?php echo $msg; ?></div>

                <?php if ($uploaded_image): ?>
                    <div class="mt-4">
                        <p>Uploaded Image Preview:</p>
                        <img src="<?php echo $uploaded_image; ?>" class="img-thumbnail" style="max-width: 100%; height: auto;">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>