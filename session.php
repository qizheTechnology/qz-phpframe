<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/23
 * Time: 16:07
 */
session_start();
if(empty($_SESSION['ischecked']))
{
    echo "<script>alert('请重新登录!');window.location.href='//10.60.152.17/ccss/login.html'</script>";
    exit;

}
?>