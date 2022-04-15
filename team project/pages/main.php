<?php
    include "../../connect/connect.php";
    include "../../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team 사이트</title>
    <!-- style -->
    <link rel="stylesheet" href="../css/reset.css">
    <link href="https://webfontworld.github.io/BMJua/BMJua.css" rel="stylesheet">
    <style>
       body {
            background: #F8F8FF;
            padding-bottom: 50px;
        }
        /* 헤더 */
        #header {
            font-family: 'BMJua';
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            height: 60px;
            margin-top: 50px;
        }
        .hTitle {
            font-size: 50px;
        }
        .hSide {
            display: flex;
        }
        .hBtn {
            width: 80px;
            height: 20px;
            background: #CACACA;
            margin-right: 1vw;
            border-radius: 10px;
        }
        .hMenu {
            display: flex;
        }
        .hMenu li {
            margin-left: 30px;
        }
        .hMenu li a {
            font-size: 20px;
        }
        /* 메인 */
        #contents {
            max-width: 1200px;
            margin: 0 auto;
            margin-top: 1vw;
            display: grid;
            grid-template-areas:
            "rule1 rule1 rule2 rule2 rule3 rule3"
            "graph graph graph graph graph graph"
            "news news news support support support";
            grid-template-columns: repeat(6, 1fr);
            grid-template-rows: 120px 500px 300px;
            justify-content: space-between;
        }
        .rule1 {
            grid-area: rule1;
            margin-right: 1vw;
        }
        .rule2 {
            grid-area: rule2;
            margin: 0 0.5vw;
        }
        .rule3 {
            grid-area: rule3;
            margin-left: 1vw;
        }
        .rule {
            background: #fff;
            margin-bottom: 25px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            width: 80%;
            margin-left: 10%;
        }
        .rule > div.rImg {
            flex-basis: 30%;
            margin-left: 1.5vw;
        }
        .rule > div.rImg img {
            width: 75%;
            margin-top: 0.5vw;
        }
        .rule > div.desc {
        }
        .rule > div.desc h3 {
            font-size: 1rem;
        }
        .rule > div.desc p {
            font-size: 0.8rem;
        }
        .graph {
            grid-area: graph;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .graph img {
            width: 100%;
            border-radius: 10px;
            height: 100%;
        }
        .news {
            background: #fff;
            grid-area: news;
            margin-right: 1vw;
            border-radius: 10px;
            padding: 20px 24px 28px 24px;
        }
        .news > h4 {
            font-size: 1.1rem;
        }
        .newsBox1 {
            border-bottom: 1px solid #0302291c;
            padding-bottom: 10px;
        }
        .newsBox {
            display: flex;
            margin-top: 15px;
            height: 100px;
        }
        .newsBox > img {
            width: 28%;
        }
        .newsBox .nDesc {
            display: flex;
        }
        .newsBox .nDesc > p {
            flex-basis: 60%;
            font-size: 0.9rem;
            font-weight: bold;
            margin-left: 0.8vw;
        }
        .newsBox .nDesc > span {
            flex-basis: 40%;
            font-size: 0.6vw;
            align-self: end;
            text-align: right;
        }
        .support {
            background: #fff;
            grid-area: support;
            margin-left: 1vw;
            border-radius: 10px;
            padding: 20px 24px 28px 24px;
        }
        .support > h4 {
            font-size: 1.1rem;
        }
        .supBox1 {
            border-bottom: 1px solid #0302291c;
        }
        .supBox {
            display: flex;
            margin-top: 15px;
            position: relative;
            padding-bottom: 10px;
            height: 100px;
        }
        .supBox img {
            width: 28%;
        }
        .supBox .sDesc {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-left: 0.8vw;
        }
        .supBox .sDesc > p {
            width: 100%;
            font-size: 0.8rem;
            font-weight: bold;
        }
        .supBox .sDesc em {
            font-size: 1rem;
            font-weight: bold;
            font-family: 'BMJua';
            align-self: end;
        }
        .supBox .sDesc > a {
            font-size: 0.5rem;
            font-weight: bold;
            align-self: end;
            color: #CE6868;
            background: #FBE0E0;
            text-align: right;
            padding: 5px;
            position: absolute;
            right: 0;
            bottom: 8px;
        }
    #sidebar {
    width: 4%;
    border-radius: 10px;
    text-align: center;
    display: flex;
    flex-direction: column;
    position: fixed;
    top: 0;
    /* transform: translateY(-50%); */
    height: 100%;
    background: #fff;
    }
    .logo {
        margin-top: 20px;
        flex-basis: 20%;
    }
    .logo img:nth-child(1) {
        width: 3vw;
    }
    .menu {
        flex-basis: 55%;
    }
    .menu li {
        padding: 10px;
        transition: all 0.3s;
    }
    .menu li:hover {
        background: linear-gradient(to right, #ACA9FF 0%, rgba(172, 169, 255, 0) 91%);
    }
    .etc {
        flex-basis: 10%;
    }
    .etc .darkmode {
        display: flex;
        justify-content: center;
    }
    .etc .darkmode div {
        padding: 5px;
    }
    .etc div {
        margin-top: 15px;
    }
    .sidemypage img {
        width: 3vw;
    }
    #sidebar2 {
        position: fixed;
        width: 200px;
        height: 100vh;
        border-radius: 10px;
        text-align: center;
        display: flex;
        flex-direction: column;
        background: #fff;
    }
    .logo2 {
        margin-top: 20px;
        flex-basis: 15%;
    }
    .logo2 a {
        display: block;
        font-size: 24px;
        font-weight: 800;
        color: #000;
    }
    .logo2 img {
        width: 45px;
    }
    .menu2 {
        flex-basis: 55%;
        color: #030229;
    }
    .menu2 ul {
        display: flex;
        flex-direction: column;
       align-items: center;
    }
    .menu2 li {
        padding: 10px;
        transition: all 0.3s;
        min-width: 140px;
        display: flex;
        justify-content: space-between;
    }
    .menu2 li:hover {
        background: linear-gradient(to right, #ACA9FF 0%, rgba(172, 169, 255, 0) 91%);
    }
    .side__search {
        margin: 0 10px;
        padding: 10px;
        background: #F7F7F8;
        border-radius: 10px;
        border-color: #fff;
        margin-bottom: 7vh;
    }
    .etc2 {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .etc2 .sidemypage2 img {
        width: 45px;
    }
    .sidemypage2 {
    }
    .collection {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .collection div,a {
        padding: 3px 5px;
    }
    .collection .name {
        flex-basis: 100%;
    }
    .mainbox {
        flex-basis: 100%;
    }
    .wrapbox {
        display: flex;
    }
    .fakebox{
        /* display: none; */
        flex-basis: 0;
    }
    .fakebox.sideBarOpen{
        /* display: none; */
        flex-basis: 15%;
    }
    </style>
</head>
<body>
<?php
    $sideBar = 1;
    include "../include/sideBar$sideBar.php";
?>
<div class="wrapbox">
    <div class="fakebox"></div>
    <div class="mainbox">
        <!-- header -->
        <?php
            include "../include/header.php";
        ?>
        <!-- //header -->
        <main id="contents">
            <div class="rule1 rule">
                <div class="rImg"><img src="../img/ruleImg01.png" alt="수칙 아이콘"></div>
                <div class="desc">
                    <h3>6인 이상 금지</h3>
                    <p>인원 제한</p>
                </div>
            </div>
            <div class="rule2 rule">
                <div class="rImg"><img src="../img/ruleImg02.png" alt="수칙 아이콘"></div>
                <div class="desc">
                    <h3>22까지 운영</h3>
                    <p>시설 운영시간</p>
                </div>
            </div>
            <div class="rule3 rule">
                <div class="rImg"><img src="../img/ruleImg03.png" alt="수칙 아이콘"></div>
                <div class="desc">
                    <h3>방역패스 일시중단</h3>
                    <p>방역패스</p>
                </div>
            </div>
            <div class="graph">
                <img src="../img/graphImg01.jpg" alt="그래프">
            </div>
            <div class="news">
                <h4>코로나 관련 뉴스</h4>
                <div class="newsBox1 newsBox">
                    <img src="../img/newsImg01.jpg" alt="뉴스 이미지">
                    <div class="nDesc">
                        <p>코로나 확진자 5일·9일 투표 가능…"오후 5시부터 외출"</p>
                        <span>2022-03-02 13:02</span>
                    </div>
                </div>
                <div class="newsBox2 newsBox">
                    <img src="../img/newsImg02.jpg" alt="뉴스 이미지">
                    <div class="nDesc">
                        <p>2일 코로나19 신규확진 21만9241명, 사상최다…사망 96명</p>
                        <span>2022-03-02 09:14</span>
                    </div>
                </div>
            </div>
            <div class="support">
                <h4>재난지원금 정보</h4>
                <div class="supBox1 supBox">
                    <img src="../img/supImg01.jpg" alt="지원금 이미지">
                    <div class="sDesc">
                        <p>소상공인 4분기 손실보상</p>
                        <em>3월3일부터 5부제</em>
                        <a href="#">신청사이트 바로가기</a>
                    </div>
                </div>
                <div class="supBox2 supBox">
                    <img src="../img/supImg02.jpg" alt="지원금 이미지">
                    <div class="sDesc">
                        <p>전국민 긴급재난지원금</p>
                        <em>3월 16일부터</em>
                        <a href="#">신청사이트 바로가기</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(".sideOpen").click(function(){
       
        
        $(".fakebox").addClass("sideBarOpen");
    })
</script>

</body>
</html>