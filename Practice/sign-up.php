<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create your FileAir Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Heebo:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/stylesheet.css" />
</head>
<body>
    <div class="back-butt">
        <a href="home.php" class="previous round">&#8249;</a>
    </div>
    <main>
        <div class="create-account">
            <img src="Logo.png" class="logo" alt="File Air Logo">
            <h3>Create your FileAir Account</h3>
            <h4>to continue to FileShare</h4>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <input type="text" id="user" placeholder="Enter a valid username" name="user" />
                </br>
                <input type="submit" id="sign_in" value="Continue"/>
            </form>
        </div>
    </main>
</body>
</html>