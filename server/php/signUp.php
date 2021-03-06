<?php
// 注册处理
    include 'connectDB.php';
    class SignUpInforn{
        var $name = '';
        var $password = '';
        var $passwordAgain = '';
        var $icourl = '';
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

    // SQL注入过滤
    $stmt = $conn -> prepare("select id from users where name = (?)");
    $stmt -> bind_param('s', $signObj -> name);
    $stmt -> execute();
    $res = $stmt -> get_result();
    if ($res -> num_rows > 0) { // 用户已经存在
        $responseObj -> signInInfo = '1';
        echo json_encode($responseObj);
        die();
    }
    $stmt -> close();
    $max = -1;
    $maxIDsql = 'select id from users where id=(select max(id) from users)';
    $maxID = $conn -> query($maxIDsql);
    if ($maxID -> num_rows > 0) {
        while ($row = $maxID -> fetch_assoc()) {
            $max = $row['id'];
        }
    }
    $userID = $max + 1; //新用户id
    $signObj -> icourl = 'static/img/' . 'null.ico'; // 新注册给一个null
    $signInUsersql = $conn -> prepare("insert into users (id, name, password, icourl) values (?,?,?,?)");
    $signInUsersql -> bind_param('dsss', $userID, $signObj -> name,  $signObj -> password, $signObj -> icourl);
    $signInUsersql -> execute();
    $res = $signInUsersql -> get_result();
    if (!$res) {
        $responseObj -> signInInfo = '2'; // 注册成功
    } else {
        $responseObj -> signInInfo = '0'; // 注册失败
    }
    $signInUsersql -> close();
    echo json_encode($responseObj); // 返回json格式
    $conn -> close();
?>