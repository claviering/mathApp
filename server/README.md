# 后台配置

使用PHP和MySQL

/php

后台php文件，POST,GET,都用json格式，前端使用Axios.js

## Usage:

把server文件拷贝到服务器根目录

## 登录请求

接口地址: /server/php/login.php

返回格式: JSON

请求方式: POST

请求格式: JSON

请求参数说明

POST格式json数据，password前端使用MD5加密

{
    "name": "user name",
    "password": "user password"
}

JSON返回示例:

{
    "state": "1", 
    "loginInfo": "0",
    "id": '-1'
}

参数说明

state: POST请求是否成功 0: 失败    1: 成功   2: 数据连接失败

loginInfo: 登录状态     0: 用户不存在   1: 密码错误   2: 登录成功
id  用户登录成功后的id

## 注册请求

接口地址: /server/php/signIn.php

返回格式: JSON

请求方式: POST

请求格式: JSON

请求参数说明

POST格式json数据，password前端使用MD5加密

{
    "name": "user name",
    "password": "user password"
    "passwordAgain": "user password again"
}

JSON返回示例:

{
    "state": "1", 
    "signInInfo": "0"
}

参数说明

state: POST请求状态        0: 失败    1: 成功   2: 数据连接失败

signInInfo:  注册状态      0: 注册失败  1: 用户以存在   2: 注册成功  

## 我的题库请求

接口地址: /server/php/bank.php

返回格式: JSON

请求方式: GET

请求格式: JSON

请求参数说明

{
    "id": "user id", 
}

JSON返回示例:

{
    "state": "0"
    "title": "title text",
    "point": "point text"
}

参数说明

state: GET请求状态        0: 失败    1: 成功  2: 数据库连接失败

title:  题目

point 知识点

## 添加题库请求,分类

接口地址: /server/php/addKnow.php

返回格式: JSON

请求方式: POST

请求格式: JSON

请求参数说明

{
    "id": "user id", 
    "title": "title text",
    "point": "point text",
    "answer": "title answer",
    "classify1": "classify1 name that same as the colums name",
    "classify2": "classify2 name that same as the colums name"
    "classifyn": "classifyn name that same as the colums name",
}

JSON返回示例:

{
    "state": "0"
}

参数说明

state: 添加状态        0: 失败    1: POST成功   2: 数据库连接失败 3: 添加成功
