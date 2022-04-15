<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>댓글</title>

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
        <section id="card-type" class="section center">
            <div class="container">
                <h3 class="section__title">스포츠 - 구기 종목</h3>
                <p class="section__desc">스포츠의 한 분야로 볼을 사용하는 종목의 총칭입니다.</p>
                <div class="card__inner">
                    <article class="card">
                        <figure class="card__header">
                            <img class="card__img" src="../assets/img/card_img01.jpg" alt="이미지1">
                        </figure>
                        <div class="card__body">
                            <h3 class="card__title">골프</h3>
                            <p class="card__desc">다수의 홀이 갖춰진 경기장에서 정지된 공을 골프채로 쳐서 홀에 넣는 경기로, 홀에 들어가기까지 걸린 타수가 적은 사람이 경기에 이긴다. 공을 친 횟수가 적은 사람이 승자가 되며, 18홀의 경기를 1회전 경기라고 한다.</p>
                            <a class="card__btn" href="#">
                                더 자세히 보기
                                <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                    <article class="card">
                        <figure class="card__header">
                            <img class="card__img" src="../assets/img/card_img02.jpg" alt="이미지2">
                        </figure>
                        <div class="card__body">
                            <h3 class="card__title">농구</h3>
                            <p class="card__desc">바스켓을 공중에 매달아 놓고 볼을 넣으며 득점을 경쟁하는 구기 종목으로 한 팀이 5명으로 구성된 두 팀이 벌이는 스포츠이다. 농구는 영어로 '바스켓볼(basketball)'이라고 하는데 이는 골대가 바스켓의 형태이기 때문에 나온 말이다.</p>
                            <a class="card__btn" href="#">
                                더 자세히 보기
                                <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                    <article class="card">
                        <figure class="card__header">
                            <img class="card__img" src="../assets/img/card_img03.jpg" alt="이미지3">
                        </figure>
                        <div class="card__body">
                            <h3 class="card__title">축구</h3>
                            <p class="card__desc">11명이 한 팀이 되어 발로 공을 차서 몰고들어가 상대편 골문에 넣음으로써 승패를 겨루는 경기로 발이 주로 사용되어 스피드가 있고, 순발력이 필요한 각종 기술의 순간적인 변화가 요구되는 남성적인 운동의 특성을 지니고 있다.</p>
                            <a class="card__btn" href="#">
                                더 자세히 보기
                                <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <!-- //card-type -->

        <section id="comment_type" class="section center purple">
            <h3 class="section__title">강의 신청하기</h3>
            <p class="section__desc">강의 신청하기는 누구나 댓글을 달 수 있습니다. 회원가입 하지 않아도 신청 가능합니다. 100글자 이내로 써주세요.</p>
            <div class="comment__inner">
                <div class="comment__form">
                    <form action="commentSave.php" method="post" name="comment">
                        <fieldset>
                            <legend class="ir_so">댓글쓰기</legend>
                            <div class="comment__wrap">
                                <div>
                                    <label for="youName" class="ir_so">이름</label>
                                    <input type="text" name="youName" id="youName" class="input__style" placeholder="이름" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="youText" class="ir_so">댓글 쓰기</label>
                                    <input type="text" name="youText" id="youText" class="input__style width" placeholder="신청 종목 적어주세요" autocomplete="off" required>
                                </div>
                                <button class="comment__btn" type="submit" value="댓글 작성하기">작성하기</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="comment__list">
                    <!-- <div class="list">
                        <p class="comment__desc">신청할게요! 축구 강의 신청합니다.</p>
                        <div class="comment__icon">
                            <span class="face"><img src="../assets/img/Group@2x.png" alt="얼굴"></span>
                            <span class="name">최근영</span>
                            <span class="date">2022-03-11</span>
                        </div>
                    </div> -->
<?php

    $sql = "SELECT * FROM myComment";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;

        if($count > 0){
            for($i=1; $i<=$count; $i++){
                $commentInfo = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<div class='list'>";
                echo "<p class='comment__desc'>".$commentInfo['youText']."</p>";
                echo "<div class='comment__icon'>";
                echo "<span class='face'><img src='../assets/img/Group@2x.png' alt='얼굴'></span>";
                echo "<span class='name'>".$commentInfo['youName']."</span>";
                echo "<span class='date'>".date('Y-m-d', $commentInfo['regTime'])."</span>";
                echo "</div>";
                echo "</div>";
            }
        }
    }
?>
                </div>
            </div>
        </section>
        
    </main>

    <!-- footer -->
    <?php
        include "../include/footer.php";
    ?>

</body>
</html>