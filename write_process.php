<?php
session_start();
$conn = mysqli_connect("localhost", "root", "Kimhss0108@", "home");

$id = $_SESSION['id'];
$title = $_POST['title'];
$content = $_POST['content'];

$tmpfile = $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR", $_FILES['b_file']['name']);
$folder = "upload/".$filename."";
move_uploaded_file($tmpfile, $folder);

if($o_name) {
    $sql = "INSERT INTO list (id, title, content, created, file) VALUES ('$id', '$title', '$content', now(), '$o_name')";
}
else {
    $sql = "INSERT INTO list (id, title, content, created) VALUES ('$id', '$title', '$content', now())";
}

if(mysqli_query($conn, $sql)) {
    echo "<script>location.href='main.php';</script>";
}
?>
