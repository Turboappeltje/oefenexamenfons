<?php 
include 'database.php';
session_start();

if(isset($_SESSION['username']) && $_SESSION['username'] == true){

    $_SESSION['loggedin'] = true;

    if ($_SESSION['type_id'] == 1) {
    	echo 'hello ' . $_SESSION['username'] . ' ,u bent ingelogd als admin';
    }else{
    	echo 'U bent niet gemachtig om aanpassingen te maken, u word nu verwezen naar de inlog pagina';

        header("refresh:3;url=index.php");
    exit;
    }
}
else {
    echo 'U bent niet ingelogd, u word nu verwezen naar de inlog pagina';

    header("refresh:3;url=index.php");
    exit;
}




$db = new database();
$users = $db->select("SELECT id, type_id, email, username FROM users", []);

        $columns = array_keys($users[0]);
        $row_data = array_values($users);


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
    <table>
            <tr>
                <?php
                    foreach($columns as $column)
                    {echo "<th><strong>$column</strong></th>";}
                ?>

            <th colspan="2">action</th>
            </tr>

            <?php  
                foreach($row_data as $rows){
                    echo "<tr>";
                    foreach($rows as $data){
                        echo "<td>$data</td>";}
            ?>
                    <td>
                        <a href="update_user.php?id=<?php echo $rows['id']?>">edit</a>
                        <a href="/ExamenvoorbereidingFons/code/delete_user.php?id=<?php echo $rows['id']?>">delete</a>
                    </td>
                    </tr>
                <?php 
                    } 
                ?>

    </table>

	<a href="logout.php">Logout</a>
</body>
</html>