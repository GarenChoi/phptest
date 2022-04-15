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
    <title>블로그</title>

    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <style>
        .footer {
            background-color: #f5f5f5;
        }
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
        <h2 class="ir_so">블로그 영역</h2>
        <section id="board-type" class="center mb100">
<?php
    $memberID = $_SESSION['memberID'];
    $blogID = $_GET['blogID'];
    $sql = "SELECT * FROM myBlog WHERE blogID = $blogID";
    $result = $connect -> query($sql);
    $blogInfo = $result -> fetch_array(MYSQLI_ASSOC); ?>

            <div class="blog__label" style="background-image: url(../assets/img/blog/<?=$blogInfo['blogImgFile']?>);">
                <h3 class="section__title"><?=$blogInfo['blogTitle']?></h3>
                <span class='author'><a href='#'><?=$blogInfo['blogAuthor']?></a></span>
                <span class='date'><?=date('Y-m-d', $blogInfo['blogRegTime'])?></span><br>
<?php if($memberID == $blogInfo['memberID']){ ?>
    <span class='modify'><a href='blogModify.php?blogID=<?=$blogID?>'>수정</a></span>
    <span class='delete'><a href='blogRemove.php?blogID=<?=$blogID?>' onclick="return noticeRemove();">삭제</a></span>
<?php } ?>
            </div>
            <div class="container">
                <div class="blog__layout">
                    <div class="blog__left">
                        <h4><?=$blogInfo['blogTitle']?></h4>
                        <div>
                            <?=$blogInfo['blogContents']?>
                        </div>
                    </div>
                    <div class="blog__right">
                        <div class="ad">
                            <iframe src="https://ads-partners.coupang.com/widgets.html?id=572086&template=carousel&trackingCode=AF7618501&subId=&width=300&height=300" width="300" height="300" frameborder="0" scrolling="no" referrerpolicy="unsafe-url"></iframe>
                        </div>
                        <a href="blog.php">목록으로</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
        
    <!-- footer -->
    <?php
        include "../include/footer.php";
    ?>
    <script>
        function noticeRemove(){
            let notice = confirm("정말 삭제하시겠습니까?","");
            return notice;
        }
    </script>
</body>
</html>