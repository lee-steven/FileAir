
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