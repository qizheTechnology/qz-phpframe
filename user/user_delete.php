<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/10/28
 * Time: 17:20
 */
require_once '../session.php';
if($_SESSION['ischecked']!='admin')
{
	exit;
}
$conn=include_once '../login_db.php';
$sql="delete from user where id='".$_GET[id]."'";
mysqli_query($conn,$sql);
echo "<script>alert('删除成功!');window.location.href='user_list.php'</script>";
mysqli_close($conn);
?>