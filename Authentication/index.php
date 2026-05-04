<?php
if (isset($_POST['sub'])) {
    $inputUser = trim($_POST["nam"]);
    $inputPass = trim($_POST["pass"]);

    $file = fopen("data.txt", "r");
    $login_success = false;

    if ($file) {

        while (($line = fgets($file)) !== false) {

            $data = explode(",", trim($line));


            if (isset($data[0]) && isset($data[1])) {
                if ($data[0] == $inputUser && $data[1] == $inputPass) {
                    $login_success = true;
                    break;
                }
            }
        }
        fclose($file);
    }

    if ($login_success) {

        header('Location: main.php?status=success');
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
</head>

<body>
    <h2>Login Form</h2>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">
        <label><b>Username:</b></label>
        <input type="text" name="nam" required> <br><br>

        <label><b>Password:</b></label>
        <input type="password" name="pass" required> <br><br>

        <input type="submit" name="sub" value="Login">
    </form>
</body>

</html>