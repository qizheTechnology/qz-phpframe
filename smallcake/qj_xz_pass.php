<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/11/20
 * Time: 12:14
 */
require_once '../session.php';
$price=$_GET['price'];
$name=$_GET['name'];
if (empty($name)) {
    echo "<script>alert('产品名称不能为空');history.back();</script>";
    exit;
}
	$sql="select * from cpb where name='$name'";
	$conn = include_once '../login_db.php';
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
	if($num>0)
	{
	echo "<script>alert('该产品已存在，如需修改，请删除原数据再添加');history.back();</script>";
    exit;
	}
	
    $sql = "insert into cpb(price,name) values ('$price','$name')";

    
    if (!mysqli_query($conn, $sql)) {
        die('error:' . mysqli_error());
    }
	
mysqli_close($conn);
echo"<script>alert('提交成功');window.location.href='qj_xz.php';</script>";
?>
