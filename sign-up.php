<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create your FileAir Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Heebo:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/stylesheet.css" />
    <link rel="icon" href="LogoIcon.png" type="image/png" sizes="20x20">

</head>
<body>
    <div class="back-butt">
        <a href="home.php" class="previous round">&#8249;</a>
    </div>
    <main>
        <div class="create-account">
            <img src="Logo2.png" class="logo" alt="File Air Logo">
            <h3>Create your FileAir Account</h3>
            <h4>to continue to FileShare</h4>
            <?php
                if(isset($_POST['new-user'])){
                    $username=$_POST['new-user'];
                    $h= fopen("/home/stevenlee/Module2Info/users.txt", "r");

                    //Boolean to see if username was found
                    $validator = FALSE;

                    //Reading File Line-by-Line
                    while(!feof($h)){
                        if($_POST['new-user'] == trim(fgets($h))){
                            $validator = TRUE;
                        }
                    }
                    
                    //Checking if validator returned true or false to check if username was in txt file.
                    if($validator== TRUE){
                        echo '<label for="fail-sign-up">This username already exists!</label>';
                    }
                    else{
                        echo '<label for="success-sign-up">Your account has been created successfully!</label>';
                        $text = PHP_EOL . $username;
                        file_put_contents("/home/stevenlee/Module2Info/users.txt", $text, FILE_APPEND);
                        mkdir("/home/stevenlee/Module2Info/uploads/". $username, 0757,true);
                        $filename = sprintf("/home/stevenlee/Module2Info/uploads/%s/%s", $username, "star.txt");
                        $handle = fopen($filename, 'w') or die('cannot open the file');
                        fclose($handle);
                        chmod($filename, 0757);
                    }
                    fclose($h);
                }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <input type="text" id="new-user" placeholder="Enter a valid username" name="new-user" />
                </br>
                <input type="submit" id="sign_in" value="Continue"/>
            </form>
        </div>
    </main>


</body>
</html>