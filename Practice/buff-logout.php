<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Logging Out</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"  href="CSS/stylesheet.css" />
    <link href="https://fonts.googleapis.com/css?family=Heebo:300" rel="stylesheet">
    <link rel="icon" href="LogoIcon.png" type="image/png" sizes="20x20">
</head>
<body>
    <section class="loading">
        <?php
        session_start();
        session_destroy();

        ob_start();

        echo "Logging you out";
        header("Refresh: 3; login.php");
        exit();

        ob_end_flush();
        ?>
    </section>
</body>
</html>
