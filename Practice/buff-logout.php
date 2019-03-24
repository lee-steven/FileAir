<?php
session_start();
session_destroy();

ob_start();

echo "Logging you out ....";
header("Refresh: 3; login.php");
exit();

ob_end_flush();
?>