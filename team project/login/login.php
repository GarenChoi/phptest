<?php
   include "../../connect/connect.php";
   include "../../connect/session.php";
?>
<?php
    if(isset($_COOKIE['id'])){
        $cookie_id = $_COOKIE['id'];
    } else {
        $cookie_id = "";
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>

    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
</head>
<body>
    <!-- header -->
    <?php
        include "../include/header.php";
    ?>

    <!-- contents -->
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="login-type defaultBg">
            <div class="member-form">
                <div class="logo"><img src="../img/Logo.png" alt="로고"></div>
                <h3>로그인</h3>
                
                <form action="loginSave.php" name="login" method="post">
                    <fieldset>
                        <legend class="ir_so">로그인 입력폼</legend>
                        <div class="login-box">
                            <div>
                                <label for="youEmail">이메일 주소</label>
                                <input type="email" id="youEmail" name="youEmail" placeholder="Sample@naver.com" value="<?=$cookie_id?>" autocomplete="off" required>
                            </div>
                            <div class="mt30">
                                <label for="youPass">비밀번호</label>
                                <input type="password" id="youPass" name="youPass" maxlength="20" placeholder="비밀번호를 적어주세요!" autocomplete="off" required>
                            </div>
                            <div>
                                <label for="agree">
                                    <input class="select" type="checkbox" id="agree" name="agree">
                                    <span class="agree">회원정보 기억하기</span>
                                </label>                
                            </div>
                        </div>
                        <div class="another">
                            <img src="../img/Google.png" alt="구글"> 
                            <img src="../img/Kakao.png" alt="카카오">
                            <img src="../img/Naver.png" alt="네이버">
                        </div>
                        <button id="loginBtn" class="login-submit" type="submit"  onclick="sendit()">로그인</button>
                        <div class="other">
                            <a href="join.php">회원가입</a>
                            <a href="findID.php">아이디</a> / <a href="findPass.php">비밀번호 찾기</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>



    <script>
    // window.onload = function() {
        
    //     if (getCookie("id")) { // getCookie함수로 id라는 이름의 쿠키를 불러와서 있을경우
    //         document.login.youEmail.value = getCookie("id"); //input 이름이 id인곳에 getCookie("id")값을 넣어줌
    //         document.login.agree.checked = true; // 체크는 체크됨으로
    //     }
    // }   

    // function setCookie(name, value, expiredays) //쿠키 저장함수
    // {
    //     var todayDate = new Date();
    //     todayDate.setDate(todayDate.getDate() + expiredays);
    //     document.cookie = name + "=" + escape(value) + "; path=/; expires="
    //             + todayDate.toGMTString() + ";"
    // }

    // function getCookie(Name) { // 쿠키 불러오는 함수
    //     var search = Name + "=";
    //     if (document.cookie.length > 0) { // if there are any cookies
    //         offset = document.cookie.indexOf(search);
    //         if (offset != -1) { // if cookie exists
    //             offset += search.length; // set index of beginning of value
    //             end = document.cookie.indexOf(";", offset); // set index of end of cookie value
    //             if (end == -1)
    //                 end = document.cookie.length;
    //             return unescape(document.cookie.substring(offset, end));
    //         }
    //     }
    // }

    // function sendit() {
    //     var frm = document.loginForm;
    //     if (!frm.userid.value) { //아이디를 입력하지 않으면.
    //         alert("아이디를 입력 해주세요!");
    //         frm.userid.focus();
    //         return;
    //     }
    //     if (!frm.pwd.value) { //패스워드를 입력하지 않으면.
    //         alert("패스워드를 입력 해주세요!");
    //         frm.pwd.focus();
    //         return;
    //     }
 
    //     if (document.login.agree.checked == true) { // 아이디 저장을 체크 하였을때
    //         setCookie("id", document.loginForm.userid.youEmail, 7); //쿠키이름을 id로 아이디입력필드값을 7일동안 저장
    //     } else { // 아이디 저장을 체크 하지 않았을때
    //         setCookie("id", document.loginForm.userid.youEmail, 0); //날짜를 0으로 저장하여 쿠키삭제
    //     }
 
    //     document.login.submit(); //유효성 검사가 통과되면 서버로 전송.
 
    // }
    </script>
</body>
</html>