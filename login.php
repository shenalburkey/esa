<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration system PHP and MySQL</title>
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    <body>
        
        <div class="login-page">
            <div class="form">
                           <h2>Welcome!</h2>

                <form class="login-form" method="post" action="login.php">
                    <?php include('errors.php'); ?>
                    <div class="input-group">
                        <input type="text" name="username" placeholder="username" >
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" placeholder="password">
                    </div>
                    <div class="input-group">
                        <button type="submit" class="button" name="login_user">Login</button>
                    </div>
                    <p class="message">
                        Not yet a member? <a href="register.php">Sign up</a>
                    </p>
                </form>
            </div>
        </div>


    </body>
</html>