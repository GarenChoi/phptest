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
    <title>퀴즈</title>

    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <style>

    </style>
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

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
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
<?php

?>
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
                    </div>
                </div>
            </div>
        </section>
    </main>
        
    <!-- footer -->
    <?php
        include "../include/footer.php";
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let quizAnswer = "";

        function quizView(view){
            $(".quiz__num").text(view.quizID);
            $(".quiz__ask").text(view.quizAsk);
            $("#select1 + span").text(view.quizChoice1);
            $("#select2 + span").text(view.quizChoice2);
            $("#select3 + span").text(view.quizChoice3);
            $("#select4 + span").text(view.quizChoice4);
            quizAnswer = view.quizAnswer;
        }

        //정답 체크
        function quizCheck(){
            let selectCheck = $(".quiz__selects input:checked").val();


            //정답을 체크 안했으면
            if(selectCheck == null || selectCheck == ''){
                alert("정답을 체크해주세요!");
            } else {
                $(".quiz__btn .next").fadeIn(); //fadeOut //fadeToggle
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
                url: "quizInfo.php",
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
            $(".quiz__selects input").attr("disabled", false);
        })
    </script>
</body>
</html>