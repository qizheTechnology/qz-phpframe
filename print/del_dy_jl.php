<?php

/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/23
 * Time: 10:56
 */
require_once '../session.php';
$id=$_GET['id'];
if (empty($id)) {
    echo "<script>alert('该日仅有支出记录，如要删除，请在支出详细中删除');history.back();</script>";
    exit;
}
$sql="delete from dy_sr where id=$id";
$conn = include_once '../login_db.php';
     if (!mysqli_query($conn, $sql)) {
        die('error:' . mysqli_error());
	 }
mysqli_close($conn);
echo"<script>alert('删除成功');history.back();</script>";
?>