<?php
// 添加题目,分类处理
    include 'connectDB.php';
    $obj -> $id = '-1';
    $obj -> $title = '-1';

    $conn = connectDB();
    if (!$conn) {
        $obj -> $state = 2; //数据库连接失败
        echo json_encode($obj);
        die();
    }

    
    $id = '';
    $title = '';
    $point = '';
    $answer = '';
    $classify = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $obj -> $state = '1'; // POST请求成功
        $res = file_get_contents("php://input"); //获取axios post json格式的数据
        $phpObj = json_decode($res);
        $userID = $phpObj->{'id'};
        $userTitle = $phpObj->{'title'};
        $userPoint = $phpObj->{'point'};
        $userAnswern = $phpObj -> {'answer'};
        $userClassify = $phpObj -> {'classify'};
    }
    else{
        $obj -> $state = '0'; // POST失败
    }

    $userID = $mysqli -> escape_string($userID); //sql过滤

    $maxKnowIDsql = 'select knowID from know where knowID=(select max(knowID) from know)';
    $maxKnowID = $conn -> query($maxKnowIDsql);
    $knowID = $maxKnowID + 1;


    $insertKnowsql = 'insert into know (title, point, answer, userID, knowID) values ($userTitle, $userTitle, $userAnswern, $userID, $knowID)';

    if ($conn -> query($insertKnowsql) == true) {
        $obj -> $state = '3'; // 添加知识点成功
    } else {
        $obj -> $state = '0'; // 添加知识点失败
    }


    // TO DO
    // 分类的数据库添加暂时不做

    echo json_encode($obj); // 返回json格式


    $conn -> close();

?>