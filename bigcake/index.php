<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/15
 * Time: 17:20
 */
require_once '../session.php';
$conn=include_once '../login_db.php';
$sql="select name,type,date,sh_id,if(DATE_FORMAT(date,'%m%d')=DATE_FORMAT(now(),'%m%d'),0,if(DATE_FORMAT(date,'%m%d')-DATE_FORMAT(now(),'%m%d')>0,
          if(DATE_FORMAT(now(),'%Y') mod 4!=0&&DATE_FORMAT(date,'%m%d')=0229,
             TIMESTAMPDIFF(day,DATE_ADD(concat(DATE_FORMAT(now(),'%Y'),DATE_FORMAT(date,'%m%d')),INTERVAL if(DATE_FORMAT(date,'%m%d')=0229,4-DATE_FORMAT(now(),'%Y') mod 4,1) YEAR),DATE_FORMAT(NOW(),'%Y%m%d')),
             TIMESTAMPDIFF(day,DATE_FORMAT(NOW(),'%Y%m%d'),concat(DATE_FORMAT(now(),'%Y'),DATE_FORMAT(date,'%m%d')))),
       TIMESTAMPDIFF(day,DATE_FORMAT(NOW(),'%Y%m%d'),DATE_ADD(str_to_date(concat(DATE_FORMAT(now(),'%Y'),DATE_FORMAT(date,'%m%d')),'%Y%m%d'),INTERVAL if(DATE_FORMAT(date,'%m%d')=0229,4-DATE_FORMAT(now(),'%Y') mod 4,1) YEAR)))) as a from shrxx order by a";
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
    <a href="add_cust.php"><button>新增</button></a><!--<a href="../login_out.php"><button>退出</button></a><a href="../user/set_pass.php"><button>修改密码</button></a>-->
    <table>
    <?php
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0){
        while($row=mysqli_fetch_array($result))
        {
            if($row[4]==0)
            {
                $b="今天！！🎂biubiu";
            }
            else if($row[4]==1)
            {
                $b="明天生日!！";
            }
            else{
                $b=$row[4];
            }
            echo "<div><tr><td>姓名：$row[0]</td> <td> &emsp;|类型：$row[1]</td> <td> &emsp;&emsp;| 日期：$row[2]</td><td>&emsp;&emsp;<strong><font color='red'>$b</font></strong></td><td><a href='order_list.php?sh_id=$row[3]'><button>订单</button></a></td> <td><a href='add_cust.php?sh_id=$row[3]' ><button>详细</button></a></td><td><a href='del_cust.php?sh_id=$row[3]' onclick=\"return confirm('确认删除?')\"><button>删除</button></a></td></tr></div>";
        }
    }
    mysqli_close($conn);
    ?>
    </table>
</div>
</body>
</html>