<?php  

include 'database.php';

$db = new database();
$id = $_GET['department_id'];
$db->remove_user_from_department( [':id' => $id]);

header("refresh:3;url=/ExamenvoorbereidingFons/code/hours.php");



?>