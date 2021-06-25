<?php

include 'database.php';
include 'helper.php';

// check the signup.php file for explanation on code
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && !empty($_POST['submit'])){
    $fields = ['uname', 'pwd'];

    $obj = new Helper();
    $fields_validated = $obj->field_validation($fields);

    if($fields_validated){
        $uname = trim($_POST['uname']);
        $password = trim($_POST['pwd']);
        
        $db = new database('localhost', 'root', '', 'project', 'utf8');

        // user redirected to welcome page in case of succesful login.
        // unsuccessfull login results in an error message (string)
        $loginError = $db->login($uname, $password);
    }
}
?>

<html>
    <head>
            <title>Login</title>
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <!-- link cascading style sheet -->
            <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="index.php" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="uname" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="pwd" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <span><?php echo ((isset($loginError) && $loginError != '') ? $loginError ."<br>" : '')?>
                                </span>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="signup.php" class="text-info">Register here</a>
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="lostpwd.php" class="text-info" >Forgot password?</a><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
