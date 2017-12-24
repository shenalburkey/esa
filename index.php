
<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
    
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    </head>
        <body>
            <ul>
            <li style="float:right"><a href="Student.jsp">Home</a></li>
            <li style="float:right"><a href="quizdisplay.jsp">Quiz</a></li>
            
            <li style="float:right"><a href="index.php?logout='1'" style="color: red;">Log Out</a></li>
        </ul>
            <!--<div class="section"> 
                <h1 class="heading3">Let's get started!</h1>
            </div>**/
            <div class="heading"> -->
                <h1>WELCOME</h1>
            </div>
            <div class="content">
                <p align="center">There are times when the students feel totally frustrated and lost in the way to 
                    find better education provisions for them and this is where this project (educational 
                    website for advanced level ICT students) leave a massive impact. It Provides detailed
                    knowledge about the study programs and keep updating people with the latest 
                    educational news mainly focused to the advanced level ICT subject in Sri Lanka.</p>
                <p align = "center">Our project would play a major role in upgrading the traditional methods of learning 
                    adopted by students and move forward to a more up to date method which is both convenient and 
                    efficient. The project would be developed in a manner where the students can view content about 
                    the subject they would like to study and take part in various quizzes on the subject.</p>
                <p align ="center">The ultimate goal of this project would be to inspire individuals to  develop  their  
                    capabilities  to  the highest potentials by providing a convenient and equal method to learn 
                    ICT for all </p>
                <!-- notification message -->
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="error success" >
                        <h3>
                            <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?>

                <!-- logged in user information -->

                <?php if (isset($_SESSION['username'])) : ?>
                    <p>Welcome <?php echo $_SESSION['username']; ?></p>
                    <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
                <?php endif ?>
                <div class="hyper">
                    <p style="" >    
                        <?php
                        include 'functions.php';
                        display();
                        ?>
                    </p>
                </div>

                </tbody>
                </table>


            </div>

        </body>
    </div>
</html>