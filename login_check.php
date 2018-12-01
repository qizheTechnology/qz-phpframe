<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/23
 * Time: 15:34
 */
session_start();
$user=$_POST['user'];
if(empty($user)){
    echo"<script>alert('帐号不为空');history.back();</script>";
    exit;
}
$password=$_POST['password'];
if(empty($password)){
    echo"<script>alert('密码不为空');history.back();</script>";
    exit;}
$conn = include_once 'login_db.php';
$sql="select * from user where name='".$user."' and pass='".$password."'";

$result=mysqli_query($conn,$sql);
//$login_id=mysql_fetch_array($result);
if($result){
    $num=mysqli_num_rows($result);

    if($num>0){
        $_SESSION['ischecked']=$user;
        echo "<script>window.location.href='index.php';</script>";
    }
    else
    {
        echo"<script>alert('登陆失败!请检查用户名和密码！');history.back();</script>";
    }
}
mysqli_close($conn);

?>