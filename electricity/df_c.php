<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/10/29
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
	
    <form action="df_c_pass.php">
	<h1>
	<font style="color:red;font-size:20px">饭卡充值</font>
	</h1>
        <div>
        卡号： <select name="card">
		<option value="1">卡1</option>
		<option value="2">卡2</option>
		<option value="3">卡3</option>
		<option value="4">卡4</option>
		<option value="5">卡5</option>
		<option value="6">卡6</option>
		<option value="7">卡7</option>
		<option value="8">卡8</option>
		<option value="9">卡9</option>
		<option value="10">卡10</option>
		</select>
		金额：<input type="number" min="0" name="in_money"style="width:40px" />
		</div>
		<div>
		时间： <input type="date" name="date" style="width:146px;"/>
		</div>
		<br>
		<div>
		备注：
		<input type="text" name="remark" style="width:146px;height:50px"/>
		</div>
		<br>
		<button type="submit">提交</button>
    </form>
</div>
</body>
</html>
