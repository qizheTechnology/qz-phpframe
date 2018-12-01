<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/10/28
 * Time: 17:20
 */
require_once '../session.php';
$conn=include_once '../login_db.php';
$sql="select card,money from  df_ye";
?>
<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7 lte9 lte8 lte7" lang="en-US"><![endif]-->
<!--[if IE 8]><html class="ie ie8 lte9 lte8" lang="en-US">	<![endif]-->
<!--[if IE 9]><html class="ie ie9 lte9" lang="en-US"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-US">
<!--<![endif]-->
<head>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="stylesheet" type="text/css" href="../Assets/css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="../Assets/css/common.css"/>
	<link rel="stylesheet" type="text/css" href="../Assets/css/thems.css">
	<script type="text/javascript" src="../Assets/js/jquery-1.8.3.min.js"></script>
    <title>df</title>
	<script language="JavaScript">
function myrefresh()
{
   window.location.reload();
}
setTimeout('myrefresh()',3000); //指定3秒刷新一次
</script>
</head>
<body>
<div>
    
    <table class="list_hy">
    <?php
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0){
        while($row=mysqli_fetch_array($result))
        {           
            echo "<tr><td>卡$row[0]</td><td>  余额:<font color='red'>$row[1]</font></td></tr> ";
        }
    }
    mysqli_close($conn);
    ?>
    </table>
</div>
</body>
</html>