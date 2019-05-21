<?php
    session_start();
    session_destroy();
    header("Location: 3 buff-logout.php");
    exit();
?>