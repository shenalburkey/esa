<?php
//display units
function display() {

    $conn = mysqli_connect('localhost', 'root', '', 'registration');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * from UNIT";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <a href="lessons.php?unitid=<?php echo $row['unitid']; ?>"><?php echo $row['unitname']; ?><br></a><?php
        }
    } else {
        echo "0 results";
    }
}


function delete() {

    $conn = mysqli_connect('localhost', 'root', '', 'registration');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * from UNIT";
    $sql2 ="DELETE FROM UNIT";
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <a href="lessons.php?unitid=<?php echo $row['unitid']; ?>"><?php echo $row['unitname']; ?><br></a><br><br><?php
        }
    } else {
        echo "0 results";
    }
}

function quizstart() {

    $conn = mysqli_connect('localhost', 'root', '', 'registration');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * from UNIT";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <a href="quiz.php?unitid=<?php echo $row['unitid']; ?>">Take Quiz</a><?php
        }
    } else {
        echo "0 results";
    }
}
?>
