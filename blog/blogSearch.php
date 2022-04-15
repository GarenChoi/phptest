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
        <h2 class="ir_so">게시판 영역</h2>
        <section id="board-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">구기종목 블로그</h3>
                <p class="section__desc">구기종목과 관련된 블로그입니다. 다양한 정보를 확인하세요!</p>
                <div class="blog__inner">
                    <div class="blog__search">
                        <form action="blogSearch.php" method="GET">
                            <fieldset>
                                <legend class="ir_so">검색영역</legend>
                                <input type="search" name="blogSearch" id="blogSearch" class="search" placeholder="검색어를 입력해주세요!">
                                <label for="blogSearch" class="ir_so">검색</label>
                                <button class="button">검색</button>
                            </fieldset>
                        </form>
                    </div>
                    <div class="blog__btn">
                        <a href="blogWrite.php">글쓰기</a>
                    </div>
                    <div class="blog__cont">

<?php
    $memberID = $_SESSION['memberID'];
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    $pageView = 4;
    $pageLimit = ($pageView * $page) - $pageView;

    $blogSearch = $_GET['blogSearch']; 
    $sql = "SELECT * FROM myBlog WHERE blogDelete = 1 AND blogTitle LIKE '%{$blogSearch}%' OR blogContents LIKE '%{$blogSearch}%' ORDER BY blogID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);

    $count = $connect -> query("SELECT * FROM myBlog WHERE blogDelete = 1 AND blogTitle LIKE '%{$blogSearch}%' OR blogContents LIKE '%{$blogSearch}%' ORDER BY blogID DESC") -> num_rows;
?>
                    <div class="blogSearchResult"><?=$count?>건이 검색되었습니다.</div>
<?php foreach($result as $blog){ ?> 
        <article class='blog'>
            <figure class='blog__header'>
                <a href="blogView.php?blogID=<?=$blog['blogID']?>" style="background-image:url(../assets/img/blog/<?=$blog['blogImgFile']?>);"></a>
            </figure>
            <div class='blog__body'>
                <span class='blog__cate'><?=$blog['blogCategory']?></span>
                <div class='blog__title'><a href="blogView.php?blogID=<?=$blog['blogID']?>"><?=$blog['blogTitle']?></a></div>
                <div class='blog__desc'><?=$blog['blogContents']?></div>
                <div class='blog__info'>
                    <span class='author'><a href='#'><?=$blog['blogAuthor']?></a></span>
                    <span class='date'><?=date('Y-m-d', $blog['blogRegTime'])?></span>
<?php 
    if($memberID == $blog['memberID']){ ?>
    <span class='modify'><a href='blogModify.php?blogID=<?=$blog['blogID']?>'>수정</a></span>
    <span class='delete'><a href='blogRemove.php?blogID=<?=$blog['blogID']?>' onclick="return noticeRemove();">삭제</a></span>
<?php } ?>
                    
                </div>
            </div>
        </article>
<?php    } ?>


                    </div>
                    <div class="blog__pages">
                        <ul>
<?php
    $boardCount = ceil($count/$pageView);

    $pageCurrent = 4;
    $startPage = $page - $pageCurrent;
    $endPage = $page + $pageCurrent;
    
    // 처음 페이지 초기화
    if($startPage < 1) $startPage = 1;

    // 마지막 페이지 초기화
    if($endPage >= $boardCount) $endPage = $boardCount;

    if($page != 1){ 
        $prevPage = $page -1; ?>
            <li><a href="blogSearch.php?page=1&blogSearch=<?=$blogSearch?>">&lt;&lt;</a></li>
            <li><a href="blogSearch.php?page=<?=$prevPage?>&blogSearch=<?=$blogSearch?>">&lt;</a></li>
<?php } ?>
<?php 
    for($i=$startPage; $i<=$endPage; $i++){ 
        $active = "";
        if($i == $page){
            $active = "active"; 
        } ?>
        <li class="<?=$active?>"><a href="blogSearch.php?page=<?=$i?>&blogSearch=<?=$blogSearch?>"><?=$i?></a></li>
<?php } ?>
<?php
    if($page != $boardCount){ 
        $nextPage = $page +1; ?>
        <li><a href="blogSearch.php?page=<?=$nextPage?>&blogSearch=<?=$blogSearch?>">&gt;</a></li>
        <li><a href="blogSearch.php?page=<?=$endPage?>&blogSearch=<?=$blogSearch?>">&gt;&gt;</a></li>
<?php } ?>

                                                    
                        </ul>
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