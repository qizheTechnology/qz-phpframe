<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/11/20
 * Time: 17:20
 * 充值记录
 */
require_once '../session.php';
$conn=include_once '../login_db.php';
$sql="select * from cpb ";	

		
		$result=mysqli_query($conn,$sql);
		$pagesize =15;
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
	$sql="select * from cpb LIMIT $startrow,$pagesize ";	
	$result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
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
    <title>ccss</title>

</head>
<body>

<div>
<div style="margin-top:50px;text-align:left;margin-left:20px">

</div>	

<!-- 查询 -->
	
    <table  class="list_hy">
	<tr>
        <th>名称</th>
		<th>金额</th>
        <th>操作</th>
    </tr>
    <?php
    //$result=mysqli_query($conn,$sql);
    //$num=mysqli_num_rows($result);
    if($records>0){
        while($row=mysqli_fetch_array($result))
        {   			
            echo "<tr><td>$row[1]</td><td>$row[2]</td><td><a href='del_qj_xz_jl.php?id=$row[0]'><button>删除</button></a></td></tr>";			
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
                	echo "<a href='qj_xz_jl.php?page=$spage' class='prev'><img src='../Assets/images/icon7.png' alt=''/></a>";
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
                        echo "<a href='qj_xz_jl.php?page=$i'>$i</a>";  
                    }  
                }  
               
             	if($page!=$pages)
				{
                    echo "<a href='qj_xz_jl.php?page=$epage' class='next'><img src='../Assets/images/icon8.png' alt=''/></a>";
				}
					?> 
                </div>
				</div>
				</div>
                <!--分页-->
</div>
</body>
</html>