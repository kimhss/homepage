<?php
session_start();
if(!isset($_SESSION['id'])){
    echo "<script>location.href='login.php';</script>";
    exit;
}

$conn = mysqli_connect("localhost", "root", "Kimhss0108@", "home");
$result = mysqli_query($conn, "SELECT * FROM list ORDER BY num DESC");

$num = $_GET['num'];
$wrt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM list WHERE num = '$num'"));

$title = $wrt['title'];
$content = $wrt['content'];
$id = $wrt['id'];
$file = $wrt['file'];

$tmp = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'"));
$nickname = $tmp['name'];

$rplist = mysqli_query($conn, "SELECT * FROM comment WHERE idx = '$num'");
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 조회</title>
    <link rel="stylesheet" href="main_style.css">
</head>
<body>
    <div class="container">
            <div class="item">
                <div class="home">
                    <a href="main.php"><img class="home" src="home.png"></a>
                </div>
                <div class="logout">
                    <a href="logout_process.php">로그아웃</a>
                </div>
            </div>
            <div class="item">
                <div class="main">
                    <div class="title">게시판</div>
                    <div class="write">
                        <button class="openBtn" type="button"><img class="img_btn" src="write.png" alt="버튼이미지"></button>
                        <div class="modal">
                            <div class="bg"></div>
                            <div class="modalBox">
                                <div class="top"><button class="closeBtn">x</button></div>
                                <form action="modify_ok.php?num=<?php echo $num;?>" method="POST">
                                    <div class="middle">
                                        <div class="right">
                                            <input name="title" id="title" type="text" class="text" placeholder='<?php echo $title; ?>' required></input>
                                            <textarea name="content" id="content" class="textarea"  placeholder="무슨 일이 일어나고 있나요?" required><?php echo $content; ?></textarea>
                                        </div>
                                    </div>
                                    <div id="in_file">
                                        <input class="file" type="file" name="b_file"/>
                                    </div>
                                    <div class="bottom">
                                        <div></div>
                                        <button class="submitBtn" id="submitBtn" type="submit" disabled>수정하기</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="hr">
                <div class="overscroll">
                    <div class="list">
                        <div class="M">
                            <div class="R">
                                <?php
                                if ($_SESSION['id'] === $id) {
                                    echo "<div class=\"etc\">
                                    <a href='modify_process.php?num=".$num."'>수정 </a>
                                    <a href='delete_process.php?num=".$num."'>| 삭제</a>
                                    </div>";
                                }
                                ?>
                                <p class="nickname"><?php echo $nickname.' '.$id ?><p>
                                <p class="title1"><?php echo $title?><p>
                                <p class="content1"><?php echo $content?></p>
                                <?php
                                if ($file){
                                    echo "<p class='d_file'>파일 : <a href='upload/".$file."' download>".$file."</a></p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <form action="reply_process.php?num=<?php echo $num?>" class="comment" method="POST">
                        <textarea name="reply" class="reply" placeholder="댓글을 입력하세요."></textarea>
                        <button name="replyBtn" class="replyBtn" type="submit">등록</button>
                    </form>
                    <div class="reply_list">
                        <?php
                        if($rplist) {
                            while($row = mysqli_fetch_assoc($rplist)){
                                echo "<div class='rpBox'>"; 
                                if($_SESSION['id']===$row['id']){
                                    echo"<p class='rr'><a>수정 |</a><a href='rpldelete_process.php?num=".$num."&content=".$row['mention']."&date=".$row['dat']."'> 삭제</a></p>";
                                }
                                echo "<p class='nBold'>".$row['nickname']." ".$row['id']."</p>
                                <p class='mention'>".$row['mention']."</p>
                                <p class='line'>".$row['dat']."</p></div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="item">
                <form action="search_process.php" method="GET" >
                    <input name="search" type="text" class="search" placeholder="게시글 검색"/> 
                </form>
                <ul>
                    <?php  
                    //인기글 10개 
                    ?>
                </ul>
            </div>
        </div>
</body>
<script>
        const title = document.getElementById('title');
        const content = document.getElementById('content');
        const submit =document.getElementById('submitBtn');

        function color() {
            if(title.value.length>0 && content.value.length>0) {
                submit.style.backgroundColor = "rgb(248, 180, 131)";
                submit.disabled = false;
            }else{
                submit.style.backgroundColor = "rgb(255, 234, 219)";
                submit.disabled = true;
            }
        }

        title.addEventListener('keyup', color);
        content.addEventListener('keyup', color);

        const open = () =>{
            document.querySelector(".modal").classList.remove("hidden");
        }

        const close = () => {
            document.querySelector(".modal").classList.add("hidden");
        }

        document.querySelector(".openBtn").addEventListener("click", open);
        document.querySelector(".closeBtn").addEventListener("click", close);
        document.querySelector(".bg").addEventListener("click", close);
        

    </script>
</html>