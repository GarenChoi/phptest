<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>사용약관</title>
    <!-- META -->
    <meta name="acthor" content="최근영">
    <meta name="description" content="웹 표준을 준수한 사이트입니다.">
    <meta name="keywords" content="웹 표준, 웹 접근성, 웹 호환성, 사이트 제작, 사이트 만들기">
    <meta name="rebots" content="all">

    <!-- 아이콘&파비콘 -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="apple-touch-icon" href="img/icon114.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/icon114.png">
    <link rel="apple-touch-icon-precomposed" href="img/icon.png">
    <link rel="apple-touch-icon-precomposed" sizes="167x167" href="img/icon167.png">

    <!-- CSS style -->
    <link href="https://webfontworld.github.io/BMJua/BMJua.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <style>
        * {
            background: #FAFAFB;
            font-family: 'BMJua';
        }
        #agreePage .container {
            width: 70%;
            background: #fff;
            margin: 0 auto;
            margin-top: 15vh;
            padding: 5vw 10vw;
            border-radius: 30px;
        }
        #agreePage .container:nth-child(2) {
            margin-top: 5vh;
            margin-bottom: 15vh;
            padding: 5vw 10vw;
        }
        #agreePage h2 {
            text-align: center;
            font-size: 50px;
            background: #fff;
        }
        #agreePage p {
            background: #fff;
            margin-top: 5vh;
            margin-bottom: 3vh;
        }
        #agreePage fieldset div {
            background: #fff;
            text-align: right;
        }
        #agreePage label {
            background: #fff;
        }
        #agreePage span {
            display: inline-block;
            background: #fff;
            font-size: 24px;
            margin-bottom: 10vh;
        }
        #agreePage .btn {
            background: #fff;
            font-size: 24px;
            text-align: center;
        }
        #agreePage .btn a {
            background: #f5f5f5;
            padding: 1vw 2vw;
            border-radius: 2vw;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <main id="agreePage">
        <div class="container">
            <h2>사용약관</h2>
            <p>약관1.......<br>약관2.......<br>약관3.......</p>
            <form action="agreeSave.php" name="agreeSave1" method="post">
                <fieldset>
                    <legend class="ir_so">사용약관</legend>
                    <div>
                        <label for="agree1">
                            <input class="select1" type="checkbox" id="agree1" name="agree1">
                            <span class="agree1">사용약관에 동의합니다.</span>
                        </label>                
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="container">
            <h2>개인정보 이용동의</h2>
            <p>동의1.......<br>동의2.......<br>동의3.......</p>
            <form action="agreeSave.php" name="agreeSave2" method="post">
                <fieldset>
                    <legend class="ir_so">개인정보 이용동의</legend>
                    <div>
                        <label for="agree2">
                            <input class="select2" type="checkbox" id="agree2" name="agree2">
                            <span class="agree2">개인정보 이용에 동의합니다.</span>
                        </label>                
                    </div>
                    <div class='btn'>
                        <a class='return' href="join.php">돌아가기</a>
                        <a class='complete' href="agreeSave.php">동의 완료</a>
                    </div>
                </fieldset>
            </form>
        </div>
    </main>


</body>
</html>