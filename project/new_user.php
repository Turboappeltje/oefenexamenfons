<?php

include 'database.php';
include 'helper.php';
// initialize the session
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('location: index.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && !empty($_POST['submit'])){

    // array with values of the name attribute of the form (required fields)
    $fields = [
        'type_id', 'uname', 'email', 'pwd', 'fname', 'lname'
    ];

    $obj = new Helper();
    $fields_validated = $obj->field_validation($fields);

    if($fields_validated){
        // account
        $type_id = $_POST['type_id'];
        echo $_SESSION['usertype'];
        $uname = trim(strtolower($_POST['uname']));
        $email = trim(strtolower($_POST['email']));
        $pwd = trim(strtolower($_POST['pwd']));


        // person
        $fname = trim(strtolower($_POST['fname']));
        $mname = isset($_POST['mname']) ? trim(strtolower($_POST['mname'])) : NULL; //nullable
        $lname = trim(strtolower($_POST['lname']));

        $db = new database('localhost', 'root', '', 'project', 'utf8');
        $msg = $db->sign_up($uname, $type_id, $fname, $mname, $lname, $email, $pwd);

    }else{
        $missingFieldError = "Input for one of more fields missing. Please provide all required values and try again.";
    }

}
?>

<html>
    <head>
        <title>Welcome!</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="topnav">
            <a class="active" href="welcome_user.php">Home</a>
            <a href="new_user.php">Add user</a>
            <a href="edit_delete.php">View, Edit and/or Delete users</a>
            <a href="logout.php">Logout</a>
        </div>
        <form action="new_user.php" method="POST">
            <h1> Account details </h1>
            <select name='type_id' id='type_id'>
                <option value=1>Admin</option>
                <option value=2>User</option>
            </select><br>
            <input type="text" name="uname" placeholder="Gebruikersnaam" value="<?php echo isset($_POST["uname"]) ? htmlentities($_POST["uname"]) : ''; ?>" required /><br>
            <input type="email" name="email" placeholder="Email" value="<?php echo isset($_POST["email"]) ? htmlentities($_POST["email"]) : ''; ?>" required /><br>
            <input type="password" name="pwd" placeholder="Password" value='helloworld' required /><br>


            <h1> Person details </h1>
            <input type="text" name="fname" placeholder="Voornaam" value="<?php echo isset($_POST["fname"]) ? htmlentities($_POST["fname"]) : ''; ?>" required /><br>
            <input type="text" name="mname" placeholder="Tussenvoegsel" value="<?php echo isset($_POST["mname"]) ? htmlentities($_POST["mname"]) : ''; ?>"/><br>
            <input type="text" name="lname" placeholder="Achternaam" value="<?php echo isset($_POST["lname"]) ? htmlentities($_POST["lname"]) : ''; ?>" required /><br>

            <span><?php echo ((isset($msg) && $msg != '') ? htmlentities($msg) ." <br>" : '')?></span>
            <input type="submit" name="submit" value="Sign up!"/>
        </form>
        
    </body>
</html>