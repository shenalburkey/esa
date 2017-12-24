<?php include'server.php' ?>

<html>
    <head><link rel="stylesheet" type="text/css" href="css/addquiz.css"></head>
    <h1>Include question</h1>
    <body>
        <form class="form-style-1" method="post" action="addquiz.php">
            
            <label>Unit Name</label>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'registration');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "select unitid,unitname from unit";
            $result = mysqli_query($conn, $sql);

            echo "<select name='unitid'>";
            while ($row = mysqli_fetch_array($result)) {
                echo '<option value=" '. $row['unitid'] .' ">' . $row['unitname'] . '</option>';
            }
            echo '</select>';
            ?> 
            <br>
            <label>Question</label>
            <input type="text" name="question"><br>
            <label>Answer 1</label>
            <input type="text" name="answer1"><br>
            <label>Answer 2</label>
            <input type="text" name="answer2"><br>
            <label>Answer 3</label>
            <input type="text" name="answer3"><br>
            <label>Answer 4</label>
            <input type="text" name="answer4"><br>
            <label>Correct Answer</label>
            <input type="text" name="trueans"><br>
            <button type="submit" class="btn" name="add_question">Add new question</button>
        </form>
        
    </body>
</html>


