<?php

session_start();

// variable declaration
$username = "";
$email = "";
$unitname = "";
$lessonname= "";
$lessonid= "";
$question= "";
$test= "";
$errors = array();
$_SESSION['success'] = "";

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }

    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database
        $query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}

// ... 
// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            if ($username == "administrator") {
                header('location: admin.php');
            } else if ($_SESSION['username'] = $username) {
                $_SESSION['success'] = "You are now logged in";
                header('location: index.php');
            }
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

// ADD UNIT
if (isset($_POST['reg_unit'])) {
    // receive all input values from the form
    $unitname = mysqli_real_escape_string($db, $_POST['unitname']);
    // form validation: ensure that the form is correctly filled
    if (empty($unitname)) {
        array_push($errors, "Unit is required");
    }
    // register unit if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO unit (unitname) VALUES ('$unitname')";
        mysqli_query($db, $query);

        $_SESSION['unitname'] = $unitname;
        $_SESSION['successunit'] = "You have sucessfully added a new unit";
        header('location: admin.php');
    }
}

//ADD LESSON
if (isset($_POST['reg_lesson'])) {
    // receive all input values from the form
    $lessonname = mysqli_real_escape_string($db, $_POST['lessonname']);
    // form validation: ensure that the form is correctly filled
    if (empty($lessonname)) {
        array_push($errors, "Lesson is required");
    }
    // register unit if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT into lessons.lessonid, lessons.lessonname, lessons.lesson, unit.unitname AS unitname FROM lessons JOIN unit ON (lessons.unitid=unit.unitid) WHERE lessons.unitid=" . $_GET['unitid'];
        mysqli_query($db, $query);

        $_SESSION['lessonname'] = $lessonname;
        $_SESSION['successunit'] = "You have sucessfully added a new unit";
        header('location: addunit.php');
    }
}

//Add question
if (isset($_POST['add_question'])) {
    // receive all input values from the form
    $question = mysqli_real_escape_string($db, $_POST['question']);
    // form validation: ensure that the form is correctly filled
    if (empty($question)) {
        array_push($errors, "Question is required");
    }
    // register unit if there are no errors in the form
    if (count($errors) == 0) {
        $query = "insert into question(unitid,question,answer1,answer2,answer3,answer4,trueans) values ('$_POST[unitid]','$question','$_POST[answer1]','$_POST[answer2]','$_POST[answer3]','$_POST[answer4]','$_POST[trueans]')";
        mysqli_query($db, $query);

        $_SESSION['question'] = $question;
        $_SESSION['successquestion'] = "You have sucessfully added a new question";
        header('location: addquiz.php');
    }
}

//Read Question
if (isset($_POST['read_question'])) {
    // receive all input values from the form
    $question = mysqli_real_escape_string($db, $_POST['id']);
    // form validation: ensure that the form is correctly filled
    if (empty($test)) {
        array_push($errors, "Answer is required");
    }
    // register unit if there are no errors in the form
    if (count($errors) == 0) {
        $query = "Select * from question where unitid=".$POST[unitid];
        mysqli_query($db, $query);

        $_SESSION['question'] = $question;
        $_SESSION['successquestion'] = "You have sucessfully added a new question";
        header('location: quiz.php');
    }
}

?>