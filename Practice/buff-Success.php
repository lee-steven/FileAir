<?php
ob_start();

echo "Successful Login. Redirecting now ....";
header("Refresh: 3; home.php");
exit();

ob_end_flush();
?>