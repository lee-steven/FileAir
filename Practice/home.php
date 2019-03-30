<!DOCTYPE html>
<head></head>
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
?>

    <form enctype="multipart/form-data" action="upload.php" method="POST">
        <p>
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000"/>
            <label for="uploadfile_input">Choose a file to upload:</label>
            <input name="uploadedfile" type="file" id="uploadfile_input"/>
        </p>

        <p>
            <input type="submit" value="Upload File" />
        </p>
    </form>

    <form action="buff-logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
    </br>
    <?php
        $path   = sprintf("/opt/lampp/htdocs/uploads/%s", $username);
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file){
            $pathFile  = sprintf("uploads/%s/%s", $username, $file);
            echo '<a href="' .$pathFile . '">' . trim($file) . '</a>';

            echo ' <form  action="deleted.php" method="POST">';
                echo '<input type="submit" name = "deleteFile" value="Delete" />';
            echo '</form>';
        }
    ?>

    
</body>
</html>