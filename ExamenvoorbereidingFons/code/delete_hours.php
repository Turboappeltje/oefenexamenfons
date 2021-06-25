<?php  

include 'database.php';

$db = new database();
$id = $_GET['hours_id'];
$db->delete_hours( [':id' => $id]);

header("refresh:3;url=/ExamenvoorbereidingFons/code/hours.php");



?>