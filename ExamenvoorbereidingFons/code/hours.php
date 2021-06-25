<?php
	include '../views/header.php';
	session_start();

	$db = new database();
	$hours = $db->select("SELECT hours.id, departments_id, user_id, start_at, end_at, hours.created_at, hours.updated_at, departments.name, users.username
 	FROM hours
 	LEFT JOIN departments ON departments.id = hours.departments_id
  	LEFT JOIN users ON users.id = hours.user_id", []);

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
	foreach ($hours as $entry){
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