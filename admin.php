<?php
session_start();
$username = "";

if (!isset($_SESSION['username'])) {
    if ($username == "administrator") {
        $_SESSION['msg'] = "You must log in first";
        header('location: admin.php');
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: admin.php");
}
?>
<html>
    <body>
    <head>

    </head>
    <h1>Dashboard</h1>
    <a href="addunit.php">Add Unit</a>
    <a href="deleteunit.php">Delete Unit</a>
    <a href="">Edit Unit</a>



    <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <div class="hyper">
                    <p style="outline:green dotted thick" >    
                        <?php
                        include 'functions.php';
                        display();
                        ?>
                    </p>
                </div>


</body>
</html>