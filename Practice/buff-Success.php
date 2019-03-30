<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login Successful</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css" />
    <link href="https://fonts.googleapis.com/css?family=Heebo:300" rel="stylesheet">
    <link rel="icon" href="LogoIcon.png" type="image/png" sizes="20x20">
</head>
<body>
    <section class="loading">
        <?php
        ob_start();

        echo "Successful Login. Redirecting now...";
        header("Refresh: 3; home.php");
        exit();

        ob_end_flush();
        ?>
    </section>
</body>
</html>
