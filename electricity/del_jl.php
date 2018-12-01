<?php

/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/23
 * Time: 10:56
 */
require_once '../session.php';
$id=$_GET['id'];

$sql="UPDATE df_ye t1 
    INNER JOIN df_jl t2 ON t1.card = t2.card
    set t1.money = case when t2.type=1 then (t1.money-t2.money) else (t1.money+t2.money) end  where t2.id='$id';";
$conn = include_once '../login_db.php';
     if (!mysqli_query($conn, $sql)) {
        die('error:' . mysqli_error());
	 }
	 
	 $sql="delete from df_jl where id=$id";
	 if (!mysqli_query($conn, $sql)) {
        die('error:' . mysqli_error());
	 }
mysqli_close($conn);
echo"<script>alert('删除成功');history.back();</script>";
?>