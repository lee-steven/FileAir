<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delete File</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css" />
    <link href="https://fonts.googleapis.com/css?family=Heebo:300" rel="stylesheet">
    <link rel="icon" href="LogoIcon.png" type="image/png" sizes="20x20">
</head>
<body>

    <div class="back-butt">
        <a href="home.php" class="previous round">&#8249;</a>
    </div>
    
    <section class="file-load">

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

            if($_SERVER['REQUEST_METHOD']=='POST'){

                if(isset($_POST['shared'])){
                    $selectOption = $_POST['sharedUser'];
                    $value = $_POST['shared'];

                    //copy folder into shared user's folder
                    $path   = sprintf("/opt/lampp/htdocs/uploads/%s/%s", $username, $value);
                    $newPath = sprintf("/opt/lampp/htdocs/uploads/%s/%s", $selectOption, $value);
                    
                    if (!copy($path, $newPath)) {
                        echo "Failed to copy " .$value. " with " . $selectOption;
                    }else{
                        echo $value . " has been shared with " .$selectOption;
                    }

                }
            }
        ?>
    </section>
</body>
</html>