<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $memberID = $_SESSION['memberID'];
    $youPass = $_SESSION['youPass'];
    $blogTitle = $_POST['blogTitle'];
    $blogContents = nl2br($_POST['blogContents']);
    $blogCate = $_POST['blogCate'];
    $blogAuthor = $_SESSION['youName'];
    $blogView = 1;
    $blogLike = 0;
    $blogRegTime = time();
    
    $blogTitle = $connect -> real_escape_string($blogTitle);
    $blogContents = $connect -> real_escape_string($blogContents);

    // array(5) {
    //     ["name"]=>
    //     string(14) "card_img03.jpg"
    //     ["type"]=>
    //     string(10) "image/jpeg"
    //     ["tmp_name"]=>
    //     string(14) "/tmp/php9Dghu2"
    //     ["error"]=>
    //     int(0)
    //     ["size"]=>
    //     int(104295)
    // }

    $blogImgFile = $_FILES['blogFile'];
    $blogImgSize = $_FILES['blogFile']['size'];
    $blogImgType = $_FILES['blogFile']['type'];
    $blogImgName = $_FILES['blogFile']['name'];
    $blogImgTmp = $_FILES['blogFile']['tmp_name'];
    
    echo "<pre>";
    var_dump($blogImgSize);
    echo "</pre>";

    //이미지 파일명 확인
    $fileTypeExtension = explode("/", $blogImgType);
    $fileType = $fileTypeExtension[0]; //image
    $fileExtension = $fileTypeExtension[1]; //jepg

    //이미지 확인 / 이미지 확장자 확인 / 용량(1MB) 확인(숙제)
    $blogImgDir = "../assets/img/blog/";
    if($blogImgSize !== 0){
        if($fileType == "image"){
            //용량 확인
            if($blogImgSize < 1048576){
                //확장자 확인
                if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                    $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";

                    $sql = "INSERT INTO myBlog(memberID, youPass, blogTitle, blogContents, blogCategory, blogAuthor, blogView, blogLike, blogImgFile, blogImgSize, blogDelete, blogRegTime) VALUES('$memberID', '$youPass', '$blogTitle', '$blogContents', '$blogCate', '$blogAuthor', '$blogView', '$blogLike', '$blogImgName', '$blogImgSize', 1,'$blogRegTime')";
                    $result = $connect -> query($sql);
                    $result = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);

                    Header("Location: blog.php");
                } else {
                    echo "<script>alert('지원하는 이미지 파일 형식이 아닙니다. jpg, png, gif 사진 파일만 지원됩니다.'); history.back(1);</script>";
                }
            } else {
                echo "<script>alert('이미지 용량이 초과되었습니다. 1MB이하의 이미지만 업로드 가능합니다.'); history.back(1);</script>";
            }
        } else {
            echo "<script>alert('이미지 파일만 업로드해주세요.'); history.back(1);</script>";
        }
    } else {
        $sql = "INSERT INTO myBlog(memberID, youPass, blogTitle, blogContents, blogCategory, blogAuthor, blogView, blogLike, blogImgFile, blogImgSize, blogDelete, blogRegTime) VALUES('$memberID', '$youPass', '$blogTitle', '$blogContents', '$blogCate', '$blogAuthor', '$blogView', '$blogLike', 'default.svg', '$blogImgSize', 1,'$blogRegTime')";
        $result = $connect -> query($sql);
        $result = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);

        Header("Location: blog.php");
    }

    
?>