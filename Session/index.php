<?php
session_start(); // সেশন শুরু করা হলো (এটি সবার উপরে থাকতে হবে)

if (isset($_POST['sub'])) {
    $inputUser = trim($_POST["nam"]);
    $inputPass = trim($_POST["pass"]);

    // ডাটা ফাইল ওপেন করা (Read Mode)
    $file = fopen("data.txt", "r");
    $login_success = false;

    if ($file) {
        while (($line = fgets($file)) !== false) {
            $data = explode(",", trim($line));

            if (isset($data[0]) && isset($data[1])) {
                if ($data[0] == $inputUser && $data[1] == $inputPass) {
                    $login_success = true;

                    // সেশনে ইউজারনেম সেভ করা হচ্ছে
                    $_SESSION['username'] = $inputUser;
                    break;
                }
            }
        }
        fclose($file);
    }

    if ($login_success) {
        // সেশন থাকলে আর URL-এ status=success পাঠানোর প্রয়োজন নেই, সরাসরি রিডাইরেক্ট
        header('Location: main.php');
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
    <title>Login - Authentication System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }

        .login-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .error {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        h2 {
            text-align: center;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login Form</h2>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <label><b>Username:</b></label>
            <input type="text" name="nam" placeholder="Enter Username" required>

            <label><b>Password:</b></label>
            <input type="password" name="pass" placeholder="Enter Password" required>

            <input type="submit" name="sub" value="Login">
        </form>
    </div>

</body>

</html>