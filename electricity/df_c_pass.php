<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/10/29
 * Time: 12:14
 */
require_once '../session.php';
$card=$_GET['card'];
$in_money=$_GET['in_money'];
$date=$_GET['date'];
$remark=$_GET['remark'];
$user=$_SESSION['ischecked'];
if (empty($in_money)) {
    echo "<script>alert('金额不能为0');history.back();</script>";
    exit;
}
if (empty($date)) {
    echo "<script>alert('时间不能为空');history.back();</script>";
    exit;
}
    $sql = "insert into df_jl(card,money,date,remark,user,type) values ('$card','$in_money','$date','$remark','$user','1')";

    $conn = include_once '../login_db.php';
    if (!mysqli_query($conn, $sql)) {
        die('error:' . mysqli_error());
    }
	else
	{
		$sql = "update df_ye set money=money+$in_money where card=$card";
		mysqli_query($conn, $sql);
	}
mysqli_close($conn);
echo"<script>alert('提交成功');window.location.href='df_c.php';</script>";
?>
