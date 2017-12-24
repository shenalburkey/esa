<?php
include 'server.php';
if (isset($_GET['unitid'])) {
    
}
?>

<html>
    <h1>Welcome to Your Quiz</h1>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'registration');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "select * from question where unitid=" . $_GET['unitid'];
    $result = mysqli_query($conn, $sql);
    ?>
    <?php while ($row = mysqli_fetch_array($result)) { ?>

        <form class="login-form" method="post" action="quiz.php">
            <br><br>
            <label><?php echo $row['question']; ?></label><br>
            <input type="radio" name="answer1" value="<?php echo $row['answer1']; ?>">
            <label><?php echo $row['answer1']; ?></label><br>
            <input type="radio" name="answer2" value="<?php echo $row['answer2']; ?>">
            <label><?php echo $row['answer2']; ?></label><br> 
            <input type="radio" name='answer3' value="<?php echo $row['answer3']; ?>">
            <label><?php echo $row['answer3']; ?></label><br>
            <input type="radio" name='answer4' value="<?php echo $row['answer4']; ?>">
            <label><?php echo $row['answer4']; ?></label>
        <?php }
        ?>
        <button type="submit" class="btn" name="_user">Submit</button>
    </form>
</html>