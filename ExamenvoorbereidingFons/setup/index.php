<?php
include '../code/database.php';
$db = new database;
  $db->create_admin("admin", "admin", "admin@example.org");
  $db->create_user("user5", "user5", "user5@example.org");
  $db->create_default_hours();
  $db->assign_default_users_to_department_user();


?> 