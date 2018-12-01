<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/23
 * Time: 11:36
 */
require_once '../session.php';
$sh_id=$_GET['sh_id'];
$dd_id=$_GET['dd_id'];
$conn = include_once '../login_db.php';
    $sql="delete from dd where dd_id=$dd_id";
    if (!mysqli_query($conn, $sql)) {
        die('error:' . mysqli_error());
    }
mysqli_close($conn);
echo"<script>alert('删除成功');window.location.href='order_list.php?sh_id=$sh_id';</script>";
?>