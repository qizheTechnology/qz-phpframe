<?php

/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/23
 * Time: 10:56
 */
require_once '../session.php';
$sh_id=$_GET['sh_id'];

$sql="select dd_id from dd where sh_id='$sh_id'";
$conn = include_once '../login_db.php';
$result=mysqli_query($conn, $sql);
$num=mysqli_num_rows($result);
if($num==0){
    $sql="delete from shrxx where sh_id=$sh_id";
    if (!mysqli_query($conn, $sql)) {
        die('error:' . mysqli_error());
    }
}
else{
    echo"<script>alert('该客户存在订单不可删除(￢︿̫̿￢☆)');window.location.href='index.php';</script>";
}
mysqli_close($conn);
echo"<script>alert('删除成功');window.location.href='index.php';</script>";
?>