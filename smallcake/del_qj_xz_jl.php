<?php

/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/11/20
 * Time: 10:56
 */
require_once '../session.php';
$id=$_GET['id'];

$conn = include_once '../login_db.php';
	 $sql="delete from cpb where id=$id";
	 if (!mysqli_query($conn, $sql)) {
        die('error:' . mysqli_error());
	 }
mysqli_close($conn);
echo"<script>alert('删除成功');history.back();</script>";
?>