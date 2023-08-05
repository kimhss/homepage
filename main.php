<?php
session_start();
if(!isset($_SESSION['id'])){
    echo "<script>location.href='login.php';</script>";
    exit;
}

$conn = mysqli_connect("localhost", "root", "Kimhss0108@", "home");
$result = mysqli_query($conn, "SELECT * FROM list ORDER BY num DESC");

?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>게시판(메인)</title>
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
                        <div class="modal hidden">
                        <div class="bg"></div>
                            <div class="modalBox">
                                <div class="top"><button class="closeBtn">x</button></div>
                                <form action="write_process.php" method="POST" enctype="multipart/form-data">
                                    <div class="middle">
                                        <div class="right">
                                            <input name="title" id="title" type="text" class="text" placeholder="제목"></input>
                                            <textarea name="content" id="content" class="textarea"  placeholder="무슨 일이 일어나고 있나요?"></textarea>
                                        </div>
                                    </div>
                                    <div id="in_file">
                                        <input class="file" type="file" name="b_file"/>
                                    </div>
                                    <div class="bottom">
                                        <div></div>
                                        <button class="submitBtn" id="submitBtn" type="submit" disabled>작성하기</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="hr">
                <div class="list">
                    <?php
                    echo "<table>";
                    $i=0;
                    if ($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $num = $row['num'];
                            $sql=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(idx) as reply FROM comment WHERE idx = $num"));
                            echo "<tr class=\"tb\">
                            <td class='tbd'><a href='pp_process.php?num=".$num."'>".$row['title']."</a></td>
                            <td width='50px'>댓글</td>
                            <td>".$sql['reply']."</td>
                            </tr>";
                            $i=$i+1;
                            if($i>=10){
                                break;
                            }
                        }
                    }

                    echo "</table>";
                    ?>
                </div>
                <div class="page"></div>
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