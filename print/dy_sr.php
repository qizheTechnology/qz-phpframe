<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/10/31
 * Time: 11:42
 */
require_once '../session.php';
//$conn=include_once '../login_db.php';
//$sql="";
//$result=mysqli_query($conn,$sql);
//$row=mysqli_fetch_array($result);
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
	
    <form action="dy_sr_pass.php">
	<table>
	<h1>
	<font style="color:red;font-size:20px">打印日收入</font>
	</h1>
	<tr>
		<div>
		时间： <input type="date" name="date" style="width:146px;"/>
		</div>
	</tr>
	<tr>
        <div>        
		<td>打印1微信：</td><td><input type="number" step="0.01" min="0" name="w1" /></td>	
		</div>
	</tr>
	<tr>
		<div>
		<td>打印2微信：</td><td><input type="number" step="0.01" min="0" name="w2" /></td>
		</div>
	</tr>
	<tr>
		<div>        
		<td>支付宝：</td><td><input type="number" step="0.01" min="0" name="b" /></td>
		</div>
	</tr>
	<tr>
		<div>        
		<td>其他：</td><td><input type="number" step="0.01" min="0" name="q" /></td>
		</div>
	</tr>
	<tr>
		<div>        
		<td>打印1用户数：</td><td><input type="number"  min="0" name="n1" /></td>
		</div>
	</tr>
	<tr>
		<div>        
		<td>打印2用户数：</td><td><input type="number"  min="0" name="n2" /></td>
		</div>
		<br>
		<div>
		备注：
		<input type="text" name="remark" style="width:146px;height:50px"/>
		</div>
		
		<br>
		</table>
		<button type="submit">提交</button><font style="color:red;font-size:12px"></font>
    </form>
	
</div>
</body>
</html>
