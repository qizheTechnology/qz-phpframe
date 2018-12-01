<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/11/9
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
	
    <form action="yf_lr_pass.php">
	<table>
	<h1>
	<font style="color:red;font-size:20px">衣服订单</font>
	</h1>
	<tr>
		<div>
		<td>时间： </td><td><input type="date" name="date" style="width:146px;"/></td>
		</div>
	</tr>
	<tr></tr>
	<tr>
        <div>        
		<td>客户名称：</td><td><input  name="name" /></td>	
		</div>
	</tr>
	<tr>
		<div>
		<td>数量：</td><td><input type="number" step="1" min="0" name="num" /></td>
		</div>
	</tr>
	<tr>
		<div>
		<td>单价：</td><td><input type="number" step="0.01" min="0" name="price" /></td>
		</div>
	</tr>
	<tr>
		<div>
		<td>成本：</td><td><input type="number" step="0.01" min="0" name="cost" /></td>
		</div>
	</tr>
		<tr></tr><tr></tr>
		<tr>
		<div>
		<td>备注：</td>
		<td><input type="text" name="remark" style="width:146px;height:50px"/></td>
		</div>
		</tr>
		
		</table>
		<button type="submit">提交</button><font style="color:red;font-size:12px"></font>
    </form>
	
</div>
</body>
</html>
