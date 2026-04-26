<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP Vowel Checker</title>
</head>

<body>

    <?php
    // In PHP, we usually get data from a form. 
    // For this example, let's assume 'letter' comes from a URL parameter like ?letter=a
    $letter = $_GET['letter'] ?? '';
    $result = "";

    if ($letter !== "") {
        // .toLowerCase() becomes strtolower()
        switch (strtolower($letter)) {
            case 'a':
            case 'e':
            case 'i':
            case 'o':
            case 'u':
                $result = " is Vowel";
                break;

            default:
                $result = " is Consonant";
                break;
        }

        // document.writeln becomes echo
        echo htmlspecialchars($letter) . $result;
    } else {
        echo "Please provide a letter in the URL (e.g., ?letter=e)";
    }
    ?>

</body>

</html>