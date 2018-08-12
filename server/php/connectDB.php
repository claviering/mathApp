<?php
// 连接数据库 返回连接对象
function connectDB(){
    $dbhost = 'localhost:3306';  // mysql服务器主机地址
    $dbuser = 'shiwei';            // mysql用户名
    $dbpass = 'shiwei321';          // mysql用户名密码
    $dbname = 'mathapp';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if($conn -> connect_error)
    {
        return false;
        die();
    }
    return $conn;
}
?>