<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/18
 * Time: 12:14
 */
require_once '../session.php';
$name=$_GET['name'];
$num=$_GET['num'];
$type=$_GET['type'];
$date=$_GET['date'];
$remark=$_GET['remark'];
$sh_id=$_GET['sh_id'];
if (empty($name)) {
    echo "<script>alert('姓名不能为空');history.back();</script>";
    exit;
}
if($sh_id!="") {
    $sql="update shrxx set name='$name',num='$num',type='$type',date='$date',remark='$remark' where sh_id='$sh_id'";
}
else{
    $sql = "insert into shrxx(name,num,type,date,remark) values ('$name','$num','$type','$date','$remark')";
}
    $conn = include_once '../login_db.php';
    if (!mysqli_query($conn, $sql)) {
        die('error:' . mysqli_error());
    }
mysqli_close($conn);
echo"<script>alert('保存成功');window.location.href='index.php';</script>";
?>
