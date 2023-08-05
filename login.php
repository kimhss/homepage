<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        <link rel="stylesheet" href="login_style.css">
    </head>
    <body>
        <article>
            <div class="login_wrapper">
                <div class="login_logo">로그인</div>
                <form action="login_process.php" method="POST" class="login_form">
                    <input class="login_text" type="email" id="signInEmail" name="email" placeholder="이메일"/>
                    <input class="login_text" type="password" id="signInPassword" name="password" placeholder="비밀번호"/>
                    <button class="login_btn" id="signInButton" type="submit" disabled>로그인</button>
                </form>
                <p>계정이 없으신가요?<a class = "login_bottom" href="join.php" > 가입하기</a></p>
            </div>
        </article>
    </body>
    <script>
        const loginId = document.getElementById('signInEmail');
        const loginPw = document.getElementById('signInPassword');
        const loginBtn = document.getElementById('signInButton');

        function color() {
            if((loginId.value.length>0 && loginId.value.indexOf("@")!==-1) 
                && loginPw.value.length>=5){
                loginBtn.style.backgroundColor = "rgb(248, 180, 131)";
                loginBtn.disabled = false;
            }else{
                loginBtn.style.backgroundColor = "rgb(255, 234, 219)";
                loginBtn.disabled = true;
            }
        }

        loginId.addEventListener('keyup', color);
        loginPw.addEventListener('keyup', color);

    </script>
</html>