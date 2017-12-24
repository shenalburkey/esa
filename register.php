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
            <form class="login-form" method="post" action="register.php">

                <?php include('errors.php'); ?>

                <div class="input-group">
                    <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
                </div>
                <div class="input-group">
                    <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email">
                </div>
                <div class="input-group">
                    <input type="password" name="password_1" placeholder="Password">
                </div>
                <div class="input-group">
                    <input type="password" name="password_2" placeholder="Confirm Password">
                </div>
                <div class="input-group">
                    <button type="submit" class="btn" name="reg_user">Register</button>
                </div>
                <p class="message">
                    Already a member? <a href="login.php">Sign in</a>
                </p>
            </form>
        </div>
        </div>>
    </body>
</html>