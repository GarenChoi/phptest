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
    <title>PHP 사이트</title>

    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <style>
        #footer{
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    
    <!-- header -->
    <?php
        include "../include/header.php";
    ?>
    
    <section id="banner">
        <h3 class="ir_so">배너 영역</h3>
            <div class="slider__wrap">
                <div class="slider__img">
                    <div class="slider__inner">
                        <div class="slider s1">
                            <div class="desc">
                                <span>DEVELOPER01</span>
                                <h4>NEW PROJECT</h4>
                                <p>너무 무리하지 말아요!
                                    <br>이미 당신은 해내고 있고!
                                    <br>앞으로도 잘 할 수 있어요! 
                                </p>
                                <div class="btn">
                                    <a href="#" class="white">자세히 보기</a>
                                    <a href="#" class="black">사이트 보기</a>
                                </div>
                            </div>
                        </div>
                        <div class="slider s2">
                            <div class="desc">
                                <span>DEVELOPER02</span>
                                <h4>NEW PROJECT</h4>
                                <p>너무 무리하지 말아요!
                                    <br>이미 당신은 해내고 있고!
                                    <br>앞으로도 잘 할 수 있어요! 
                                </p>
                                <div class="btn">
                                    <a href="#" class="white">자세히 보기</a>
                                    <a href="#" class="black">사이트 보기</a>
                                </div>
                            </div>
                        </div>
                        <div class="slider s3">
                            <div class="desc">
                                <span>DEVELOPER03</span>
                                <h4>NEW PROJECT</h4>
                                <p>너무 무리하지 말아요!
                                    <br>이미 당신은 해내고 있고!
                                    <br>앞으로도 잘 할 수 있어요! 
                                </p>
                                <div class="btn">
                                    <a href="#" class="white">자세히 보기</a>
                                    <a href="#" class="black">사이트 보기</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider__btn">
                    <a href="#" class="prev"></a>
                    <a href="#" class="next"></a>
                </div>
                <div class="slider__dot"></div>
            </div>
                
        
        
                
                
        
    </section>
    
    <!-- //banner -->

    <main id="contents">
        <h2 class="ir_so">게시판 영역</h2>
        <section id="board-type" class="section center type">
            <div class="container">
                <h3 class="section__title">구기종목 블로그</h3>
                <p class="section__desc">구기종목과 관련된 블로그입니다. 다양한 정보를 확인하세요!</p>
                <div class="blog__inner">
                    <div class="blog__cont">


<?php $sql = "SELECT * FROM myBlog ORDER BY blogID DESC LIMIT 3";
    $result = $connect -> query($sql);?>
<?php
    
?>
<?php foreach($result as $blog){ ?> 
        <article class='blog'>
            <figure class='blog__header' aria-hidden="true">
                <a href="../blog/blogView.php?blogID=<?=$blog['blogID']?>" style="background-image:url(../assets/img/blog/<?=$blog['blogImgFile']?>);"></a>
            </figure>
            <div class='blog__body'>
                <span class='blog__cate'><?=$blog['blogCategory']?></span>
                <div class='blog__title'><?=$blog['blogTitle']?></div>
                <div class='blog__desc'><?=$blog['blogContents']?></div>
                <div class='blog__info'>
                    <span class='author'><a href='#'><?=$blog['blogAuthor']?></a></span>
                    <span class='date'><?=date('Y-m-d', $blog['blogRegTime'])?></span>
                </div>
            </div>
        </article>
<?php    } ?>

                    </div>
                    <div class="blog__btn">
                        <a href="../blog/blog.php">더 보기</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- //blog-type -->

        <section id="quiz-type" class="section center gray">
            <div class="container">
                <h3 class="section__title">코딩언어 퀴즈</h3>
                <p class="section__desc">코딩언어에 관련된 퀴즈입니다.</p>
                <div class="quiz__inner">
                    <div class="quiz__header">
                        <div class="quiz__subject">
                            <label for="quiz__subject">과목 선택</label>
                            <select name="quiz__subject" id="quiz__subject">
                                <option value="javascript">javascript</option>
                                <option value="jquery">jquery</option>
                                <option value="html">HTML</option>
                                <option value="css">CSS</option>
                            </select>
                        </div>
                    </div>
                    <div class="quiz__body">
                        <div class="title">
                            <span class="quiz__num"></span>. <span class="quiz__ask"></span>
                            <div class="quiz__desc">
                              
                            </div>
                        </div>
                        <div class="contents">
                            <div class="quiz__selects">
                                <label for="select1">
                                    <input class="select" type="radio" id="select1" name="select" value="1">
                                    <span class="choice"></span>
                                </label>
                                <label for="select2">
                                    <input class="select" type="radio" id="select2" name="select" value="2">
                                    <span class="choice"></span>
                                </label>
                                <label for="select3">
                                    <input class="select" type="radio" id="select3" name="select" value="3">
                                    <span class="choice"></span>
                                </label>
                                <label for="select4">
                                    <input class="select" type="radio" id="select4" name="select" value="4">
                                    <span class="choice"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="quiz__footer">
                        <div class="quiz__btn">
                            <button class="comment green none">해설보기</button>
                            <button class="next orange right ml10 none">다음 문제</button>
                            <button class="confirm green right">정답 확인</button>
                        </div>
                        <div class="quiz__comment">
                        </div>
                        <div class="quiz__commentBox">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //quiz-type -->

        <section id="notice-type" class="section center">
            <div class="container">
                <h3 class="section__title">새로운 소식</h3>
                <p class="section__desc">종목별로 새로운 소식을 알려드립니다.</p>
                <div class="notice__inner">
                    <article class="notice">
                        <h4>게시판</h4>
                        <ul>

<?php
    $sql = "SELECT * FROM myBoard ORDER BY boardID DESC LIMIT 4";
    $result = $connect -> query($sql);
    foreach($result as $boardInfo){ ?>
        <li><a href="../board/boardView.php?boardID=<?=$boardInfo['boardID']?>"><?=$boardInfo['boardTitle']?></a><span class="time"><?=date('Y-m-d',$boardInfo['regTime'])?></span></li>

<?php } ?>

                        </ul>
                        <a href="../board/board.php" class="more">더 보기</a>
                    </article>
                    <article class="notice">
                        <h4>댓글</h4>
                        <ul>
<?php
    $sql = "SELECT * FROM myComment ORDER BY commentID DESC LIMIT 4";
    $result = $connect -> query($sql);
    foreach($result as $commentInfo){ ?>
        <li><a href="../comment/comment.php#comment_type"><?=$commentInfo['youText']?></a><span class="time"><?=date('Y-m-d',$commentInfo['regTime'])?></span></li>

<?php } ?>
                        </ul>
                        <a href="../comment/comment.php" class="more">더 보기</a>
                    </article>
                </div>
            </div>
        </section>
        <!-- //notice-type -->

    </main>

    <!-- footer -->
    <?php
        include "../include/footer.php";
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        window.addEventListener("beforeunload",e => {
            e.preventDefault();
        })
        //배너
        const sliderWrap = document.querySelector(".slider__wrap");
        const sliderImg = document.querySelector(".slider__img");       //이미지 보이는 영역
        const sliderInner = document.querySelector(".slider__inner");   //이미지 움직이는 영역
        const slider = document.querySelectorAll(".slider");            //5개의 이미지 저장
        const sliderBtn = document.querySelector(".slider__btn");
        const sliderBtnPrev = sliderBtn.querySelector(".prev");
        const sliderBtnNext = sliderBtn.querySelector(".next");
        const sliderDot = document.querySelector(".slider__dot");

        let currentIndex = 0;
        let sliderWidth = sliderImg.offsetWidth;    //이미지 가로 값
        let sliderLength = slider.length;   //이미지 갯수
        let sliderFirst = slider[0];    //첫 번째 이미지
        let sliderLast = slider[sliderLength - 1];    //마지막 이미지
        let cloneFirst = sliderFirst.cloneNode(true);   //첫 번째 이미지 복사
        let cloneLast = sliderLast.cloneNode(true);   //첫 번째 이미지 복사
        let posInitial = "";
        let dotIndex = "";
        let sliderTimer = "";
        let interval = 3000;

        //이미지 복사 appendTo/prependTo : append/prepend
        sliderInner.appendChild(cloneFirst);
        sliderInner.insertBefore(cloneLast, sliderFirst);

        //닷 버튼 만들기
        function dotInit(){
            for(let i=0; i<sliderLength; i++){
                dotIndex += "<a href='#' class='dot'></a>";
            }
            dotIndex += "<a href='#' class='play'>play</a>";
            dotIndex += "<a href='#' class='stop show'>stop</a>";
            sliderDot.innerHTML = dotIndex;
            sliderDot.firstElementChild.classList.add("active");
        }
        dotInit();

        //닷 버튼 활성화
        const sliderDotA = document.querySelectorAll(".slider__dot .dot");
        console.log(sliderDotA);


        let sliderCheck = "";

        function gotoSlider(index){
            if(!sliderCheck){
                sliderInner.classList.add("transition");
                sliderInner.style.left = -100 * (index+1)+"vw";
                sliderDotA.forEach((el,i) => {
                    el.classList.remove("active");
                })
    
                DActiveIndex = index;
                if(DActiveIndex == 3) DActiveIndex -= 3;
                if(DActiveIndex == -1) DActiveIndex += 3;
                console.log(DActiveIndex);
                sliderDotA[DActiveIndex].classList.add("active");
                
                currentIndex = index;
                sliderCheck = true;
                checkS();
                
            }
        };

        function checkS(){
            setTimeout(() => {
                sliderCheck = "";
            }, 650);
        }

        sliderDotA.forEach((el,i) => {
            el.addEventListener("click", ()=>{
                gotoSlider(i);
            })
        })

        //이전 다음 버튼 활성화
        sliderBtnPrev.addEventListener("click", () => {
            let prevIndex = currentIndex - 1;
            gotoSlider(prevIndex);
        });
        
        sliderBtnNext.addEventListener("click", () => {
            let nextIndex = currentIndex + 1;
            gotoSlider(nextIndex);
        });

        //자동 플레이
        function autoPlay(){
            sliderTimer = 
                setInterval(() => { 
                gotoSlider(currentIndex + 1);
                console.log("오토");
            }, interval)
        }   
        autoPlay();

        function stopPlay(){
            clearInterval(sliderTimer);
        }

        sliderInner.addEventListener("transitionend", () => {
            sliderInner.classList.remove("transition");
            console.log(currentIndex);
            if(currentIndex <= -1){
                sliderInner.style.left = -(sliderLength * 100) + "vw";
                currentIndex = sliderLength -1;
            }
            if(currentIndex >= sliderLength){
                sliderInner.style.left = -(1 * 100) + "vw";
                currentIndex = 0;
            }
        });

        //오버 시 효과
        sliderInner.addEventListener("mouseenter", () => {
            stopPlay();
        })
        sliderInner.addEventListener("mouseleave", () => {
            let stopClass = document.querySelector(".stop").classList.contains("show");
            if(stopClass){
                autoPlay();
            }
        })

        document.querySelector(".play").addEventListener("click", () => {
            document.querySelector(".play").classList.remove("show");
            document.querySelector(".stop").classList.add("show");
            autoPlay()
        })

        document.querySelector(".stop").addEventListener("click", () => {
            document.querySelector(".stop").classList.remove("show");
            document.querySelector(".play").classList.add("show");
            stopPlay();
        })

        //퀴즈
        let quizAnswer = "";

        function quizView(view){
            $(".quiz__num").text(view.quizID);
            $(".quiz__ask").text(view.quizAsk);
            $("#select1 + span").text(view.quizChoice1);
            $("#select2 + span").text(view.quizChoice2);
            $("#select3 + span").text(view.quizChoice3);
            $("#select4 + span").text(view.quizChoice4);
            $(".quiz__commentBox p").text(view.quizComment);
            quizAnswer = view.quizAnswer;
        }

        //정답 체크
        function quizCheck(){
            let selectCheck = $(".quiz__selects input:checked").val();


            //정답을 체크 안했으면
            if(selectCheck == null || selectCheck == ''){
                alert("정답을 체크해주세요!");
            } else {
                $(".quiz__btn .next").fadeIn();
                $(".quiz__btn .comment").fadeIn(); //fadeOut //fadeToggle
                // $(".quiz__btn .comment").fadeIn(); 
                // $(".quiz__btn .next").slideDown(); //slideUp //slideToggle
                //$(".quiz__btn .next").show();   //hide //toggle
                $(".quiz__selects input").attr("disabled", true);
                if(selectCheck == quizAnswer){
                    //정답
                    $(".quiz__selects #select"+quizAnswer).addClass("correct");
                } else {
                    $(".quiz__selects #select"+selectCheck).addClass("incorrect");
                    $(".quiz__selects #select"+quizAnswer).addClass("correct");
                }
            }
        }

        //문제 데이터 가져오기
        function quizData(){
            let quizSubject = $("#quiz__subject").val();
            $.ajax({
                url: "../quiz/quizInfo.php",
                method: "POST",
                data: {"quizSubject": quizSubject},
                dataType: "json",
                success: function(data){
                    console.log(data.quiz);
                    quizView(data.quiz);
                },
                error: function(request, status, error){
                    console.log('request' + request);
                    console.log('status' + status);
                    console.log('error' + error);
                }
            })
            // $(".section__title").text(quizSubject+"퀴즈");
            // $(".section__desc").text(quizSubject+"퀴즈입니다.");
        }
        quizData();

        //과목 선택
        $("#quiz__subject").change(function(){
            quizData();
            $(".quiz__selects input").removeClass("incorrect");
            $(".quiz__selects input").removeClass("correct");
            $(".quiz__btn .next").fadeOut();
            $(".quiz__btn .comment").fadeOut();
            $(".quiz__selects input").prop("checked", false);
            $(".quiz__selects input").attr("disabled", false);
        });

        //정답 확인
        $(".quiz__btn .confirm").click(function(){
            //정답을 클릭했는지 안했는지 판단
            quizCheck();
        });

        //다음 문제
        $(".quiz__btn .next").click(function(){
            quizData();
            $(".quiz__selects input").removeClass("incorrect");
            $(".quiz__selects input").removeClass("correct");
            $(".quiz__selects input").prop("checked", false);
            $(".quiz__btn .next").fadeOut();
            $(".quiz__btn .comment").fadeOut();
            $(".quiz__selects input").attr("disabled", false);
        })

        //해설 보기 
        $(".comment").click(function(){
            $(".quiz__comment").fadeIn();
            $(".quiz__commentBox").fadeIn();
        })
        $(".quiz__comment").click(function(){
            $(".quiz__comment").fadeOut();
            $(".quiz__commentBox").fadeOut();
        })
    </script>
</body>
</html>