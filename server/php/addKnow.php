<?php
// 添加题目,分类处理
    include 'connectDB.php';
    class Response{
        var $state = '-1';
    }

    class GetInfo{
        var $id = '-1';
        var $title = '';
        var $point = '';
        var $answer = '';
        var $classifies = array();
    }
    $ResponseObj = new Response;
    $getInfo = new GetInfo;

    $conn = connectDB();
    if (!$conn) {
        $ResponseObj -> state = '2'; //数据库连接失败
        echo json_encode($ResponseObj);
        die();
    }

    

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $ResponseObj -> state = '1'; // POST请求成功
        $getRes = file_get_contents("php://input"); //获取axios post json格式的数据
        $phpObj = json_decode($getRes);
        $getInfo -> id = $phpObj->{'id'};
        $getInfo -> title = $phpObj->{'title'};
        $getInfo -> point = $phpObj->{'point'};
        $getInfo -> answern = $phpObj -> {'answer'};
        $getInfo -> classifies = $phpObj -> {'classify'};
    }
    else{
        $obj -> $state = '0'; // POST失败
        die();
    }

    // 获取数据库最大的知识点id
    $maxID = 0;
    $maxKnowIDsql = 'select knowID from know where knowID=(select max(knowID) from know)';
    $maxKnowID = $conn -> query($maxKnowIDsql);
    if ($maxKnowID -> num_rows > 0) {
        while($row = $maxKnowID -> fetch_assoc()) {
            $maxID = $row['knowID'];
        }
    }   
    $knowID = $maxID + 1;

    // 数据插入
    $stmt = $conn -> prepare('insert into know (title, point, answer, userID, knowID) values (?, ?, ?, ?, ?)');
    $stmt -> bind_param('sssdd', $getInfo -> title, $getInfo -> point, $getInfo -> answern, $getInfo -> id, $knowID);
    $stmt -> execute();
    $res = $stmt -> get_result();
    if (!$res) {
        $ResponseObj -> state = '3'; // 添加知识点成功
    } else {
        $ResponseObj -> state = '0'; // 添加知识点失败
    }
    // $insertKnowsql = 'insert into know (title, point, answer, userID, knowID) values ('.'"'.$userTitle.'","'.$userTitle.'","' .$userAnswern.'","' .$userID.'","' .$knowID.'")';
    // echo $insertKnowsql;
    // if ($conn -> query($insertKnowsql) == true) {
    //     $ResponseObj -> $state = '3'; // 添加知识点成功
    // } else {
    //     $ResponseObj -> $state = '0'; // 添加知识点失败
    // }


    // TO DO
    // 分类的数据库添加暂时不做

    echo json_encode($ResponseObj); // 返回json格式

    $stmt -> close();
    $conn -> close();

?>