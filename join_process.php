<?php
$conn = mysqli_connect("localhost", "root", "Kimhss0108@", "home");

$id = $_POST['email'];
$pw = $_POST['password'];
$name = $_POST['name'];

$sql = "INSERT INTO users (id, pw, name) VALUES ('$id', '$pw', '$name')";

if(mysqli_query($conn, $sql)) {
    echo "<script>alert(\"회원가입이 완료되었습니다.\")
    location.href='login.php';</script>";
}
?>