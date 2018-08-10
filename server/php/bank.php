<?php
// 我的题库处理
    include 'connectDB.php';
    class Foo{
        var $state = '-1';
        var $title = '-1';
        var $point = '-1';
    }
    $obj = new Foo;
    $obj -> state = '-1';
    $obj -> title = '-1';
    $obj -> point = '-1';

    $conn = connectDB();
    if (!$conn) {
        $obj -> state = 2; //数据库连接失败
        echo json_encode($obj);
        die();
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $obj -> state = '1'; // GET请求成功
        $userID = $_GET["id"]; //获取用户id
    }
    else{
        $obj -> state = '0'; // GET失败
    }
    $findUserIDsql = 'select title, point from know where userID = ' . $userID;
    echo $findUserIDsql;
    $res = $conn -> query($findUserIDsql);
    if ($res -> num_rows > 0) {
        while ($row = $res -> fetch_assoc()) {
            echo "title:" . $row["title"] . "point:" . $row["point"];
        }
    }
    echo json_encode($obj);
    $conn -> close();

?>