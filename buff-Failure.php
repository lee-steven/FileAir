<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Failed</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/stylesheet2.css" />
    <link href="https://fonts.googleapis.com/css?family=Heebo:300" rel="stylesheet">
    <link rel="icon" href="LogoIcon.png" type="image/png" sizes="20x20">
</head>
<body>
    <section class="loading">
        <?php
        ob_start();

        echo "Incorrect username. Redirecting now ...";
        echo '<div class="loader"></div>';
        header("Refresh: 3; login.php");
        exit();

        ob_end_flush();
        ?>
    </section>
</body>
</html>
