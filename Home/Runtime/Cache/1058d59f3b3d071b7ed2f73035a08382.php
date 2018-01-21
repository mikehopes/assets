<?php if (!defined('THINK_PATH')) exit();?>﻿<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8"><title>IT资产管理转移模块</title><link rel="stylesheet"   href="__PUBLIC__/css/bootstrap.min.css"><style>	table{ font-size:12px;  border-collapse:collapse;width: 600px;}
		table th {
            border-width: 1px;
            padding: 0px;
            border-style: solid;
            border-color: #666666;
            background-color: #dedede;
                 }
		table tr:hover  { background-color: #3399CC; }
		table tr.altrow { background-color:#EAF2D3; } 


		table.altrowstable {
		    font-family: verdana,arial,sans-serif;
		    font-size:11px;
		    color:#333333;
		    border-width: 1px;
		    border-color: #a9c6c9;
		    border-collapse: collapse;
		}
		table.altrowstable th {
		    border-width: 1px;
		    padding: 0px;
		    border-style: solid;
		    border-color: #a9c6c9;
		}
		table.altrowstable td {
		    border-width: 1px;
		    padding: 0px;
		    border-style: solid;
		    border-color: #a9c6c9;
		}
		.oddrowcolor{
		    background-color:#d4e3e5;
		}
		.evenrowcolor{
		    background-color:#c3dde0;
		}
		/*重写table-hover颜色*/
		.table-hover > tbody > tr:hover > td,
		.table-hover > tbody > tr:hover > th {
		  background-color: #9966CC;
		}
		/*重写bootstap .table-condensed > tbody > tr > td内边距*/
		.table-condensed > tbody > tr > td,	
		.table-condensed > tbody > tr > th   { padding:0px 0px; }
        ul.a {list-style-type:circle;}
        ul.b {list-style-type:square;}
        ol.c {list-style-type:upper-roman;}
        ol.d {list-style-type:lower-alpha;}
        li {float:left;margin-bottom:1px;margin-top:1px; align:left;  width:33%;}
        p.a { font-size:20px; background-color:#5bc0de; width:100%;text-align:center;}
        select { width:200px; height: 24px;}
        label { width:130px;}
        input { width:200px; height: 24px;}
        button.p {background-color: #337ab7;border-radius: 4px;margin:1px;padding:2px 5px;}
		button.i {background-color: #5bc0de;border-radius: 4px;margin:1px;padding:2px 5px;}
		button.s {background-color: #5cb85c;border-radius: 4px;margin:1px;padding:2px 5px;}
		button.w {background-color: #f0ad4e;border-radius: 4px;margin:1px;padding:2px 5px;}
		button.d {background-color: #d9534f;border-radius: 4px;margin:1px;padding:2px 5px;}
 		.div-a{ float:left;width:33%;}   
 		.div-m{ float:middle;width:33%;}   
   		.div-b{ float:right;width:33%;}  
		.div-25{ float:right;width:25%;text-align:left; } 
		.div-33{ float:right;width:33%;text-align:left; } 

		    /**/
        ul.a {list-style-type:circle;}
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
  		</script></head><body><div class="div-a"><button  class="i"  onclick="jumpindex()">返回IT资产管理主界面</button></div><form    action="__URL__/logout" method='post'><div  style = "text-align:right;"><button  type='submit' class="btn btn-success"><?php echo $_SESSION['username']; ?> 退出登录</button></div></form><p class="a"   style="text-align:center;"><b>IT固定资产 转移 模块</b></p><form action="__URL__/transfersave" method='post'><input type='hidden' name='id' value="<?php echo ($data["id"]); ?>"/><!-- 			<input type='hidden' name='hardtype' value="<?php echo ($data["hardtype"]); ?>"/><input type='hidden' name='usestate' value="<?php echo ($data["usestate"]); ?>"/><input type='hidden' name='brand' value="<?php echo ($data["brand"]); ?>"/><input type='hidden' name='SN' value="<?php echo ($data["SN"]); ?>"/><input type='hidden' name='buyyear' value="<?php echo ($data["buyyear"]); ?>"/><input type='hidden' name='buymonth' value="<?php echo ($data["buymonth"]); ?>"/><input type='hidden' name='buyday' value="<?php echo ($data["buyday"]); ?>"/><input type='hidden' name='useyear' value="<?php echo ($data["useyear"]); ?>"/><input type='hidden' name='LCDtype' value="<?php echo ($data["LCDtype"]); ?>"/><input type='hidden' name='locate'' value="<?php echo ($data["locate"]); ?>"/><input type='hidden' name='OS' value="<?php echo ($data["OS"]); ?>"/><input type='hidden' name='office' value="<?php echo ($data["office"]); ?>"/><input type='hidden' name='oldtag' value="<?php echo ($data["oldtag"]); ?>"/><input type='hidden' name='buytype' value="<?php echo ($data["buytype"]); ?>"/><input type='hidden' name='num' value="<?php echo ($data["num"]); ?>"/><input type='hidden' name='remark' value="<?php echo ($data["remark"]); ?>"/><input type='hidden' name='usefor' value="<?php echo ($data["usefor"]); ?>"/><input type='hidden' name='baoxiuyear' value="<?php echo ($data["baoxiuyear"]); ?>"/><input type='hidden' name='xubaoa' value="<?php echo ($data["xubaoa"]); ?>"/><input type='hidden' name='xubaoaprice' value="<?php echo ($data["xubaoaprice"]); ?>"/><input type='hidden' name='xubaob' value="<?php echo ($data["xubaob"]); ?>"/><input type='hidden' name='xubaobprice' value="<?php echo ($data["xubaobprice"]); ?>"/><input type='hidden' name='xubaoc' value="<?php echo ($data["xubaoc"]); ?>"/><input type='hidden' name='xubaocprice' value="<?php echo ($data["xubaocprice"]); ?>"/><input type='hidden' name='xubaod' value="<?php echo ($data["xubaod"]); ?>"/><input type='hidden' name='xubaodprice' value="<?php echo ($data["xubaodprice"]); ?>"/> --><input type='hidden' name='olddept' value="<?php echo ($data["dept"]); ?>"/><input type='hidden' name='oldcompany' value="<?php echo ($data["company"]); ?>"/><ul class="b";margin:50px;><!-- <li><label >公司</label><input type='text' name='companya' value="<?php echo ($data["company"]); ?>">   --><li><label >公司</label><select name='newcompany'    value="<?php echo ($data["company"]); ?>"><?php
 $m=M('company'); $u=M('usercontrol'); $map['cuser']=$_SESSION['username']; $uu=$u->where($map)->getField('company'); $uuu=explode(",", $uu); $condition['comname'] = array('in',$uuu); $a=$m->where($condition)->select(); foreach ($a as $b){ if ($b['comname']== $data['company'] ) { echo "<option value=".$b['comname']." selected='selected'".">".$b['comname']."</option>"; } else echo "<option value=".$b['comname'].">".$b['comname']."</option>"; } ?></select></li><!-- 		<li><label >公司(*不可变更)</label><input type="text"  readonly="readonly" name='company' value="<				{$data.company}>"/><br/></li> --><li ><label>人员部门</label><select  name='newdept'     value="<?php echo ($data["dept"]); ?>"><?php
 $dept=M('dept'); $a=$dept->order(deptid)->select(); foreach ($a as $b){ if ($b['deptsname']== $data['dept'] ) { echo "<option value=".$b['deptsname']." selected='selected'".">".$b['deptsname']."</option>"; } else echo "<option value=".$b['deptsname'].">".$b['deptsname']."</option>"; } ?></select></li><li><label >资产编号</label><input type="text"  readonly="readonly" name='fixassettag' value="<?php echo ($data["fixassettag"]); ?>"/><br/></li><li><label >来自用户</label><input type="text"  readonly="readonly"  name='employee' value="<?php echo ($data["employee"]); ?>"/><br/></li><li><label >转移至新用户(*必填)</label><input type="text" name='transto' /><br/></li><li><label >转移日期(*必填 格式YYYY/MM/DD)</label><input type="text" name='transdate' /><br/></li><li><label >转移备注</label><input type="text" name='transremark' /><br/></li><center><button   type="submit" class="btn btn-success">提交转移记录</button></center></form><br><p  style='font-weight:bold;font-size:20px'>资产转移历史记录</p><table class="altrowstable  table-hover table-condensed" id="alternatecolor"><tr ><th>资产编号</th><th>原公司</th><th>原部门</th><th>原用户</th><th>新公司</th><th>新部门</th><th>新用户</th><th>转移日期</th><th>备注</th><th>操作用户</th></tr><?php if(is_array($datat)): $i = 0; $__LIST__ = $datat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vot): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vot["fixtag"]); ?></td><td><?php echo ($vot["oldcompany"]); ?></td><td><?php echo ($vot["olddept"]); ?></td><td><?php echo ($vot["transfrom"]); ?></td><td><?php echo ($vot["newcompany"]); ?></td><td><?php echo ($vot["newdept"]); ?></td><td><?php echo ($vot["transto"]); ?></td><td><?php echo ($vot["transdate"]); ?></td><td><?php echo ($vot["remark"]); ?></td><td><?php echo ($vot["operuser"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></table><script src="__PUBLIC__/js/jquery.min.js"></script><script src="__PUBLIC__/js/bootstrap.min.js"></script><script type="text/javascript">function altRows(id){
	// **********table隔行条纹的方法********
    if(document.getElementsByTagName){  
        
        var table = document.getElementById(id);  
        var rows = table.getElementsByTagName("tr"); 
        for(i = 0; i < rows.length; i++){          
            if(i % 2 == 0){ rows[i].className = "evenrowcolor";
            }else{ rows[i].className = "oddrowcolor";
            }      
        }
    }
}
window.onload=function(){
    altRows('alternatecolor');
}
</script></body></html>