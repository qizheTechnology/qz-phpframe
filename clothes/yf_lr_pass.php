<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/11/09
 * Time: 12:14
 */
require_once '../session.php';
$name=$_GET['name'];
$num=$_GET['num'];
$price=$_GET['price'];
$cost=$_GET['cost'];
$date=$_GET['date'];
$remark=$_GET['remark'];
$user=$_SESSION['ischecked'];
if (empty($date)) {
    echo "<script>alert('时间不能为空');history.back();</script>";
    exit;
}
    $sql = "insert into yf_jl(name,num,price,cost,date,remark,user) values ('$name','$num','$price','$cost','$date','$remark','$user')";

    $conn = include_once '../login_db.php';
    if (!mysqli_query($conn, $sql)) {
        die('error:' . mysqli_error());
    }
	
mysqli_close($conn);
echo"<script>alert('提交成功');window.location.href='yf_lr.php';</script>";
?>
