<?php
// 注册处理
    include 'connectDB.php';
    class SignUpInforn{
        var $name = '';
        var $password = '';
        var $passwordAgain = '';
    }
    class Response{
        var $state = '-1';
        var $signInInfo = '-1';
    }

    $signObj = new SignUpInforn;
    $responseObj = new Response;

    $conn = connectDB();
    if (!$conn) {
        $responseObj -> state = '2'; //数据库连接失败
        echo json_encode($responseObj);
        die();
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $responseObj -> state = '1'; // POST请求成功
        $res = file_get_contents("php://input"); //获取axios post json格式的数据
        $phpObj = json_decode($res);
        $signObj -> name = $phpObj->{'name'};
        $signObj -> password = $phpObj->{'password'};
        $signObj -> passwordAgain = $phpObj -> {'passwordAgain'};
    }
    else{
        $responseObj -> state = '0'; // POST失败
    }

    // TODO
    // SQL注入过滤
    $findUserIDsql = 'select id from users where name = '. '"' . $signObj -> name . '"';
    $res = $conn -> query($findUserIDsql);
    if (!$res) { // 用户已经存在
        $responseObj -> signInInfo = '1';
        echo json_encode($responseObj);
        die();
    }

    $max = -1;
    $maxIDsql = 'select id from users where id=(select max(id) from users)';
    $maxID = $conn -> query($maxIDsql);
    if ($maxID -> num_rows > 0) {
        while ($row = $maxID -> fetch_assoc()) {
            $max = $row['id'];
        }
    }
    $userID = $max + 1; //新用户id
    $signInUsersql = 'insert into users (id, name, password) values (' . $userID . ',' .'"'. $signObj -> name.'"' .',' .'"'. $signObj -> password.'"' . ')';

    if ($conn -> query($signInUsersql) == true) {
        $responseObj -> signInInfo = '2'; // 注册成功
    } else {
        $responseObj -> signInInfo = '0'; // 注册失败
    }

    echo json_encode($responseObj); // 返回json格式


    $conn -> close();
?>