<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Starred File</title>
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
                if (isset($_POST['star'])) {
                    $value = $_POST['star'];
                    $path   = sprintf("/home/stevenlee/Module2Info/uploads/%s/%s", $username, "star.txt");
                    $h= fopen($path, "r");
                    //Boolean to see if username was found
                    $validator = FALSE;

                    //Reading File Line-by-Line
                    while(!feof($h)){
                        if($value == trim(fgets($h))){
                            $validator = TRUE;
                        }
                    }
                    
                    //Checking if validator returned true or false to check if username was in txt file.
                    if($validator== TRUE){
                        echo "You have UN-starred " .$value;
                        $content = file_get_contents($path);
                        $content = str_replace($value, '', $content);
                        file_put_contents($path, $content);
                    }
                    else{
                        echo "You have starred " .$value;
                        $text = PHP_EOL . $value;
                        file_put_contents($path, $text, FILE_APPEND);
                    }
                    fclose($h);


                }
            }
        ?>
    </section>
</body>