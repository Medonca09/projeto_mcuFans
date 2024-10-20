<?php 

session_start();

session_destroy();

header('Location: admLogin.php');
exit;
?>