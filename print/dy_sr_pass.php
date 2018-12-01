<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/10/31
 * Time: 12:14
 */
require_once '../session.php';
$w1=$_GET['w1'];
$w2=$_GET['w2'];
$q=$_GET['q'];
$b=$_GET['b'];
$n1=$_GET['n1'];
$n2=$_GET['n2'];
$date=$_GET['date'];
$remark=$_GET['remark'];
$user=$_SESSION['ischecked'];
if (empty($date)) {
    echo "<script>alert('时间不能为空');history.back();</script>";
    exit;
}
	$sql="select * from dy_sr where date='$date'";
	$conn = include_once '../login_db.php';
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
	if($num>0)
	{
	echo "<script>alert('该日的收入已经填录，如需修改，请删除原数据再添加');history.back();</script>";
    exit;
	}
	
    $sql = "insert into dy_sr(zpay,wpay1,wpay2,q,date,remark,cust_num1,cust_num2) values ('$b','$w1','$w2','$q','$date','$remark','$n1','$n2')";

    
    if (!mysqli_query($conn, $sql)) {
        die('error:' . mysqli_error());
    }
	
mysqli_close($conn);
echo"<script>alert('提交成功');window.location.href='dy_sr.php';</script>";
?>
