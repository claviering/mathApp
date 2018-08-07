<?php
// 注册处理
    include 'connectDB.php';
    $obj -> state = '-1';
    $obj -> signInInfo = '-1';

    $conn = connectDB();
    if (!$conn) {
        $obj -> state = 2; //数据库连接失败
        echo json_encode($obj);
        die();
    }

    
    $userName = '';
    $userPassword = '';
    $userPasswordAgain = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $obj -> state = '1'; // POST请求成功
        $res = file_get_contents("php://input"); //获取axios post json格式的数据
        $phpObj = json_decode($res);
        $userName = $phpObj->{'name'};
        $userPassword = $phpObj->{'password'};
        $userPasswordAgain = $phpObj -> {'userPasswordAgain'};
    }
    else{
        $obj -> state = '0'; // POST失败
    }

    $userName = $mysqli -> escape_string($userName); //sql过滤
    $userPassword = $mysqli -> escape_string($userPassword);
    $userPasswordAgain = $mysqli -> escape_string($userPasswordAgain);
    $findUserIDsql = 'select id from users where name = $userName';
    $userID = $conn -> query($findUserIDsql);
    if ($userID > -1) {
        $obj -> signInInfo = '1'; // 用户已经存在
        echo json_encode($obj);
        die();
    }

    $maxIDsql = 'select id from users where id=(select max(id) from users)';
    $maxID = $conn -> query($maxIDsql);
    $userID = $maxID + 1;
    $signInUsersql = 'insert into users (id, name, password) values ($userID, $userName, $userPassword)';

    if ($conn -> query($signInUsersql) == true) {
        $obj -> $signInInfo = '2'; // 注册成功
    } else {
        $obj -> $signInInfo = '0'; // 注册成功
    }

    echo json_encode($obj); // 返回json格式


    $conn -> close();
?>