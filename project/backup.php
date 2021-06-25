<body>
        <form action="index.php" method="post">
            <input type="text" name="uname" placeholder="Username" required /><br>
            <input type="password" name="pwd" placeholder="Password" required /><br>
            <span><?php echo ((isset($loginError) && $loginError != '') ? $loginError ."<br>" : '')?></span>
            <input type="submit" name='submit' /><br>
            <a href="signup.php" >New user? Sign up!</a><br>
            <a href="lostpwd.php">Forgot password?</a><br>
        </form>    
    </body>