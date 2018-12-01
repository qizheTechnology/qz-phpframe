<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/23
 * Time: 16:12
 */
require_once '../session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ccss登陆</title>
</head>
<body>
<form action="set_pass_check.php"  method="post">
    </ul>
    <li><span>原密码：</span>
        <input name="oldpassword" onkeyup="value=value.replace(/[\W]/g,'') "onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))">
    </li>
    <li>
        <span>新密码：</span>
        <input name="newpassword" onkeyup="value=value.replace(/[\W]/g,'') "onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))">
    </li>
    <li>
        <span>确认密码：</span>
        <input name="password" onkeyup="value=value.replace(/[\W]/g,'') "onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))">
    </li>
    <li>
       <button type="submit">确定</button>
    </li>
    </ul>
</form>
</body>
</html>

