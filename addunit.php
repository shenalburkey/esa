<?php include'server.php'?>
<html>
    <head></head>
    <div class ="header">
            <h2>Add New Unit</h2>
        </div>
    <p>All new Unit names could be added here. Once the unit name 
        is added the system would generate a unit id for the unit
        added.</p>
    <body>
        <form method="POST" action="addunit.php">
            <?php include('errors.php'); ?>
            <lable>Unit Name</lable>
            <input type="text" name="unitname"/>
            <button type="submit" class="btn" name="reg_unit">Register</button>
        </form>
        <?php if (isset($_SESSION['successunit'])) : ?>
                <div class="error success" >
                    <h3>
                        <?php
                          echo $_SESSION['successunit'];
                          unset($_SESSION['successunit']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>
        
    </body>
</html>