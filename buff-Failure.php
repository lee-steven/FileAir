<?php
ob_start();

echo "Incorrect username. Redirecting now ....";
header("Refresh: 3; login.php");
exit();

ob_end_flush();
?>