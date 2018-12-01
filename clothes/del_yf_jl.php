<?php

/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/23
 * Time: 10:56
 */
require_once '../session.php';
$id=$_GET['id'];

$sql="delete from yf_jl where id=$id";
$conn = include_once '../login_db.php';
     if (!mysqli_query($conn, $sql)) {
        die('error:' . mysqli_error());
	 }
mysqli_close($conn);
echo"<script>alert('删除成功');history.back();</script>";
?>