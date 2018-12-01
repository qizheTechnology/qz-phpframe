<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/16
 * Time: 17:04
 */
$conn=mysqli_connect("localhost","root","abcd1234","ccss");
if (mysqli_connect_errno($conn))
{
    echo "连接 数据库 失败: " . mysqli_connect_error();
}
return $conn;
    ?>

