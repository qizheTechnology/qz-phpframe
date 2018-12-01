<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/11/20
 * Time: 12:14
 */
require_once '../session.php';
$num=$_GET['num'];
$date=$_GET['date'];
$name=$_GET['name'];
if (empty($name)) {
    echo "<script>alert('产品名称不能为空');history.back();</script>";
    exit;
}
	$sql="select id from qj_jl where date='$date' and name='$name'";
	$conn = include_once '../login_db.php';
    $result=mysqli_query($conn,$sql);
    $n=mysqli_num_rows($result);
	if($n>0)
	{
	$row=mysqli_fetch_array($result);
	$sql = "update qj_jl set num=$num where id='$row[0]'";
	}
	else{
    $sql = "insert into qj_jl(date,name,num) values ('$date','$name','$num')";
	}
    
    if (!mysqli_query($conn, $sql)) {
        die('error:' . mysqli_error());
    }
	
mysqli_close($conn);
echo"<script>alert('提交成功');window.location.href='qj_sl_xz.php';</script>";
?>
