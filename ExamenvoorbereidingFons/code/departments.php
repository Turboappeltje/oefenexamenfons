<?php
	include '../views/header.php';
	session_start();

	$db = new database();
	$departments = $db->select("SELECT user_id, users.username 
	FROM department_user
	INNER JOIN users ON user_id = users.id
	WHERE department_id = :department_id", []);

?> 
<table>
<tr>
<th>departments_id</th>
<th>user_id</th>
<th>start_at</th>
<th>end_at</th>
<th>created_at</th>
<th>updated_at</th>
<th>edit</th>
<th>delete</th>
<th>create</th>
</tr>
<?php
	foreach ($departments as $entry){
?>
<tr>
<td> <?= $entry['username']?></td>
<td><?= $entry['name'] ?></td>
<td> <?= $entry['start_at']?></td>
<td><?= $entry['end_at'] ?></td>
<td><?= $entry['created_at'] ?></td>
<td><?= $entry['updated_at'] ?></td>

<td><a href="update_hours.php?hours_id=<?= $entry['id']?>">edit</a></td>
<td> <a href="delete_hours.php?hours_id=<?= $entry['id']?>">delete </a></td>
<td> <a href="/ExamenvoorbereidingFons/views/create_hour.php">create </a></td>
<?php }?>
</tr>
</table>