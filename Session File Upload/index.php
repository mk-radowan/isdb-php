<?php
session_start();


if (isset($_SESSION['loggedin'])) {
    header("Location: upload.php");
    exit;
}

if (isset($_POST['login'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    $file = fopen("data.txt", "r");
    $valid = false;

    while ($line = fgets($file)) {
        $data = explode(",", trim($line));
        if ($data[0] == $user_id && $data[1] == $password) {
            $valid = true;
            break;
        }
    }
    fclose($file);

    if ($valid) {
        $_SESSION['loggedin'] = $user_id;
        header("Location: upload.php");
    } else {
        $error = "ID or Password wrong";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center" style="height: 100vh;">
    <div class="container card shadow-sm p-4" style="max-width: 400px;">
        <h3 class="text-center">Login</h3>
        <?php if (isset($error)) echo "<p class='text-danger text-center'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="user_id" class="form-control mb-3" placeholder="User ID" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            <button name="login" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>

</html>