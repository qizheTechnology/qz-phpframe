<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/18
 * Time: 11:42
 */
require_once '../session.php';
$sh_id=$_GET['sh_id'];
$conn=include_once '../login_db.php';
$sql="select name,num,type,date_format(date,'%Y-%m-%d') as date,remark,sh_id from shrxx where sh_id='$sh_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
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
    <title>CCSS</title>
</head>
<body>
<div>

    <form action="add_cust_check.php">
        <button type="submit">提交</button><button type="button" onclick="history.back();">返回</button>
        <div>
            <?php
            if($sh_id!="") {
                echo "编号：<input name='sh_id' value='$sh_id'  readonly='readonly'>";
            }
            ?>
        </div>
        <div>
        姓名：<input name="name" value="<?=$row[0]?>" >
        电话：<input name="num" value="<?=$row[1]?>" >
        </div>
        <div>
            <?php
            if($sh_id!="") {
                echo "类型：<input name='type' value='$row[2]'>";
            }
            else{
                echo "类型：<input name='type' value='生日'>";
            }
            mysqli_close($conn);
            ?>
        </div>
        <div>
        日期：<input name="date" type="date" value="<?=$row[3]?>">
        </div>
        <div>
        备注：<input style='height:100px;' name="remark"  type="text" value="<?=$row[4]?>">
        </div>
    </form>
</div>
</body>
</html>
