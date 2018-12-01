<?php
require_once 'session.php'; 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" >
<title>左边导航</title>
<link rel="stylesheet" type="text/css" href="Assets/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="Assets/css/common.css"/>
<script type="text/javascript" src="Assets/js/jquery-1.8.3.min.js"></script>
<!--框架高度设置-->
<script type="text/javascript">
$(function(){
	$('.sidenav li').click(function(){
		$(this).siblings('li').removeClass('now');
		$(this).addClass('now');
	});
	
	$('.erji li').click(function(){
		$(this).siblings('li').removeClass('now_li');
		$(this).addClass('now_li');
	});
	
	var main_h = $(window).height();
	$('.sidenav').css('height',main_h+'px');
	<?php
	$user=$_SESSION['ischecked'];
	if($user!='admin')
	{
	echo "document.getElementById('a1').style.display = 'none';";
	echo "document.getElementById('a').style.display = 'none';";
	}
	?>
})
</script>
<!--框架高度设置-->
</head>

<body>
<div id="left_ctn">
    <ul class="sidenav">
        <li class="now">
            <div class="nav_m">
                <span><a>蛋糕</a></span>
                <i>&nbsp;</i>
            </div>
            <ul class="erji">
                <li class="now_li">
                    <a href="bigcake/index.php" target="main"><span>生日蛋糕订单</span></a>
                </li>
                <li>
                    <a href="smallcake/qj_xz.php" target="main"><span>切件定义新增</span></a>
                </li>
				 <li>
                    <a href="smallcake/qj_xz_jl.php" target="main"><span>切件查看</span></a>
                </li>
				 <li>
                    <a href="smallcake/qj_sl_xz.php" target="main"><span>切件日销量录入</span></a>
                </li>
				<li>
                    <a href="smallcake/qj_jl.php" target="main"><span>切件日销量</span></a>
                </li>
            </ul>
        </li>
         <li >
            <div class="nav_m">
                <span><a>电费</a></span>
                <i>&nbsp;</i>
            </div>
            <ul class="erji">
                <li class="now_li">
                    <a href="electricity/df_ye.php" target="main"><span>电费余额</span></a>
                </li>
				<li >
                    <a href="electricity/df_c.php" target="main"><span>饭卡充值</span></a>
                </li>
				<li >
                    <a href="electricity/df_z.php" target="main"><span>饭卡支出</span></a>
                </li>
				<li >
                    <a href="electricity/df_jl.php" target="main"><span>充值记录</span></a>
                </li>
				<li >
                    <a href="electricity/df_jl_z.php" target="main"><span>支出记录</span></a>
                </li>
            </ul>
        </li>
         <li >
            <div class="nav_m">
                <span><a>打印</a></span>
                <i>&nbsp;</i>
            </div>
            <ul class="erji">
                <li class="now_li">
                    <a href="print/dy_sr.php" target="main"><span>打印日收入</span></a>
                </li>
				<li>
                    <a href="print/dy_zc.php" target="main"><span>打印相关支出</span></a>
                </li>
				<li>
                    <a href="print/dy_jl.php" target="main"><span>打印收支记录</span></a>
                </li>
				<li>
                    <a href="print/dy_zc_jl.php" target="main"><span>打印相关支出详细</span></a>
                </li>
            </ul>
        </li>
		 <li >
            <div class="nav_m">
                <span><a>衣服</a></span>
                <i>&nbsp;</i>
            </div>
            <ul class="erji">
                <li class="now_li">
                    <a href="clothes/yf_lr.php" target="main"><span>订单录入</span></a>
                </li>
				<li>
                    <a href="clothes/yf_jl.php" target="main"><span>订单查看</span></a>
                </li>
            </ul>
        </li>
       
        
        <li id="a">
                <span><a href="user/user_add.html" target="main">新增用户</a></span>
                <i>&nbsp;</i>
           
        </li>
		<li id="a1">
                <span><a href="user/user_list.php" target="main">用户管理</a></span>
                <i>&nbsp;</i>
				
           
        </li>
		<li >
                <span><a href="user/set_pass.php" target="main">修改密码</a></span>
                <i>&nbsp;</i>
				
           
        </li>
		<li >
                <span><a href="login_out.php">退出系统</a></span>
                <i>&nbsp;</i>
           
        </li>
    </ul>
</div>
</body>
</html>
