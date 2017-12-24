<?php
include ("functions.php");
include 'server.php';
if (isset($_GET['id'])) {
    
}
$sql = "SELECT lessons.lessonid, lessons.lessonname, lessons.lesson, unit.unitname AS unitname FROM lessons JOIN unit ON (lessons.unitid=unit.unitid) WHERE lessons.unitid=" . $_GET['unitid'];
if ($stock_query = mysqli_query($db, $sql)) {
    $stock_rs = mysqli_fetch_assoc($stock_query);
}
?>

<h1><?php echo $stock_rs['unitname']; ?></h1>
<?php do { ?>


    <a href="index.php?page=item&lessonid=<?php echo $stock_rs['lessonid']; ?>"></a>
    <h3><?php echo $stock_rs['lessonname']; ?></h3>
    <p><?php echo $stock_rs['lesson']; ?></p><br>


    <?php
} while ($stock_rs = mysqli_fetch_assoc($stock_query))
?>
<a href="index.php?page=item&lessonid=<?php echo $stock_rs['lessonid']; ?>">Next Page</a> 

<a href="index.php">Back</a> 

<?php
quizstart();
?>