<?php
require_once '../session.php';
$user=$_POST['user'];
$password=$_POST['password'];
if($_SESSION['ischecked']!='admin')
{
	exit;
}
		//验证输入是否为空
		if(empty($user)){
			echo"<script>alert('用户名不能为空');history.back();</script>";
			exit;
			}
		
		$conn=include_once '../login_db.php';
		$sql="select * from user where  name='".$user."'";
		$result=mysqli_query($conn,$sql);
		if($result){
			$num=mysqli_num_rows($result);

		    if($num>0){
		        echo "<script>alert('该用户已存在');window.location.href='user_add.html';</script>";
				exit;
		    }
		
		}
		$sql="INSERT INTO user(name,pass) VALUES('".$user."','".$password."');";
			if(!mysqli_query($conn,$sql))
			{
				die('error:'.mysql_error());
			}
			else
			{
			echo"<script>alert('新增成功');window.location.href='user_add.html';</script>";
			}
			 mysqli_close($conn);
?>