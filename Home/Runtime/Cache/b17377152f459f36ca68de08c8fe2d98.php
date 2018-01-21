<?php if (!defined('THINK_PATH')) exit();?><html><head><meta http-equiv="content-type" content="text/html; charset=utf-8"><title>IT资产管理修改界面</title><link rel="stylesheet"   href="__PUBLIC__/css/bootstrap.min.css"><style>        ul.a {list-style-type:circle;}
        ul.b {list-style-type:square;}
        ol.c {list-style-type:upper-roman;}
        ol.d {list-style-type:lower-alpha;}
        li {float:left;margin-bottom:1px;margin-top:1px; align:left;  width:32%;}
        p.a { font-size:20px; background-color:#5bc0de; width:100%;text-align:center;}
        select { width:200px; height: 24px;}
        label { width:180px;}
        input { width:200px; height: 24px;}
        button.p {background-color: #337ab7;border-radius: 4px;margin:1px;padding:2px 5px;}
		button.i {background-color: #5bc0de;border-radius: 4px;margin:1px;padding:2px 5px;}
		button.s {background-color: #5cb85c;border-radius: 4px;margin:1px;padding:2px 5px;}
		button.w {background-color: #f0ad4e;border-radius: 4px;margin:1px;padding:2px 5px;}
		button.d {background-color: #d9534f;border-radius: 4px;margin:1px;padding:2px 5px;}
 		.div-a{ float:left;width:50%;}     
   		.div-b{ float:right;width:50%;}   
		.div-25{ float:right;width:25%;text-align:left; } 
		.div-33{ float:right;width:33%;text-align:left; } 
/*		.div-a{ float:left;width:50%;  border:1px solid #F00} 
		.div-b{ float:left;width:50%;  border:1px solid #000} */

    </style><!--	<script>			  	window.onload=function(){
					if(<?php echo ($data["sex"]); ?>==0){
						document.getElementsByName('sex')[1].checked='checked';
					}else{
					document.getElementsByName('sex')[0].checked='checked';
						}
				}
			</script>   --><script>		   	function jumpadd(){
			window.location="__URL__/add";
			}
       		function jumpreport(){ 
      		 window.location="__URL__/report";
      		}
       		function jumpindex(){ 
      		 window.location="__URL__/index";
   			}
  		</script></head><body><div class="div-a"><button  class="i"  onclick="jumpindex()">返回IT资产管理主界面</button></div><form    action="__URL__/logout" method='post'><div  style = "text-align:right;"><button  type='submit' class="btn btn-success"><?php echo $_SESSION['username']; ?> 退出登录</button></div></form><p class="a"   style="text-align:center;"><b>IT固定资产 单资产完整信息显示 模块</b></p><form action="__URL__/upload"  enctype="multipart/form-data"  id='form' method='post'><input type='hidden' name='id' value="<?php echo ($data["id"]); ?>"/><ul class="b";margin:50px;><li><label >company</label><select name='company' value="<?php echo ($data["company"]); ?>"><?php
 $m=M('company'); $u=M('usercontrol'); $map['cuser']=$_SESSION['username']; $uu=$u->where($map)->getField('company'); $uuu=explode(",", $uu); $condition['comname'] = array('in',$uuu); $a=$m->where($condition)->select(); foreach ($a as $b){ if ($b['comname']== $data['company'] ) { echo "<option value=".$b['comname']." selected='selected'".">".$b['comname']."</option>"; } else echo "<option value=".$b['comname'].">".$b['comname']."</option>"; } ?></select></li><!-- <li><label >Dept</label><input type="text" name='dept' value="<?php echo ($data["dept"]); ?>"/></li> --><li ><label>Dept</label><select  name='dept'  value="<?php echo ($data["dept"]); ?>"><?php
 $dept=M('dept'); $a=$dept->order(deptid)->select(); foreach ($a as $b){ if ($b['deptsname']== $data['dept'] ) { echo "<option value=".$b['deptsname']." selected='selected'".">".$b['deptsname']."</option>"; } else echo "<option value=".$b['deptsname'].">".$b['deptsname']."</option>"; } ?></select></li><li><label >User  (*需转移修改)</label><input type="text"  id='employee' readonly='readonly' name='employee' value="<?php echo ($data["employee"]); ?>"/><br/></li><li><label >hardtype</label><select name='hardtype' value="<?php echo ($data["hardtype"]); ?>"><?php
 $h=M('hardtype'); $a=$h->order(hardid)->select(); foreach ($a as $b){ if ($b['hardtype']== $data['hardtype'] ) { echo "<option value=".$b['hardtype']." selected='selected'".">".$b['hardtype']."</option>"; } else echo "<option value=".$b['hardtype'].">".$b['hardtype']."</option>"; } ?></select></li><li><label >资产编号 (*必填)</label><input type="text" name='fixassettag' value="<?php echo ($data["fixassettag"]); ?>"/><br/></li><li><label >使用状态</label><select  name='usestate'  value="<?php echo ($data["usestate"]); ?>" ><?php	 $ss=array('在用','超期使用',"闲置","已坏","待报废","已坏待报废","已报废","意外丢失"); $length=count($ss); for ($i=0;$i<$length;$i++){ if ($ss[$i] == $data['usestate'] ) { echo "<option value=".$ss[$i]. " selected='selected'".">".$ss[$i]."</option>"; } else echo "<option value=".$ss[$i]. ">".$ss[$i]."</option>"; } ?></select></li><li><label >Brand/Model</label><input type="text" name='brand' value="<?php echo ($data["brand"]); ?>"/><br/></li><li><label >Serial Number</label><input type="text" name='SN' value="<?php echo ($data["SN"]); ?>"/><br/></li><li><label >到货日期(年) (*必填)</label><input type="text" name='buyyear' value="<?php echo ($data["buyyear"]); ?>"/><br/></li><li><label >到货日期(月) (*必填)</label><input type="text" name='buymonth' value="<?php echo ($data["buymonth"]); ?>"/><br/></li><li><label >到货日期(日) (*必填)</label><input type="text" name='buyday' value="<?php echo ($data["buyday"]); ?>"/><br/></li><li><label >使用年限</label><input type="text" name='useyear' value="<?php echo ($data["useyear"]); ?>"/><br/></li><li><label >显示器类型</label><input type="text" name='LCDtype' value="<?php echo ($data["LCDtype"]); ?>"/><br/></li><li><label >设备所在地</label><input type="text" name='locate' value="<?php echo ($data["locate"]); ?>"/><br/></li><li><label >OS</label><select  name='OS'  value="<?php echo ($data["OS"]); ?>" ><?php	 $ss=array('xp','win7',"win8","win10","win2000","win2003","win2008","win2012","Linux","ESX"); $length=count($ss); for ($i=0;$i<$length;$i++){ if ($ss[$i] == $data['OS'] ) { echo "<option value=".$ss[$i]. " selected='selected'".">".$ss[$i]."</option>"; } else echo "<option value=".$ss[$i]. ">".$ss[$i]."</option>"; } ?></select></li><li><label >OSSN</label><input type="text" name='OSSN' value="<?php echo ($data["OSSN"]); ?>"/><br/></li><li><label >Office</label><select  name='office'  value="<?php echo ($data["office"]); ?>" ><?php	 $ss=array('无','office2000','office2003',"office2007","office2010","office2012","office2013","office2016"); $len=count($ss); for ($i=0;$i<$len;$i++){ if ($ss[$i] == $data['office'] ) { echo "<option value=".$ss[$i]. " selected='selected'".">".$ss[$i]."</option>"; } else echo "<option value=".$ss[$i]. ">".$ss[$i]."</option>"; } ?></select></li><li><label >officeSN</label><input type="text" name='officeSN' value="<?php echo ($data["officeSN"]); ?>"/><br/></li><li><label >old tag</label><input type="text" name='oldtag' value="<?php echo ($data["oldtag"]); ?>"/><br/></li><!-- <li><label >购买类型</label><input type="text" name='buytype' value="<?php echo ($data["buytype"]); ?>"/><br/></li> --><li ><label>购买类型</label><select  name='buytype'  value="<?php echo ($data["buytype"]); ?>" ><?php	 $ss=array('新增','替换'); $length=count($ss); for ($i=0;$i<$length;$i++){ if ($ss[$i] == $data['buytype'] ) { echo "<option value=".$ss[$i]. " selected='selected'".">".$ss[$i]."</option>"; } else echo "<option value=".$ss[$i]. ">".$ss[$i]."</option>"; } ?></select></li><li><label >数量</label><input type="text" name='num' value="<?php echo ($data["num"]); ?>"/><br/></li><li><label >备注</label><input type="text" name='remark' value="<?php echo ($data["remark"]); ?>"/><br/></li><li><label >用途</label><input type="text" name='usefor' value="<?php echo ($data["usefor"]); ?>"/><br/></li><li><label >保修年限</label><input type="text" name='baoxiuyear' value="<?php echo ($data["baoxiuyear"]); ?>"/><br/></li><li><label >第1次续保时长</label><input type="text" name='xubaoa' value="<?php echo ($data["xubaoa"]); ?>"/><br/></li><li><label >第1次续保价格</label><input type="text" name='xubaoaprice' value="<?php echo ($data["xubaoaprice"]); ?>"/><br/></li><li><label >第2次续保时长</label><input type="text" name='xubaob' value="<?php echo ($data["xubaob"]); ?>"/><br/></li><li><label >第2次续保价格</label><input type="text" name='xubaobprice' value="<?php echo ($data["xubaobprice"]); ?>"/><br/></li><li><label >第3次续保时长</label><input type="text" name='xubaoc' value="<?php echo ($data["xubaoc"]); ?>"/><br/></li><li><label >第3次续保价格</label><input type="text" name='xubaocprice' value="<?php echo ($data["xubaocprice"]); ?>"/><br/></li><li><label >第4次续保时长</label><input type="text" name='xubaod' value="<?php echo ($data["xubaod"]); ?>"/><br/></li><li><label >第4次续保价格</label><input type="text" name='xubaodprice' value="<?php echo ($data["xubaodprice"]); ?>"/><br/></li><!-- 	</form><form action="__URL__/upload" enctype="multipart/form-data" method="post" ><?php echo ($data["signfile"]); ?>--><!-- <input type="text" name="name" /> --><li><label >上传签收单</label><input type="file"     name="photo"/><input type="submit" value="提交签收单"  width="80"></li></form><img src="__ROOT__/Public/signfile/<?php echo ($data["signfile"]); ?>" style="width: 595px; height: 842px; border: 0px none; margin-left: -3px;" /><!-- 	<center><button  id='submit' type="submit" class="btn btn-success">上传图片</button></center>  --></body><script src="__PUBLIC__/js/jquery.min.js"></script><script type="text/javascript" language="JavaScript">	//  function submit_form(){
	//   //javascript写法
	//  document.getElementById("employee").disabled=false;
	//  document.getElementById("submit").submit();
	//   //jQuery写法
	//  $("#employee").attr("disabled",false);
	//  $("#submit").submit();
	//  }

 // 	$(function() {
 //    	$('input[type="submit"]').click(function() {
 //        var data = $('__URL__/updateform1').serialize();
 //        console.log(data);
 //        return false;
 //    	});
	// });
 </script></html>