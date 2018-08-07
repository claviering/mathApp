<?php
// 我的题库处理
    include 'connectDB.php';
    $obj -> state = '-1';
    $obj -> title = '-1';
    $obj -> point = '-1';

    $conn = connectDB();
    if (!$conn) {
        $obj -> state = 2; //数据库连接失败
        echo json_encode($obj);
        die();
    }

    $title = '';
    $point = '';

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $obj -> state = '1'; // GET请求成功
        $userID = $_GET("id"); //获取用户id
    }
    else{
        $obj -> state = '0'; // GET失败
    }

    $userID = $mysqli -> escape_string($userID); //sql过滤
    $findUserIDsql = 'select title, point from users where id = $userID';
    $res = $conn -> query($findUserIDsql);
    if ($res) {
        echo json_encode($res);
        die();
    }
    $conn -> close();

?>