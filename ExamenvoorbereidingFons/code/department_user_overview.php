<?php
  include '../views/header.php';
  session_start();

  $db = new database();
  $department_user = $db->select("SELECT user_id, departments_id, departments.name, users.username
  FROM department_user
  LEFT JOIN departments ON departments.id = department_user.departments_id
  LEFT JOIN users ON users.id = department_user.user_id

  ", []);

?> 
<table>
<tr>
<th>user_id</th>
<th>departments_id</th>
<th>edit</th>
<th>delete</th>
</tr>
<?php
  foreach ($department_user as $entry){
?>
<tr>
<td><?= $entry['username'] ?></td>
<td> <?= $entry['name']?></td>

<td><a href="update_hours.php?hours_id=<?= $entry['id']?>">edit</a></td>
<td> <a href="delete_hours.php?hours_id=<?= $entry['id']?>">delete </a></td>
<?php }?>
</tr>
</table>