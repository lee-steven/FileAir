<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    echo '<section class="loading">';
    $filename = basename($_FILES['uploadedfile']['name']);
    if( !preg_match('/^[\w_\.\-]+$/', $filename)){
        echo "Invalid filename";
        exit;
    }
    
    $full_path=sprintf("/opt/lampp/htdocs/uploads/%s/%s", $username, $filename);

    if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path)){
        echo "Upload Successful";
    }
    else{
        echo "Upload Failed";
    }
    echo'</section>';
?>
</body>
</html>