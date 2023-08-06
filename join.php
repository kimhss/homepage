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
                <div class="login_logo">회원가입</div>
                <form action="join_process.php" method="POST" class="login_form">
                    <input class="login_text" type="email" id="signUpEmail" name="email" placeholder="이메일"/>
                    <input class="login_text" type="text" id="Username" name="name" placeholder="닉네임"/>
                    <input class="login_text" type="password" id="signUpPassword" name="password" placeholder="비밀번호"/>
                    <button class="login_btn" id="signUpButton" type="submit" disabled>가입</button>
                </form>
                <p>계정이 있으신가요?<a class = "login_bottom" href="login.php" > 로그인 </a></p>
                <p>이 사람들아 가입 안 되는게 아니고 이메일 양식과 비밀번호 6자리 이상입니다;;;</p>
            </div>
        </article>
    </body>
    <script>
        const loginId = document.getElementById('signUpEmail');
        const loginPw = document.getElementById('signUpPassword');
        const loginBtn = document.getElementById('signUpButton');

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
