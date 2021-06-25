<?php  
include '../code/database.php';
 // $db = new Database();
// var_dump($db);

 // $db->create_admin();

if($_SERVER['REQUEST_METHOD'] == 'POST' /*&& isset($_POST['create'])*/) {

    $user_id = trim($_POST['user_id']);
    $departments_id = trim($_POST['departments_id']);
    $start_at = trim($_POST['start_date'] . ' ' . $_POST['start_time']);
    $end_at = trim($_POST['end_date'] . ' ' . $_POST['end_time']);

    $db = new Database();
      
    $db->create_hour($user_id, $departments_id, $start_at, $end_at);

}
?>
<!DOCTYPE html>

<html>
<head>
	<title>Inlog</title>
</head>
<body>
	<form action="" method="post">
        <h3>Create hour</h3>
                <label>user:</label><br> 
                <input required type="text" name="user_id"><br> 
                <label>department:</label><br>
                <input required type="text" name="departments_id"><br>
                <label>start date:</label><br>
                <input type="date" name="start_date"><br>	
                <label>start time:</label><br> 
                <input type="time" name="start_time"><br> 
                <label>end date:</label><br> 
                <input type="date" name="end_date"><br>
                <label>end time:</label><br> 
                <input type="time" name="end_time"><br> 
                <button type="submit" name="signup">Create</button>
            </form>
</body>
</html>