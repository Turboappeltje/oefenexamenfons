<?php  
include '../code/database.php';
 // $db = new Database();
// var_dump($db);

 // $db->create_admin();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    $db = new Database();
      
    $db->create_user($username, $password, $email);


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inlog</title>
</head>
<body>
	<form action="signup.php" method="post">
        <h3>Signup</h3>
                <label>Username:</label><br> 
                <input required type="text" name="username"><br> 
                <label>Password:</label><br>
                <input required type="password" name="password"><br>
                <label>email:</label><br>
                <input required type="email" name="email"><br><br>
                <button type="submit" name="signup">Signup</button>
            </form>
</body>
</html>