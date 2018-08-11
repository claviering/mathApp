<?php
// 登录处理
    include 'connectDB.php';
    class User{
        var $state = '-1'; // 状态
        var $loginInfo = '-1'; // 登录状态
        var $id = '-1'; // 用户登录成功后的ID
    }
    $userObj = new User;

    $conn = connectDB();
    if (!$conn) {
        $userObj -> state = 2; // 数据库连接错误
        echo json_encode($userObj);
        die();
    }

    $userName = '';
    $userPassword = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $userObj -> state = '1';
        $res = file_get_contents("php://input"); //获取axios post json格式的数据
        $phpObj = json_decode($res);
        $userName = $phpObj->{'name'};
        $userPassword = $phpObj->{'password'};
    }
    else{
        $userObj -> state = '0';
    }
    // TODO
    // SQL注入过滤
    $sql = 'select password,id from users where name = ' . '"'. $userName . '"';
    $res = $conn -> query($sql);
    if (!$res) // 查询不到数据，用户不存在
    {
        $userObj -> loginInfo = '0'; // 用户不存在
        die();
    }
    if ($res -> num_rows > 0) {
        while ($row = $res -> fetch_assoc()) {
            $passwdInDB = $row['password'];
            $userIDInDB = $row['id'];
        }
    }
    if ($userIDInDB == '') {
        $userObj -> loginInfo = '0'; // 用户不存在
    }
    if ($passwdInDB == $userPassword) {
        $userObj -> loginInfo = '2'; // 登录成功
        $userObj -> id = $userIDInDB;
    } else {
        $userObj -> loginInfo = '1'; // 密码错误
    }
    echo json_encode($userObj); // 返回json格式

    $conn -> close();
?>