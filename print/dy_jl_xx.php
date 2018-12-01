<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/10/31
 * Time: 11:42
 */
$id=$_GET['id'];
require_once '../session.php';
$conn=include_once '../login_db.php';
$sql="select date,zpay,wpay1,wpay2,q,cust_num1,cust_num2,remark,(zpay+wpay1+wpay2+q) as s,(cust_num1+cust_num2) as num from dy_sr where id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
if($num>0){
	$row=mysqli_fetch_array($result);	
}
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
    <title>CCSS</title>
</head>
<body>
<div style="float:left;">
	
	<table>
	<h1>
	<font style="color:red;font-size:20px">打印日收入</font>
	</h1>
	<tr>
		<div>
		时间：<?php echo "$row[0]";?>
		</div>
	</tr>
	<tr>
        <div>        
		<td>打印1微信：</td><td><?php echo "$row[2]";?></td>	
		</div>
	</tr>
	<tr>
		<div>
		<td>打印2微信：</td><td><?php echo "$row[3]";?></td>
		</div>
	</tr>
	<tr>
		<div>        
		<td>支付宝：</td><td><?php echo "$row[1]";?></td>
		</div>
	</tr>
	<tr>
		<div>        
		<td>其他：</td><td><?php echo "$row[4]";?></td>
		</div>
	</tr>
	<tr>
		<div>        
		<td>打印1用户数：</td><td><?php echo "$row[5]";?></td>
		</div>
	</tr>
		<div>        
		<td>打印2用户数：</td><td><?php echo "$row[6]";?></td>
		</div>
		<br>
		<div>
		备注：
		<?php echo "$row[7]";?>
		</div>
		<div>
		收入合计：
		<font color="red"><?php echo "$row[8]";?></font>
		</div>
		<div>
		总用户数：
		<font color="red"><?php echo "$row[9]";?></font>
		</div>
		<br>
		</table>
		
    
	<button onclick="window.location.href='dy_jl.php'">返回</button><font style="color:red;font-size:12px"></font>
</div>
</body>
</html>
