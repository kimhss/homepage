<?php
session_start();
if(!isset($_SESSION['id'])){
    echo "<script>location.href='login.php';</script>";
    exit;
}

$conn = mysqli_connect("localhost", "root", "Kimhss0108@", "home");
$result = mysqli_query($conn, "SELECT * FROM comment");

$num = $_GET['num'];
$content = $_GET['content']; //mention
$date = $_GET['date'];  //dat

$sql = mysqli_query($conn, "DELETE FROM comment WHERE idx = $num AND mention = '$content' AND dat = '$date' AND id = '".$_SESSION['id']."'");


echo "<script>location.href='pp_process.php?num=".$num."';</script>";
?>