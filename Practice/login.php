<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Login</title>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" type = "text/css" href = "CSS/stylesheet.css" />
    <link href="https://fonts.googleapis.com/css?family=Heebo:300" rel="stylesheet">
</head>

<body>
<?php
    session_start();

    if(isset($_POST['user'])){
        //Open using file handler
        $h= fopen("users.txt", "r");

        //Boolean to see if username was found
        $validator = FALSE;

        //Reading File Line-by-Line
        while(!feof($h)){
            if($_POST['user'] == trim(fgets($h))){
                $validator = TRUE;
            }
        }
        //Checking if validator returned true or false to check if username was in txt file.
        if($validator== TRUE){
            echo "Success";
            $_SESSION['login_user'] = $_POST['user'];
            header("Location: buff-Success.php");
        }
        else{
            header("Location: buff-Failure.php");
        }
        fclose($h);
        exit();
    }
    ?>

    <main>
        <h3>Sign in</h3>
        <h4>to continue to share.</h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <input type="text" id="user" name="user" />
            </br>
            <input type="submit" id="sign_in" value="Sign in"/>
        </form>
    </main>
</body>
</html> 