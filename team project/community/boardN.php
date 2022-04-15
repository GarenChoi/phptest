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
    <title>놀이터</title>
    <link href="https://webfontworld.github.io/BMJua/BMJua.css" rel="stylesheet">
    <?php
        include "../include/style.php";
    ?>
    <style>
        .wrap {
            font-family: 'BMJua';
            max-width: 1200px;
            margin: 0 auto;
        }
        .header {
            display: flex;
            justify-content: end;
            align-items: end;
            height: 50px;
        }
        fieldset {
            display: flex;
        }
        fieldset > div{
           margin-left: 10px;
        }
        .search-form {
            height: 35px;
            padding: 0 10px;
            border-radius: 10px;
            font-size: 16px;
            border: 1px solid #000;
        }
        .search-option {
            height: 35px;
            border-radius: 10px;
            cursor: pointer;
        }
        .search-btn {
            width: 120px;
            height: 35px;
            border-radius: 10px;
            background-color: #605BFF;
            color: #fff;
            cursor: pointer;
        }
        /* 여기까지헤더 include 리셋포함*/
        #nav {
            margin-top: 100px;
        }
        #nav ul {
            display: flex;
        }
        #nav ul li {
            background: #fff;
            border-radius: 10px;
        }
        #nav li.active a {
            background: #605BFF;
            color: #fff;
            border-radius: 10px;
        }
        #nav a {
            display: inline-block;
            padding: 15px 20px;
            cursor: pointer;
        }
        #main {
            display: grid;
            margin-top: 50px;
            grid-template-columns: repeat(3, minmax(100px, 500px));
            grid-template-rows: repeat(1, 250px);
            grid-gap: 2em;
        }
        .room {
            background: #fff;
            padding: 20px;
            border-radius: 20px;
            border: 5px solid rgb(214, 201, 201);
        }
        .room h3 {
            margin-bottom: 20px;
            font-weight: 600;
        }
        .room > span {
            padding: 5px 15px;
            background-color: #FF6A77;
            border-radius: 22.5px;
            color: #fff;
        }
        .room form {
            display: inline-block;
        }
        .meet {
            font-size: 16px;
            padding: 5px 15px;
            border-radius: 22.5px;
            background-color: #FFD66B;
            font-family: 'BMJua';
        }
        .room p {
            margin-top: 20px;
            margin-bottom: 40px;
            font-weight: 600;
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .room .roomInfo {
            display: flex;
            align-items: center;
        }
        .room .roomInfo a {
            flex-basis: 60%;
        }
        .room .roomInfo > span {
            margin-left: 3px;
        }
        .room span span {
            margin-left: 5px;
            font-size: 14px;
            font-weight: 700;
        }
        .write {
            float: right;
            padding: 10px 20px;
            background: #000;
            color: #fff;
            margin-top: 5px;
            border-radius: 10px;
        }
        .btn-like .heart-shape {
            display: inline;
            color: red;
        }
        .btn-like {
            border: none;
            background-color: inherit;
        }
    </style>
</head>
<body>
    <?php
        include "../include/header.php";
    ?>
    <div class="wrap">
        <nav id="nav">
            <ul>
                <li><a href="boardQ.php">Q&A</a></li>
                <li class="active"><a href="boardN.php">놀이터</a></li>
                <li><a href="boardT.php">토론장</a></li>
            </ul>
        </nav>
        <div class="header">
            <form action="boardNSearch.php" name="boardSearch" method="get">
                <fieldset>
                    <legend class="ir_so">게시판 검색 영역</legend>
                    <div>
                        <input type="search" name="searchKeyword" class="search-form" placeholder="search" aria-label="search" requierd >
                    </div>
                    <div>
                        <select name="searchOption" class="search-option">
                            <option value="title">제목</option>
                            <option value="content">내용</option>
                            <option value="name">등록자</option>
                        </select>
                    </div>
                    <div>
                        <button type="sumbit" class="search-btn">검색</button>
                    </div>
                </fieldset>
            </form>
        </div>
<!-- //header include -->
    <main id="main">
    <?php
    $memberID = $_SESSION['memberID'];

    //b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page =1;
    }
    //게시판 불러올 갯수
    $pageView = 9;
    $pageLimit = ($pageView * $page) - $pageView;
    $sql = "SELECT b.boardID, b.boardTitle, b.boardMeet, b.boardContents, m.youNickName, b.regTime, b.boardLike FROM teamBoardN b JOIN myTeam m ON(m.memberID = b.memberID) ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);
    
    $SIBAL = "";

    if($result){
        $count = $result -> num_rows;
        if($count > 0){
            for($i=1; $i<=$count; $i++){
                $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);?>
        <article class="room">
            <h3><?=$boardInfo['boardTitle']?></h3>
            <span><?=$boardInfo['youNickName']?></span>
            <a class="meet" href="<?=$boardInfo['boardMeet']?>">입장</a>
            <p><?=$boardInfo['boardContents']?></p>
            <figure class="roomInfo">
                <a href="" class="people"><img src="../img/People.jpg" alt=""></a>
                <span><img src="../img/Chat.jpg" alt=""><span></span></span>
                <button type="button" class="btn-like" data-name="<?=$boardInfo['boardID']?>">

        <?php   if($memberID){

                    $sqlH = "SELECT * FROM heart WHERE memberID = $memberID";
                    $resultH = $connect -> query($sqlH);
                    foreach($resultH as $heartInfo){ 
                        if($heartInfo['boardID'] == $boardInfo['boardID']){
                            $SIBAL = 'true';
                            break;
                        } else {
                            $SIBAL = 'false';
                        } 
                    } ?>
            <?php   if($SIBAL == 'true'){?>
                        <span class="heart_shape">♥</span><span class="likeCount"><?=$boardInfo['boardLike']?></span></span>
            <?php   } else { ?>
                        <span class="heart_shape">♡</span><span class="likeCount"><?=$boardInfo['boardLike']?></span></span>
            <?php   } 
                } else {  ?>
                    <span class="heart_shape">♡</span><span class="likeCount"><?=$boardInfo['boardLike']?></span></span>
        <?php   } ?>
            
                </button>
            </figure>
        </article>
        <?php }
        }
    }
?>
</main>
        <div>
            <a href="boardWrite.php" class="write">글쓰기</a>
        </div>
        <div class="board__pages">
            <ul>
<?php
    $sql = "SELECT * FROM teamBoardN";
    $result = $connect -> query($sql);
    $count = $result -> num_rows;
    $GET1 = '';
    $GET2 = '';
    $searchOption = '';
    $address = 'boardN';
    $boardPage = 'boardNPage';
    require "boardPage.php";
?>
            </ul>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
var memberID = "<?=$_SESSION['memberID']?>"

if(!memberID){
    $(".btn-like").click(function(){
        alert("로그인 후 이용해주세요!");
    })
    
} else {

    $(".btn-like").on("click", function(e) {
        var button = $(e.currentTarget || e.target)
        var likeCount = button.find(".likeCount")
        var heartShape = button.find(".heart_shape")
        // console.log(heartShape);
        $.ajax({
            type : "POST",
            url : "likeCheck.php",
            data : {"articleId": button.data('name'), "memberID": memberID},
            dataType : "json",
            success : function(data){
                var addCount = (data.data == "like" ? 1 : data.data == "unlike" ? -1 : 0)
                likeCount.text(+likeCount.text() + addCount)
                heartShape.text(data.data == "like" ? "♥" : data.data == "unlike" ? "♡" : "♡")
            },
            error : function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
            }
        })
    })
    $(".btn-like").each(function(idx, el) {
        var button = $(el)
        var heartShape = button.find(".heart_shape")
        $.get("likeCheck.php", {
            getLikedByCode: button.data('name')
        }, function(res) {
            if (res == "unliked") {
                    heartShape.find("i").removeClass("fas").addClass("far")
                } else if (res == "liked") {
                    heartShape.find("i").removeClass("far").addClass("fas")
                }
        })
    })
}
</script>
</body>
</html>