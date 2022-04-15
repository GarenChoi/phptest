<?php
    include "../../connect/connect.php";
    
    // 놀이터 
    for($i=1; $i<=100; $i++){
        $regTime = time();

        $sql = "INSERT INTO teamBoardN(memberID, boardTitle, boardMeet, boardContents, boardLike, regTime) VALUES (1, '놀이터${i}로와', 'https://meet.google.com/vje-owqj-eog','놀이터 내용${i}입니다.', '0', '$regTime')";
    
        $connect -> query($sql);
    }

    
    // Q & A
    for($i=1; $i<=100; $i++){
        $regTime = time();

        $sql = "INSERT INTO teamBoardQ(memberID, boardTitle, boardContents, boardConfirm, regTime) VALUES (1, 'Q&A${i}입니다.', 'Q&A 내용${i}입니다.', 'waiting', '$regTime')";
    
        $connect -> query($sql);
    }
?>