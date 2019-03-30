<!DOCTYPE html>
<head>
    <link rel="icon" href="LogoIcon.png" type="image/png" sizes="20x20">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" type = "text/css" href = "CSS/stylesheet2.css" />
    <link href="https://fonts.googleapis.com/css?family=Heebo:300" rel="stylesheet">
    <link rel="icon" href="LogoIcon.png" type="image/png" sizes="20x20">
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


?>
    <section class="sidebar-home">
        <nav>
            <h3>Welcome</h3>
            <img src="default.png" alt="Avatar" class="avatar">
            <h3><?php echo $username ?></h3>

            <form action="buff-logout.php" method="post">
                <input type="submit" value="Logout">
            </form>
        </nav>

    </section>

    <section class="info-home">
                
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

        <?php
            $path   = sprintf("/opt/lampp/htdocs/uploads/%s", $username);
            $files = array_diff(scandir($path), array('.', '..'));

            foreach ($files as $file){
                $pathFile  = sprintf("uploads/%s/%s", $username, $file);
                echo '<a href="' .$pathFile . '">' . trim($file) . '</a>';

                echo '<form name="delete" action="deleted.php" method="POST">';
                    echo '<button type="submit" name = "deleteButton" value="'.$file.'">Delete</button>';
                echo '</form>';
                echo '</br>';
                echo '</br>';
            }
        ?>
    </section>
    
</body>
</html>