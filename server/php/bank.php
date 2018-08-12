<?php
// 我的题库处理
    include 'connectDB.php';
    class Foo{
        var $state = '-1';
        var $content = array();
    }
    class Content{
        var $title = '';
        var $point = '';
    }
    class User{
        var $id = -1;
    }
    $obj = new Foo;
    $user = new User;

    $conn = connectDB();
    if (!$conn) {
        $obj -> state = 2; //数据库连接失败
        echo json_encode($obj);
        die();
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $obj -> state = '1'; // GET请求成功
        $user -> id = $_GET["id"]; //获取用户id
    }
    else{
        $obj -> state = '0'; // GET失败
    }

    $stmt = $conn -> prepare("select title, point from know where userID = ?");
    $stmt -> bind_param('i', $user -> id);
    $stmt -> execute();
    $res = $stmt -> get_result();
    if ($res -> num_rows > 0) {
        while ($row = $res -> fetch_assoc()) {
            $cont = new Content;
            $cont -> title = $row['title'];
            $cont -> point = $row['point'];
            array_push($obj->content, $cont);
        }
    }

    echo json_encode($obj);
    $stmt -> close();
    $conn -> close();

?>