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
$id = $_GET['hours_id'];

$hours = $db->select("SELECT id, departments_id, user_id, start_at, end_at FROM hours WHERE id= :id", [':id' => $id]);

        $columns = array_keys($hours[0]);
        $row_data = array_values($hours);

                foreach($columns as $column){}
                foreach($row_data as $rows){}
                foreach($rows as $data){}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $departments_id = ($_POST['departments_id']);
    $user_id = ($_POST['user_id']);
    $start_at = ($_POST['start_at']);
    $end_at = ($_POST['end_at']);
      
    $db->update_hours($id, $departments_id, $user_id, $start_at, $end_at);


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
                        <a href="update_hours.php?hours_id=<?php echo $rows['id']?>">edit</a>
                         <a href="overzicht_artikelen.php?Artikelid=<?php echo $rows['Artikelid']?>">delete</a> 
                    </td>
                    </tr>
                <?php 
                    } 
                ?>

    </table>

<form action="update_hours.php?hours_id=<?php echo  $rows['id']?>" method="post">
<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">

<input type="text" name="departments_id" placeholder="departments_id" value="<?php echo $rows['departments_id']?>">
<label>departments_id</label><br>
<input type="text" name="user_id" placeholder="user_id" value="<?php echo  $rows['user_id']?>">
<label>user_id</label><br>
<input type="text" name="start_at" placeholder="start_at" value="<?php echo $rows['start_at']?>">
<label>start_at</label><br>
<input type="text" name="end_at" placeholder="end_at" value="<?php echo $rows['end_at']?>">
<label>end_at</label><br>
<input type="submit" name="submit "value="Update">

</form>
	<a href="logout.php">Logout</a>
    <a href="users.php">users</a>
</body>
</html>