<?php
session_start();
$conn = mysqli_connect("localhost", "root", "Kimhss0108@", "home");
if(!isset($_SESSION['id'])){
    echo "<script>location.href='login.php';</script>";
    exit;
} //연결에 이상 없음

$num = $_GET['num'];
$id = $_SESSION['id'];
$mention = $_POST['reply'];

$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'"));
$name = $row['name'];

$sql = "INSERT INTO comment (idx, id, nickname, mention, dat) VALUES ($num, '$id', '$name', '$mention', now())";

$result = mysqli_query($conn, $sql);
if($result === false){
    echo mysqli_error($conn);
}
else {
    echo "<script>location.href='pp_process.php?num=".$num."';</script>";
}
?>