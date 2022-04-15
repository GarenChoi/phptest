<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $memberID = $_SESSION['memberID'];
    $youIntro = $_POST['youIntro'];
    $youEmail = $_POST['youEmail'];
    $youNickName = $_POST['youNickName'];
    $youName = $_POST['youName'];
    $youBirth = $_POST['youBirth'];
    $youPhone = $_POST['youPhone'];
    $youGender = $_POST['youGender'];
    $youSite = $_POST['youSite'];

    $blogImgFile = $_FILES['imgView'];
    $blogImgSize = $_FILES['imgView']['size'];
    $blogImgType = $_FILES['imgView']['type'];
    $blogImgName = $_FILES['imgView']['name'];
    $blogImgTmp = $_FILES['imgView']['tmp_name'];

    //이미지 파일명 확인
    $fileTypeExtension = explode("/", $blogImgType);
    $fileType = $fileTypeExtension[0]; //image
    $fileExtension = $fileTypeExtension[1]; //jepg

    //이미지 확인 / 이미지 확장자 확인 / 용량(1MB) 확인(숙제)
    $blogImgDir = "../assets/img/mypage/";
    if($blogImgSize !== 0){
        if($fileType == "image"){
            //용량 확인
            if($blogImgSize < 1048576){
                //확장자 확인
                if($fileExtension == "jpg" || $fileExtension == "jpeg" |         $fileExtension == "png" || $fileExtension == "gif"){
                    $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";

                    $sql = "UPDATE myMember SET youIntro = '{$youIntro}', youEmail = '{$youEmail}', youNickName = '{$youNickName}', youName = '{$youName}', youBirth = '{$youBirth}', youPhone = '{$youPhone}', youGender = '{$youGender}', youSite = '{$youSite}', youPhoto = '{$blogImgName}' WHERE memberID = '{$memberID}'";
                    $result = $connect -> query($sql);
                    $result = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);

                    echo "<script>alert('수정이 완료되었습니다.'); history.go(-1);</script>";
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
        $sql = "UPDATE myMember SET youIntro = '{$youIntro}', youEmail = '{$youEmail}', youNickName = '{$youNickName}', youName = '{$youName}', youBirth = '{$youBirth}', youPhone = '{$youPhone}', youGender = '{$youGender}', youSite = '{$youSite}' WHERE memberID = '{$memberID}'";
        $result = $connect -> query($sql);
        echo "<script>alert('수정이 완료되었습니다.'); history.go(-1);</script>";
    }

    
?>
