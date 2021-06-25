<?php  

include 'database.php';

$db = new database();
$id = $_GET['id'];
$db->delete_user( [':id' => $id]);

header("refresh:3;url=../users.php");



?>