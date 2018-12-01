<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/20
 * Time: 16:37
 */
require_once '../session.php';
$cust=$_GET['cust'];
$c_num=$_GET['c_num'];
$p_name=$_GET['p_name'];
$p_money=$_GET['p_money'];
$pounds=$_GET['pounds'];
$layer=$_GET['layer'];
$x_date=$_GET['x_date'];
$sandwich=$_GET['sandwich'];
$sweetness=$_GET['sweetness'];
$hat=$_GET['hat'];
$candle=$_GET['candle'];
$tableware=$_GET['tableware'];
$accessories2=$_GET['accessories2'];

$accessories1=$_GET['accessories1'];
$sentiment=$_GET['sentiment'];
$g_adds=$_GET['g_adds'];
$g_time=$_GET['g_time'];
$g_time2=$_GET['g_time2'];
$relationship=$_GET['relationship'];

$s_money=$_GET['s_money'];
$payment=$_GET['payment'];
$remark=$_GET['remark'];
$dd_id=$_GET['dd_id'];
$sh_id=$_GET['sh_id'];
$g_time2=(string)substr($g_time2,0,2).(string)substr($g_time2,3,2).'00';
if($layer=="")
{
    $layer=1;
}
if (empty($cust)) {
    echo "<script>alert('订单客户不能为空');history.back();</script>";
    exit;
}
if($dd_id!="") {
    $sql="update dd set x_date='$x_date',cust='$cust',c_num='$c_num',p_name='$p_name',p_money='$p_money',pounds='$pounds',layer='$layer',sandwich='$sandwich',sweetness='$sweetness',hat='$hat',candle='$candle',tableware='$tableware',accessories2='$accessories2',accessories1='$accessories1',sentiment='$sentiment',g_adds='$g_adds',g_time='$g_time',g_time2='$g_time2',relationship='$relationship',s_money='$s_money',payment='$payment',remark='$remark' where dd_id='$dd_id'";
}
else{
    $sql = "insert into dd(sh_id,x_date,cust,c_num,p_name,p_money,pounds,layer,sandwich,sweetness,hat,candle,tableware,accessories2,accessories1,sentiment,g_adds,g_time,g_time2,relationship,s_money,payment,remark) values 
('$sh_id','$x_date','$cust','$c_num','$p_name','$p_money','$pounds','$layer','$sandwich','$sweetness','$hat','$candle','$tableware','$accessories2','$accessories1','$sentiment','$g_adds','$g_time','$g_time2','$relationship','$s_money','$payment','$remark')";
}
$conn = include_once '../login_db.php';
if (!mysqli_query($conn, $sql)) {
    die('error:' . mysqli_error($conn));
}
mysqli_close($conn);
echo"<script>alert('保存成功');window.location.href='index.php';</script>";
?>