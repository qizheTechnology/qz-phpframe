<?php

/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/18
 * Time: 17:18
 */
require_once '../session.php';
$sh_id=$_GET['sh_id'];
$conn=include_once '../login_db.php';
$sql="select cust,x_date,s_money,dd_id,payment from dd where sh_id=$sh_id order by x_date asc";
$result=mysqli_query($conn,$sql);
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
    <div>
        <a href="order_add.php?sh_id=<?=$sh_id?>"><button>新增</button></a><button type="button" onclick="history.back();">返回</button>
        <table>
            <?php
            $result=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($result);
            if($num>0){
                while($row=mysqli_fetch_array($result))
                {
                    if($row[4]==1)
                    {
                        $a=√;
                    }
                    else
                    {
                        $a="";
                    }
                    echo "<div><tr><td>下单人：$row[0]</td> <td>|下单日期：$row[1]</td> <td> |金额合计：$row[2]</td><td>|是否付款:$a</td><td><a href='order_add.php?sh_id=$sh_id&dd_id=$row[3]'><button>详细</button></a></td><td><a href='del_order.php?sh_id=$sh_id&dd_id=$row[3]' onclick=\"return confirm('确认删除?')\"><button>删除</button></a></td></tr></div>";
                }
            }
            else{
                echo "<tr><td>没有订单(。>︿<)_θ</td></tr>";
            }
            mysqli_close($conn);
            ?>
        </table>
    </div>
</div>
</body>
</html>
