<?php
// 登录处理
    include 'connectDB.php';
    $obj -> state = '-1';
    $obj -> loginInfo = '-1';

    $conn = connectDB();
    if (!$conn) {
        $obj -> state = 2;
        echo json_encode($obj);
        die();
    }

    
    $userName = '';
    $userPassword = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $obj -> state = '1';
        $res = file_get_contents("php://input"); //获取axios post json格式的数据
        $phpObj = json_decode($res);
        $userName = $phpObj->{'name'};
        $userPassword = $phpObj->{'password'};
    }
    else{
        $obj -> state = '0';
    }

    $userName = $mysqli -> escape_string($userName); //sql过滤
    $userPassword = $mysqli -> escape_string($userPassword);
    $sql = 'select password from users where name = $userName';
    $resultPassword = $conn -> query($sql);
    if ($resultPassword == false) {
        $obj -> loginInfo = '0'; // 用户不存在
    }
    if ($resultPassword == $userPassword) {
        $obj -> loginInfo = '2'; // 登录成功
    } else {
        $obj -> loginInfo = '1'; // 密码错误
    }
    echo json_encode($obj); // 返回json格式



    $conn -> close();
?>