<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이 페이지</title>

    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
</head>
<body>
    <!-- skip -->
    <?php
        include "../include/skip.php";
    ?>
    
    <!-- header -->
    <?php
        include "../include/header.php";
    ?>

    <!-- contents -->
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="join-type gray">
            <div class="member-form">
                <form action="mypageModify.php" id="imgForm" method="post" enctype="multipart/form-data">
<?php
    $memberID = $_SESSION['memberID'];
    $sql = "SELECT * FROM myMember WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);
    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
?>    
                    <h3 class="mb30">회원 정보</h3>
                    <div class="join-intro">
                        <div class="face">
                            <figure>
                                <img src="../assets/img/mypage/<?=$memberInfo['youPhoto']?>" alt="프로필이미지" class="mypage__img" id="View">
                            </figure>
                            <input type="file" name="imgView" id="imgView" accept="image/*">
                            <label for="imgView" class="mypage__changeImg">이미지 변경</label>
                        </div>
                        <div class='intro'><?=$memberInfo['youIntro']?></div>
                    </div>
                    <div class="join-info">
                        <ul>
                            <li><strong>소개하는 글</strong><input type="text" name="youIntro" id="youIntro" value="<?=$memberInfo['youIntro']?>"></li>
                            <li><strong>이메일</strong><input type="text" name="youEmail" id="youEmail" value="<?=$memberInfo['youEmail']?>"></li>
                            <li><strong>닉네임</strong><input type="text" name="youNickName" id="youNickName" value="<?=$memberInfo['youNickName']?>"></li>
                            <li><strong>이름</strong><input type="text" name="youName" id="youName" value="<?=$memberInfo['youName']?>"></li>
                            <li><strong>생일</strong><input type="text" name="youBirth" id="youBirth" value="<?=$memberInfo['youBirth']?>"></li>
                            <li><strong>번호</strong><input type="text" name="youPhone" id="youPhone" value="<?=$memberInfo['youPhone']?>"></li>
                            <li><strong>성별</strong><input type="text" name="youGender" id="youGender" value="<?=$memberInfo['youGender']?>"></li>
                            <li><strong>사이트</strong><input type="text" name="youSite" id="youSite" value="<?=$memberInfo['youSite']?>"></li>
                        </ul>
                    </div>
                    <div class="join-btn">
                        <button type="submit">수정하기</button>
                        <a href="mypageRemove.php">탈퇴하기</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
    

    <!-- footer -->
    <?php
        include "../include/footer.php";
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function() {
        $("#imgView").on('change', function(){
            readURL(this);
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
                $('.mypage__img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
   var password = '<?=$memberInfo['youPass']?>';
   function passCheck(){
        if($("#info__password").val() !== password){
            $("#youPassComment").text("비밀번호가 동일하지 않습니다!");
            return false;
        }
    }
</script>
</body>
</html>