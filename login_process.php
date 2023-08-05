<?php
session_start();

$conn = mysqli_connect("localhost","root", "Kimhss0108@", "home");

$id = $_POST['email'];
$pw = $_POST['password'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

$_SESSION['id'] = $id;
$_SESSION['name'] = $row['name'];
$_SESSION['pw'] = $pw;


if($result){
    if($pw == $row['pw']){
        echo "<script>location.href='main.php';</script>";
    }
    else {
        echo "<script>alert('이메일 또는 비밀번호를 잘못 입력하였습니다.');</script>";
        echo "<script>location.href='login.php';</script>";
    }
}
else{
    echo "<script>alert('이메일 또는 비밀번호를 잘못 입력하였습니다.');</script>";
    echo "<script>location.href='login.php';</script>";
}
?>