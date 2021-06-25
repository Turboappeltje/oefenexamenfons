<?php

session_start();

$_SESSION = ['username'];
$_SESSION = ['id'];

session_destroy();

 header('location: ../index.php');
exit;
?>