
<?php

'require database.php';

$id = $_REQUEST['id'];

$sql = "DELETE FROM person WHERE id=id";

$statement = $connection->prepare($sql);

if ($statement->execute([':id => $id'])){
	
	header("Location: view.php"); 
}
?>