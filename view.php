<?php
    session_start();
    
    $username= $_SESSION['login_user'];
    if (!isset( $_SESSION['login_user'])){
        header("Location: login.php");
        exit();
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $value = $_POST['viewButton'];
        $full_path = sprintf("/home/stevenlee/Module2Info/uploads/%s/%s", $username, $value);
        
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($full_path);
        
        header("Content-Type: ".$mime);
        header('Content-Disposition: inline; filename="'.basename($full_path).'"');//attachment
        readfile($full_path);
    }
?>