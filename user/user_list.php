<?php

/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/10/28
 * Time: 17:20
 */
require_once '../session.php';
if($_SESSION['ischecked']!='admin')
{
	exit;
}
$conn=include_once '../login_db.php';
$sql="select * from user";
$result=mysqli_query($conn,$sql);
$pagesize =10;
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
//------------------------------
$sql="select id,name,case when Permissions=1 then '管理员' else '骨干' end as Permissions from user order by id desc LIMIT $startrow,$pagesize";
$result = mysqli_query($conn,$sql);    
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" >
<title>用户管理</title>
<link rel="stylesheet" type="text/css" href="../Assets/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="../Assets/css/common.css"/>
<link rel="stylesheet" type="text/css" href="../Assets/css/thems.css">
<script type="text/javascript" src="../Assets/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
$(function(){
	//自适应屏幕宽度
	window.onresize=function(){ location=location }; 
	
	var main_h = $(window).height();
	$('.hy_list').css('height',main_h-45+'px');
	
	var search_w = $(window).width()-40;
	$('.search').css('width',search_w+'px');
	//$('.list_hy').css('width',search_w+'px');
});
</script>
<!--框架高度设置-->
</head>

<body onLoad="Resize();">
<div id="right_ctn">
	<div class="right_m">
		
        <div class="hy_list">
        	
        
            <div class="space_hx">&nbsp;</div>
            <!--列表-->
            <form action="" method="post">
			
			
            <table cellpadding="0" cellspacing="0" class="list_hy">
              <tr>
                
                <!--<th scope="col"><div>biu<a href="" class="up">&nbsp;</a><a href="" class="down">&nbsp;</a></div></th>-->
                <th scope="col">ID</th>
                <th scope="col">用户名</th>
				<th scope="col">权限</th>
				<th scope="col">操作</th>
              </tr>
			  <?php
				if($result>0)
				{
					while($row=mysqli_fetch_array($result))
					{?>
					<tr>
						<td><?=$row['id']?></td>
						<td><?=$row['name']?></td>
						<td><?=$row['Permissions']?></td>
						
						<td>
						<input   type="button" value="重置密码" onclick="window.location.href='user_m.php?id=<?=$row['id']?>'">默认密码:123456
						<input   type="button" value="删除" onclick="window.location.href='user_delete.php?id=<?=$row['id']?>'" <?php  if($row['name']=='admin'){echo "disabled='disabled'";}?>>
						</td>
					</tr>
						<?php
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
                	echo "<a href='user_list.php?page=$spage' class='prev'><img src='../Assets/images/icon7.png' alt=''/></a>";
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
                        echo "<a href='user_list.php?page=$i'>$i</a>";  
                    }  
                }  
               
             	if($page!=$pages)
				{
                    echo "<a href='user_list.php?page=$epage' class='next'><img src='../Assets/images/icon8.png' alt=''/></a>";
				}
					?> 
                </div>
                <!--分页-->
				
                </div>
            </div>
            </form>
            <!--右边底部-->
        </div>
        
    </div>
</div>
</body>
</html>
