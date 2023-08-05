<?php
session_start();

unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['pw']);

echo "<script>alert('로그아웃되었습니다.');
location.href='login.php';</script>";

?>