<?php
session_start();
if(!isset($_SESSION['id'])){
    echo "<script>location.href='login.php';</script>";
    exit;
}

$conn = mysqli_connect("localhost", "root", "Kimhss0108@", "home");
$result = mysqli_query($conn, "SELECT * FROM list ORDER BY num DESC");

$num = $_GET['num'];
$title = $_POST['title'];
$content = $_POST['content'];

$sql = mysqli_query($conn, "UPDATE list SET title = '".$title."', content='".$content."' WHERE num = ".$num."");

echo "<script>alert(\"수정되었습니다.\");
location.href=\"pp_process.php?num=".$num."\";</script>";

?>

