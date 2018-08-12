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
    $obj = new Foo;
    $cont = new Content;

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

    $stmt = $conn -> prepare('select title, point from know where userID = ?');
    $stmt -> bind_param('d', $userID);
    $stmt -> execute();
    $res = $stmt -> get_result();
    if ($res -> num_rows > 0) {
        while ($row = $res -> fetch_assoc()) {
            $cont -> title = $row['title'];
            $cont -> point = $row['point'];
            array_push($obj->content, $cont);
        }
    }

    // $findUserIDsql = 'select title, point from know where userID = ' . $userID;
    // $res = $conn -> query($findUserIDsql);
    // if ($res -> num_rows > 0) {
    //     while ($row = $res -> fetch_assoc()) {
    //         $cont -> title = $row['title'];
    //         $cont -> point = $row['point'];
    //         array_push($obj->content, $cont);
    //     }
    // }


    echo json_encode($obj);
    $stmt -> close();
    $conn -> close();

?>