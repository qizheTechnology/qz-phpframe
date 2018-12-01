<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/23
 * Time: 16:24
 */
session_start();
session_unset();
session_destroy();
echo "<script>alert('退出成功!');window.parent.location.href='login.html'</script>";
?>
