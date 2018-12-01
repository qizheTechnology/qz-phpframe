<?php
/**
 * Created by PhpStorm.
 * User: 启哲科技
 * Date: 2018/8/18
 * Time: 17:59
 */
require_once '../session.php';
$sh_id=$_GET['sh_id'];
$dd_id=$_GET['dd_id'];
$conn=include_once '../login_db.php';
$sql="select cust,sh_id,x_date,c_num,p_name,p_money,pounds,layer,sandwich,sweetness,tableware,hat,candle,accessories2,accessories1,sentiment,g_time,relationship,g_adds,remark,s_money,payment,dd_id,g_time2 from dd where dd_id='$dd_id'";
if($result=mysqli_query($conn,$sql)){
$row = mysqli_fetch_array($result);
mysqli_close($conn);
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
    <script type="text/javascript">
        function a(select,n){
            var index=document.getElementById(select).selectedIndex;//获取当前选择项的索引.
            var a=document.getElementById(select).options[index].text;//获取当前选择项的文本.
            document.getElementById(n).value=(a);
        }
        function b(select) {
            document.getElementById(select).value=0;
        }
        function c(){
            var ck=document.getElementById('ck');
            if (ck.checked) {
                ck.value=1;
            }
            else
                ck.value=0;
            }
        function d(){
            var a=document.getElementById('pounds');
            var b=document.getElementById('layer');
            if(a.value<3)
            {
                b.value=1;
                b.disabled='disabled';

            }
            else
            {
                b.disabled="";
                b.max=a.value-1;

            }
        }
        window.onload=function(){
            var a=document.getElementById('pounds');
            var b=document.getElementById('layer');

            if(a.value<3)
            {
                b.disabled='disabled';
            }
        }

    </script>
    <title>CCSS</title>
</head>
<body>
<div>

    <form action="order_add_check.php">
        <button type="submit">提交</button><button type="button" onclick="history.back();">返回</button>
        <div>
            <?php
            if($dd_id!="") {
                echo "订单编号：<input name='dd_id' value='$dd_id' style='background-color:lightgrey; ' readonly='readonly'>";
            }
            ?>
            客户编号：<input name='sh_id' value='<?=$sh_id?>' style='background-color:lightgrey; ' readonly='readonly'>
        </div>
        <br>
        <hr>
        <br>
        <div>
            订单客户：<input name="cust" value="<?=$row[0]?>" >
            联系方式：<input name="c_num" value="<?=$row[3]?>" >
            下单日期：<input name="x_date" type="date" value="<?=$row[2]?>">
        </div>
        <br>
        <hr>
        <br>
        <div>
            产品名称：<input name="p_name" value="<?=$row[4]?>" >
            产品金额：<input name="p_money" value="<?=$row[5]?>" >
        </div>
        <br>
        <div>
            蛋糕磅数：<input min='0.5' step="0.5" id="pounds" type="number" name="pounds"  value="<?=$row[6]?>" onchange="d();";>
            蛋糕层数：<input min='1' id="layer"  type="number"  name="layer" value="<?=$row[7]?>" >
        </div>
            <br>
            <hr>
            <br>
            <div>
                <span>蛋糕夹心：</span>
                <select id="select1" style="width:149px;height:23px;" onchange="a(this.id,'sandwich')">
                    <option >请选择</option>
                    <option value="芒果">芒果</option>
                    <option value="火龙果">火龙果</option>
                    <option value="奥利奥">奥利奥</option>
                </select>
                <input name="sandwich" id="sandwich" style="width:130px;height:17px;margin-left:-157px;"  type="text"  value="<?=$row[8]?>" onkeypress="b('select1')" />

                <span style="margin-left: 25px">蛋糕甜度：</span>
                <select id="select2" style="width:149px;height:23px;" onchange="a(this.id,'sweetness')">
                    <option >请选择</option>
                    <option value="标准">标准</option>
                    <option value="木糖醇">木糖醇</option>
                </select>
                <input name="sweetness" id="sweetness" style="width:130px;height:17px;margin-left:-157px;"  type="text"  value="<?=$row[9]?>" onkeypress="b('select2')"/>
            </div>

        </div>
        <br>
        <div>

            <div>
                <span>生日帽子：</span>
                <select id="select3" style="width:149px;height:23px;" onchange="a(this.id,'hat')">
                    <option>请选择</option>
                    <option value="默认儿童款">默认儿童款🚗</option>
                    <option value="默认成人款">默认成人款🧢</option>
                    <option value="米奇">米奇🐀</option>
                    <option value="绒球">绒球⚽</option>
                    <option value="定制">定制</option>
                </select>
                <input id="hat" name="hat" style="width:130px;height:17px;margin-left:-157px;"  type="text"  value="<?=$row[11]?>" onkeypress="b('select3')"/>

                <span style="margin-left: 25px">生日蜡烛：</span>
                <select id="select4" style="width:149px;height:23px;" onchange="a(this.id,'candle')">
                    <option>请选择</option>
                    <option value="默认">默认</option>
                    <option value="数字蜡烛">数字蜡烛🔢</option>
                    <option value="派对款">派对款🥧</option>
                </select>
                <input name="candle" id="candle" style="width:130px;height:17px;margin-left:-157px;"  type="text"  value="<?=$row[12]?>" onkeypress="b('select4')"/>
            </div>
            <br>
            <div>
                蛋糕餐具（默认5份餐具/磅）：<input min="0" type="number" step="5" style="width: 30px" name="tableware" value="<?=$row[10]?>" >
            </div>
            <br>
            <div>
            点火装置：
                <select name="accessories2" >
                    <option>请选择</option>
                    <option <?php if($row[13]==1)echo "selected='selected'"; ?> value="1">无需</option>
                    <option <?php if($row[13]==2)echo "selected='selected'"; ?> value="2">火柴</option>
                    <option <?php if($row[13]==3)echo "selected='selected'"; ?> value="3">火机</option>
                </select>

                <span>蛋糕贺卡：</span>
                <select id="select5" style="width:149px;height:23px;" onchange="a(this.id,'accessories1')">
                    <option>请选择</option>
                    <option value="无需">无需</option>
                    <option value="代写">代写</option>
                    <option value="空白自写">空白自写</option>
                </select>
                <input name="accessories1" id="accessories1" style="width:130px;height:17px;margin-left:-157px;margin-right:20px;"  type="text"  value="<?=$row[14]?>" onkeypress="b('select5')"/>

                祝福语：<input name="sentiment"  value="<?=$row[15]?>">
            </div>

        </div>
            <br>
            <hr>
            <br>
        <div>
            收货地址：<input name="g_adds" value="<?=$row[18]?>" style="width: 310px" >
            收货时间：<input name="g_time" value="<?=$row[16]?>" type="date"><input id="g_time2" name="g_time2" value="<?php $s=substr($row[23],0,5);echo "$s"; ?>" type="time">
        </div>
        <br>
        <div>
            下单人和收款人关系：<input name="relationship"  value="<?=$row[17]?>">
        </div>
        <br>
        <hr>
        <br>
        <div>
            金额合计：<input name="s_money" value="<?=$row[20]?>" >
            是否付款：<input id="ck" type="checkbox" name="payment" onclick="c();"  <?php if($row[21]==1)echo "checked='checked' value=1";else echo "value=0" ?>>
        </div>
        <br>
        <hr>
        <br>
        <div>
            订单备注：<input  type="text" style='height:100px;width: 300px;' name="remark" value="<?=$row[19]?>" >
        </div>
    </form>
</div>
</body>
</html>
