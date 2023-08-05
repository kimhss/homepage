<?php
session_start();
if(!isset($_SESSION['id'])){
    echo "<script>location.href='login.php';</script>";
    exit;
}

$conn = mysqli_connect("localhost", "root", "Kimhss0108@", "home");
$result = mysqli_query($conn, "SELECT * FROM list ORDER BY num DESC");

$num = $_GET['num'];
$sql = mysqli_query($conn, "DELETE FROM list WHERE num ='".$num."'");

$row = mysqli_query($conn, "DELETE FROM comment WHERE idx ='".$num."'");

echo "<script>location.href='main.php';</script>";

?>