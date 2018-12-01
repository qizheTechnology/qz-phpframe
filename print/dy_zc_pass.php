<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/11/1
 * Time: 12:14
 */
require_once '../session.php';
$name=$_GET['name'];
$pay=$_GET['pay'];
$date=$_GET['date'];
$remark=$_GET['remark'];
$user=$_SESSION['ischecked'];
if (empty($date)) {
    echo "<script>alert('时间不能为空');history.back();</script>";
    exit;
}
    $sql = "insert into dy_zc(name,pay,date,remark,user) values ('$name','$pay','$date','$remark','$user')";

    $conn = include_once '../login_db.php';
    if (!mysqli_query($conn, $sql)) {
        die('error:' . mysqli_error());
    }
	
mysqli_close($conn);
echo"<script>alert('提交成功');window.location.href='dy_zc.php';</script>";
?>
