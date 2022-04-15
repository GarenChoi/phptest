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
    $blogID = $_GET['blogID'];
    $sql = "SELECT * FROM myBlog WHERE blogID = $blogID";
    $result = $connect -> query($sql);
    $blogInfo = $result -> fetch_array(MYSQLI_ASSOC); 
?>
    <form action="blogModifySave.php?blogID=<?=$blogID?>" name="blogModify" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class="blog__label" style="background-image: url(../assets/img/blog/<?=$blogInfo['blogImgFile']?>);">
                <legend class="ir_so">블로그 수정 입력</legend>
                <div>
                    <label for="blogTitle" hidden="hidden">블로그 제목</label>
                    <input type="text" name='blogTitle' id='blogTitle' class="section__title" value='<?=$blogInfo['blogTitle']?>'>
                </div>
                <div class="modify">
                    <button type="submit">수정완료</button>
                </div>
            </div>
            <div class="container">
                <div class="blog__layout">
                    <div class="blog__left">
                        <h4><?=$blogInfo['blogTitle']?></h4>
                        <div>
                            <label for="blogContents" hidden="hidden">블로그 내용</label>
                            <textarea name="blogContents" id="blogContents"><?=$blogInfo['blogContents']?></textarea>
                        </div>
                        <div>
                            <label for="blogFile">이미지 교체</label>
                            <input type="file" name="blogFile" accept=".jpg, .jpeg, png, git" placeholder="사진을 넣어주세요! 사진은 jpg png만 지원됩니다.">
                        </div>
                        <div>
                            <label for='youPass'>비밀번호</label>
                            <input type='password' name='youPass' id='youPass' placeholder='로그인 비밀번호를 입력해주세요!' required>
                        </div>
                    </div>
                    <div class="blog__right">
                        ㄱㅗㅏㅇㄱㅗ
                    </div>
                </div>
            </div>


        </fieldset>
    </form>






<!-- 

            <div class="blog__label" style="background-image: url(../assets/img/blog/<=$blogInfo['blogImgFile']?>);">
                <h3 class="section__title"><=$blogInfo['blogTitle']></h3>
                <span class='author'><a href='#'><=$blogInfo['blogAuthor']></a></span>
                <span class='date'><=date('Y-m-d', $blogInfo['blogRegTime'])></span><br>
                    <span class='modify'><a href='blogModify.phpblogID=<=$blogID>'>수정</a></span>
                    <span class='delete'><a href='#'>삭제</a></span>
            </div>
            <div class="container">
            <div class="blog__layout">
                <div class="blog__left">
                    <=$blogInfo['blogContents']>
                </div>
                <div class="blog__right">
                    ㄱㅗㅏㅇㄱㅗ
                </div>
            </div>
            </div> -->
        </section>
    </main>
        
    <!-- footer -->
    <?php
        include "../include/footer.php";
    ?>
</body>
</html>