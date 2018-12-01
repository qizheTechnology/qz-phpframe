<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/23
 * Time: 16:16
 */
require_once '../session.php';
$oldpassword=$_POST['oldpassword'];
$newpassword=$_POST['newpassword'];
$password=$_POST['password'];
$user=$_SESSION['ischecked'];
if($newpassword!=$password){
    echo"<script>alert('两次密码输入不同');history.back();</script>";
    exit;}
else
    $conn=include_once 'login_db.php';

$sql="select * from user where pass='".$oldpassword."' and name='".$user."'";
$result=mysqli_query($conn,$sql);
if($result){
    $num=mysqli_num_rows($result);

    if($num>0){
        $sql="update user set pass='".$newpassword."' where name='".$user."'";
        if(!mysqli_query($conn,$sql))
        {
            die('error:'.mysqli_error($conn));
        }
        else
        {
            echo"<script>alert('修改成功');window.location.href='../bigcake/index.php';</script>";
        }
    }
    else{

        echo"<script>alert('密码输入错误');window.location.href='../bigcake/index.php';</script>";
    }
    mysqli_close($conn);
}
?>