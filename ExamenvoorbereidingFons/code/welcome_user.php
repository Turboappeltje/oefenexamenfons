<?php 
session_start();

if(isset($_SESSION['username']) && $_SESSION['username'] == true){

    $_SESSION['loggedin'] = true;

    if ($_SESSION['type_id'] == 1) {
    	echo 'U bent niet gemachtigd om deze pagina te bekijken, u word nu verwezen naar de inlog pagina';

    	 header("refresh:3;url=index.php");
    	 exit;
    	
    }else{
    	echo 'hallo ' . $_SESSION['username'] . ' ,u bent ingelogd als user';
    }

}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
	<a href="logout.php">Logout</a>
</body>
</html>