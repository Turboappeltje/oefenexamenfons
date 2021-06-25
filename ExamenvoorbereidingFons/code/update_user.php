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

$db = new database();
$id = $_GET['id'];

$users = $db->select("SELECT id, type_id, username, email FROM users WHERE id= :id", [':id' => $id]);

        $columns = array_keys($users[0]);
        $row_data = array_values($users);

                foreach($columns as $column){}
                foreach($row_data as $rows){}
                foreach($rows as $data){}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = ($_POST['id']);
    $type_id = ($_POST['type_id']);
    $username = ($_POST['username']);
    $email = ($_POST['email']);

    $db = new Database();
      
    $db->update_user($id, $type_id, $username, $email);


}               
}
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
                         <a href="overzicht_artikelen.php?Artikelid=<?php echo $rows['Artikelid']?>">delete</a> 
                    </td>
                    </tr>
                <?php 
                    } 
                ?>

    </table>

<form action="update_user.php?id=<?php echo  $rows['id']?>" method="post">
<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">

<input type="text" name="type_id" placeholder="type_id" value="<?php echo $rows['type_id']?>">
<label>type_id</label><br>
<input type="text" name="email" placeholder="email" value="<?php echo  $rows['email']?>">
<label>email</label><br>
<input type="text" name="username" placeholder="username" value="<?php echo $rows['username']?>">
<label>username</label><br>
<input type="submit" name="submit "value="Update">

</form>
	<a href="logout.php">Logout</a>
    <a href="users.php">users</a>
</body>
</html>