<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $blogID = $_GET['blogID'];
    $memberID = $_SESSION['memberID'];
    $youPass = $_SESSION['youPass'];
    $youPassC = $_POST['youPass'];
    $blogTitle = $_POST['blogTitle'];
    $blogContents = nl2br($_POST['blogContents']);
    $blogModTime = time();
    
    $blogTitle = $connect -> real_escape_string($blogTitle);
    $blogContents = $connect -> real_escape_string($blogContents);

    echo $blogContents;
    $blogImgFile = $_FILES['blogFile'];
    $blogImgSize = $_FILES['blogFile']['size'];
    $blogImgType = $_FILES['blogFile']['type'];
    $blogImgName = $_FILES['blogFile']['name'];
    $blogImgTmp = $_FILES['blogFile']['tmp_name'];

    //이미지 파일명 확인
    $fileTypeExtension = explode("/", $blogImgType);
    $fileType = $fileTypeExtension[0]; //image
    $fileExtension = $fileTypeExtension[1]; //jepg

    //비밀번호 확인, 작성자 확인
    $sqlC = "SELECT memberID FROM myBlog WHERE blogID = $blogID";
    $resultC = $connect -> query($sqlC);
    $memberIDC = $resultC -> fetch_array(MYSQLI_ASSOC);

    if($youPass!=$youPassC){
        echo "<script>alert('비밀번호가 일치하지 않습니다!'); history.back(1);</script>";
        exit;
    } else if ($memberID != $memberIDC['memberID']){
        echo "<script>alert('작성자가 아니면 수정할 수 없습니다!'); history.back(1);</script>";
        exit;
    }

    
    //이미지 확인 / 이미지 확장자 확인 / 용량(1MB) 확인(숙제)
    $blogImgDir = "../assets/img/blog/";
    if($blogImgSize !== 0){
        if($fileType == "image"){
            //용량 확인
            if($blogImgSize < 1048576){
                //확장자 확인
                if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                    $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";

                    $sql = "UPDATE myBlog SET blogTitle = '{$blogTitle}', blogContents = '{$blogContents}', blogModTime = '{$blogModTime}', blogImgFile = '{$blogImgName}', blogImgSize = '{$blogImgSize}' WHERE blogID = $blogID";

                    $result = $connect -> query($sql);
                    $result = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);
                    
                    echo "<script>alert('수정이 완료되었습니다.'); history.go(-2);</script>";
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
        $sql = "UPDATE myBlog SET blogTitle = '{$blogTitle}', blogContents = '{$blogContents}', blogModTime = '{$blogModTime}' WHERE blogID = $blogID";
        $result = $connect -> query($sql);

        echo "<script>alert('수정이 완료되었습니다.'); history.go(-2);</script>";
        // Header("Location: blogView.php?blogID=$blogID");
    }

    
?>