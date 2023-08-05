<?php
session_start();
if(!isset($_SESSION['id'])){
    echo "<script>location.href='login.php';</script>";
    exit;
}

$conn = mysqli_connect("localhost", "root", "Kimhss0108@", "home");
$result = mysqli_query($conn, "SELECT * FROM list ORDER BY num DESC");

$id = $_SESSION['id'];
$num = $_GET['num'];
$mention = $_GET['content'];
$date = $_GET['date'];

$getmention = $_POST['reply'];

$sql = mysqli_query($conn, "UPDATE comment SET mention = '$getmention' WHERE idx = '$num' AND dat = $date AND id = '$id'");

echo "<script>alert(\"수정되었습니다.\");
location.href=\"pp_process.php?num=".$num."\";</script>";

?>