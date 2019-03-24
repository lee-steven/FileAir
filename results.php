
<?php
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
        }
        else{
            echo "Failed";
        }
        //Close file
        fclose($h);
    }
    ?>