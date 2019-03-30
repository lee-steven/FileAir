<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
        session_start();

        $username= $_SESSION['login_user'];
        if (isset( $_SESSION['login_user'])){
            // Grab user data from the database using the user_id
            // Let them access the "logged in only" pages

        } else {
            // Redirect them to the login page
            header("Location: login.php");
            exit();
        }

        $path   = sprintf("/opt/lampp/htdocs/uploads/%s", $username);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            if (isset($_POST['deleteButton'])) {
                $value = $_POST['deleteButton'];
                $path   = sprintf("/opt/lampp/htdocs/uploads/%s/%s", $username, $value);
                unlink($path);
                echo $value . " has been deleted!";
            }
        }
    ?>
</body>
</html>