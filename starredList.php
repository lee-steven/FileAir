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
            <img src="Logo2.png" class="logo" alt="File Air Logo">
            
            <h3>Welcome, <?php echo trim($username) ?>!</h3>
            <div class="logButton">
                <form action="buff-logout.php" method="post">
                    <input type="submit" value="Logout">
                </form>
            </div>
            <div class="side-nav">
                <a href="home.php">Home</a>
                <a href="starredList.php">Starred</a>
            </div>
        </nav>
    </section>

    <section class="info-home">
                
        <h3>Starred Files</h3>
        <h6>Files</h6><hr>
        <main>
            <?php
                $path   = sprintf("/home/stevenlee/Module2Info/uploads/%s", $username);
                $files = array_diff(scandir($path), array('.', '..'));

                foreach ($files as $file){
                    //To prevent star.txt file from showing up on list
                        $pathFile  = sprintf("uploads/%s/%s", $username, $file);
                        if($file != "star.txt"){
                        
                        $path   = sprintf("/home/stevenlee/Module2Info/uploads/%s/%s", $username, "star.txt");
                        $h= fopen($path, "r");
                        //Boolean to see if username was found
                        $validator = FALSE;

                        //Reading File Line-by-Line
                        while(!feof($h)){
                            if($file == trim(fgets($h))){
                                $validator = TRUE;
                            }
                        }
                        
                        //Checking if validator returned true or false to check if username was in txt file.
                        if($validator== TRUE){
                            echo '<form name="star" action="starred.php" method="POST">';
                                echo '<button type="submit" class="star" name = "star" value="'.$file.'">&#9733</button>';
                            echo '</form>';

                            echo '<a href="' .$pathFile . '">' . trim($file) . '</a>';
                                                    
                            echo '<span class="align-button"><form name="delete" action="deleted.php" method="POST">';
                            echo '<button type="submit" name = "deleteButton" value="'.$file.'">delete.</button>';
                            echo '</form></span>';

                            echo '</br>';
                            echo '</br>';
                            echo '<hr>';
                        }

                        fclose($h);

                    }
                    
                }
            ?>
        </main>
    </section>

    <section class="home-upload">
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
    </section>
    
</body>
</html>