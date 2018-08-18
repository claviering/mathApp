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
        var $classify0 = '';
        var $classify1 = '';
        var $classify2 = '';
        var $classify3 = '';
        var $classify4 = '';
        var $classify5 = '';
        var $classify6 = '';
        var $classify7 = '';
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
    $sqlstring =  "select title,point,classify.* from know,classify where know.knowID=classify.knowID and know.userID=?"
    $stmt = $conn -> prepare($sqlstring);
    $stmt -> bind_param('i', $user -> id);
    $stmt -> execute();
    $res = $stmt -> get_result();
    if ($res -> num_rows > 0) {
        while ($row = $res -> fetch_assoc()) {
            $cont = new Content;
            $cont -> title = $row['title'];
            $cont -> point = $row['point'];
            $cont -> classify0 = $row['classify0'];
            $cont -> classify1 = $row['classify0'];
            $cont -> classify2 = $row['classify0'];
            $cont -> classify3 = $row['classify0'];
            $cont -> classify4 = $row['classify0'];
            $cont -> classify5 = $row['classify0'];
            $cont -> classify6 = $row['classify0'];
            $cont -> classify7 = $row['classify0'];
            array_push($obj->content, $cont);
        }
    }

    echo json_encode($obj);
    $stmt -> close();
    $conn -> close();

?>