<?php
// 用户头像保存处理
    include 'connectDB.php';
    // 接收的数据
    class User{
        var $id = '-1'; // 用户登录成功后的ID
        var $password = '';
        var $url = '';
    }
    // 返回数据
    class Response {
        var $state = '-1'; // 状态
    }
    class DateBaseInfo{
        var $password = '';
        var $id = '';
    }
    $userObj = new User;
    $responseObj = new Response;
    $DBInfo = new DateBaseInfo;

    $conn = connectDB();
    if (!$conn) {
        $responseObj -> state = 2; // 数据库连接错误
        echo json_encode($responseObj);
        die();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $responseObj -> state = '1';
        $res = file_get_contents("php://input"); //获取axios post json格式的数据
        $phpObj = json_decode($res);
        $userObj -> id = $phpObj->{'id'};
        $userObj -> password = $phpObj->{'password'};
        $userObj -> url = $phpObj->{'url'};
    }
    else{
        $responseObj -> state = '0';
    }
    
    $stmt = $conn -> prepare('select password from users where id = ?');
    $stmt -> bind_param('s', $userObj -> id);
    $stmt -> execute();
    $res = $stmt -> get_result();
    if ($res -> num_rows < 1) // 查询不到数据，用户不存在
    {
        echo json_encode($responseObj); // 返回json格式
        die();
    } else if ($res -> num_rows > 0) {
        while ($row = $res -> fetch_assoc()) {
            $DBInfo -> password = $row['password'];
            $DBInfo -> id = $row['id'];
        }
    }
    if ($DBInfo -> password == $userObj -> password) {
        $insertUrlSql = $conn -> prepare("insert into users (icourl) values (?)");
        $insertUrlSql -> bind_param('s', $userObj -> url);
        $insertUrlSql -> execute();
        $res = $insertUrlSql -> get_result();
        if (!$res) {
            $responseObj -> state = '1'; // 头像保存成功
        } else {
            $responseObj -> state = '0'; // 头像保存失败
        }
    } else {
        $responseObj -> state = '2'; // 密码错误
    }
    echo json_encode($responseObj); // 返回json格式
    $stmt -> close();
    $conn -> close();
?>