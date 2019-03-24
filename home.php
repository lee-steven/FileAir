<!DOCTYPE html>
<head></head>
<body>
<?php
    session_start();

    if (isset( $_SESSION['login_user'])){
        // Grab user data from the database using the user_id
        // Let them access the "logged in only" pages

    } else {
        // Redirect them to the login page
        header("Location: login.php");
        exit();
    }
    echo "Congratulations! Successful Login!"
?>
    <form action="buff-logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
</body>
</html>