<?php 

session_start();
$_SESSION = [0];
session_destroy();
session_unset();

header("Location: login.php");
exit;
?>