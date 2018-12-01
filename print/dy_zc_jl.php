<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/10/31
 * Time: 17:20
 * 支出记录
 */
require_once '../session.php';
$conn=include_once '../login_db.php';
$date1=$_GET["date1"];
$date2=$_GET["date2"];
if(empty($date1)&&empty($date2))
{
	$sql="select * from dy_zc";	
}
else if(empty($date1))
{
	$sql="select * from dy_zc where date<='$date2'";
	
}
else if(empty($date2))
{
	$sql="select * from dy_zc where date>='$date1'";
	
}
else if($date1>$date2)
{
	echo "<script>alert('开始日期不能大于结束日期');</script>";
	$sql="select * from dy_zc";
}
else{
	$sql="select * from dy_zc where date<='$date2' and date>='$date1' ";
}
		
		$result=mysqli_query($conn,$sql);
		$pagesize =25;
		$records = mysqli_num_rows($result); //总记录数  
		$pages = ceil($records/$pagesize); //总页数  
		if(empty($_GET["page"]))  
		{  
			$page = 1;  
			$startrow = 0; 
		}else 
		{  
			$page = (int)$_GET["page"];  
			$startrow = ($page-1)*$pagesize;

		}
			$spage=$page-1;
			$epage=$page+1;

if(empty($date1)&&empty($date2))
{
	$sql="select date,name,pay,remark,user,id  from dy_zc  order by date desc LIMIT $startrow,$pagesize";
}
else if(empty($date1))
{
	$sql="select date,name,pay,remark,user,id from dy_zc where  date<='$date2' order by date desc LIMIT $startrow,$pagesize";
}
else if(empty($date2))
{
	$sql="select date,name,pay,remark,user,id from dy_zc where  date>='$date1' order by date desc LIMIT $startrow,$pagesize";
}
else if($date1>$date2)
{
	$sql="select date,name,pay,remark,user,id from dy_zc order by date desc LIMIT $startrow,$pagesize";
}
else{
	$sql="select date,name,pay,remark,user,id from dy_zc where date<='$date2' and date>='$date1' order by date desc LIMIT $startrow,$pagesize";
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
    <title>df</title>

</head>
<body>

<div>
<div style="margin-top:50px;text-align:left;margin-left:20px">
<form>
<input id="date1" type="date" name="date1" />

到

<input id="date2" type="date" name="date2" />

<button type="submit">查询</button>
</form>
<div>
<?php
	
		if(empty($date1)&&empty($date2))
		{		
		}
		else if(empty($date1))
		{
			echo "到 $date2 之前的所有数据";			
		}
		else if(empty($date2))
		{
			echo " $date1 之后的所有数据";				
		}
		else if($date1>$date2)
		{			
		}
		else{
			echo " $date1 到 $date2 的所有数据";		
		}
	
	?>
</div>
</div>	

<!-- 查询 -->
	
    <table  class="list_hy">
	<tr>
        <th>日期</th>
		<th>项目名称</th>
        <th>金额</th>
		 <th>备注</th>
		 <th>操作人</th>
		 <th>删除</th>
    </tr>
    <?php
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0){
        while($row=mysqli_fetch_array($result))
        {   			
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><a href='del_dy_zc.php?id=$row[5]'><button>删除</button></a></td></tr>";			
        }
    }
    mysqli_close($conn);
    ?>
    </table>
	<div class="r_foot">
            	<div class="r_foot_m">
	<div class="page">
				<?php 
					if($page>1)
					{
                	echo "<a href='df_jl.php?page=$spage' class='prev'><img src='../Assets/images/icon7.png' alt=''/></a>";
					}

			 
                $prev = $page-3;  
                $next = $page+3;  
                if($prev<1){ $prev = 1;}  
                if($next>$pages){$next=$pages;}  
                for($i=$prev;$i<=$next;$i++)  
                {  
                    //如果是当前页，则不加链接  
                    if($i==$page)  
                    {  
                        echo "<a class='now'>$i</a>";  
                    }else 
                    {  
                        echo "<a href='df_jl.php?page=$i'>$i</a>";  
                    }  
                }  
               
             	if($page!=$pages)
				{
                    echo "<a href='df_jl.php?page=$epage' class='next'><img src='../Assets/images/icon8.png' alt=''/></a>";
				}
					?> 
                </div>
				</div>
				</div>
                <!--分页-->
</div>
</body>
</html>