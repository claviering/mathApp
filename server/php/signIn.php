<?php
// 登录处理
    include 'connectDB.php';
    class User{
        var $state = '-1'; // 状态
        var $loginInfo = '-1'; // 登录状态
        var $id = '-1'; // 用户登录成功后的ID
        var $icourl = '';
    }
    class DateBaseInfo{
        var $id = '';
        var $password = '';
        var $url = '';
    }
    class Client{
        var $name = '';
        var $password = '';
    }
    $userObj = new User;
    $DBInfo = new DateBaseInfo;
    $ClientInfo = new Client;

    $conn = connectDB();
    if (!$conn) {
        $userObj -> state = 2; // 数据库连接错误
        echo json_encode($userObj);
        die();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $userObj -> state = '1';
        $res = file_get_contents("php://input"); //获取axios post json格式的数据
        $phpObj = json_decode($res);
        $ClientInfo -> name = $phpObj->{'name'};
        $ClientInfo -> password = $phpObj->{'password'};
    }
    else{
        $userObj -> state = '0';
    }
    
    $stmt = $conn -> prepare('select password,id from users where name = ?');
    $stmt -> bind_param('s', $ClientInfo -> name);
    $stmt -> execute();
    $res = $stmt -> get_result();
    if ($res -> num_rows < 1) // 查询不到数据，用户不存在
    {
        $userObj -> loginInfo = '0'; // 用户不存在
        echo json_encode($userObj); // 返回json格式
        die();
    } else if ($res -> num_rows > 0) {
        while ($row = $res -> fetch_assoc()) {
            $DBInfo -> password = $row['password'];
            $DBInfo -> id = $row['id'];
            $DBInfo -> url = $row['icourl'];
        }
    }
    if ($DBInfo -> password == $ClientInfo -> password) {
        $userObj -> loginInfo = '2'; // 登录成功
        $userObj -> id = $DBInfo -> id;
        $userObj -> icourl = $DBInfo -> url;
    } else {
        $userObj -> loginInfo = '1'; // 密码错误
    }
    echo json_encode($userObj); // 返回json格式
    $stmt -> close();
    $conn -> close();
?>