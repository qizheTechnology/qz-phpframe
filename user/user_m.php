<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/10/28
 * Time: 17:20
 */
require_once '../session.php';

		$conn=include_once '../login_db.php';

		    $sql="update user set pass=123456 where id='".$_GET["id"]."'";
			if(!mysqli_query($conn,$sql))
			{
				die('error:'.mysql_error());
			}
			else
			{
			echo"<script>alert('修改成功');window.location.href='user_list.php';</script>";
			}
		
		
			mysqli_close($conn);
?>