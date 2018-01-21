<?php if (!defined('THINK_PATH')) exit();?><!-- <!DOCTYPE html> --><html><head><meta http-equiv="content-type" content="text/html; charset=utf-8"><title>IT资产管理主界面</title><link rel="stylesheet"   href="__PUBLIC__/css/bootstrap.min.css"><style type="text/css">		table{ font-size:10px;  border-collapse:collapse;width: 100%;word-break: break-all; word-wrap: break-word;       }
		table th {
            border-width: 1px;
            padding: 1px;
            text-align: center; 
            vertical-align: middle;
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
		  background-color: #9966CC;  //紫色 
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
	 </style><script>			function jumpadd(){
				window.location="__URL__/add";
			}
       		function jumpreport(){ 
      		 window.location="__URL__/report";
   			}
   			function jumpindex(){ 
      		 window.location="__URL__/index";
   			}
  		</script></head><body><table><tr><td style="width:33%"><div   style = "text-align:left;"><button class="btn btn-success" type='submit' onclick="window.open('http://58.39.144.86:9090/asset'		  )"> 跳转至 IT资产报表
					</button></div></td><td  style="width:33%" ><form    action="__URL__/add" method='post'><div   style = "text-align:left;"><!-- 下面1行调取模块权限表的funcreate的权限设置 --><?php  if( $userfun['funcreate'] == '1' ) {?><button  class="btn btn-success" type='submit'>					 添加IT资产
					</button><?php  }?><!-- 上面1行结束模块权限表的funcreate的权限设置 --></div></form></td><td style="width:32%"><form    action="__APP__/password/index" method='post'><div  style = "text-align:right;" ><button  class="btn btn-success" type='submit' >  	修改密码 </button></div></form></td><td style="width:32%"><form    action="__URL__/logout" method='post'><div  style = "text-align:right;" ><button  class="btn btn-success" type='submit' ><?php echo $_SESSION['username']; ?>	退出登录 </button></div></form></td></tr></table><form  style = "align:left;"      action="__URL__/index"  method='post'>			公司 
			<!-- <input type='text' name="cxcompany"></input> --><select   name='cxcompany'  style="width:100px;"><?php
 $m=M('company'); $u=M('usercontrol'); $map['cuser']=$_SESSION['username']; $uu=$u->where($map)->getField('company'); $uuu=explode(",", $uu); $condition['comname'] = array('in',$uuu); $a=$m->where($condition)->select(); echo "<option value="."".">"."-默认全选-"."</option>"; foreach ($a as $b){ echo "<option value=".$b['comname'].">".$b['comname']."</option>"; } ?></select>		部门 
		<select  name='cxdept' style="width:120px;"><?php
 $m=M('dept'); $a=$m->order('deptid')->select(); echo "<option value="."".">"."-默认全选-"."</option>"; foreach ($a as $b){ echo "<option value=".$b['deptsname'].">".$b['deptsname']."</option>"; } ?></select>	     硬件类型
	     <select  name='cxhardtype' style="width:100px;"><?php
 $m=M('hardtype'); $a=$m->order('hardid')->select(); echo "<option value="."".">"."-默认全选-"."</option>"; foreach ($a as $b){ echo "<option value=".$b['hardtype'].">".$b['hardtype']."</option>"; } ?></select>			 &nbsp&nbsp用户 <input type='text' name="cxuser" style="width:100px;"></input>			 资产编号 <input type='text' name="cxfixassettag" style="width:100px;"></input>			 使用状态
			 <select  name='cxusestate' style="width:120px;"><option value="">-不选"已报废"-</option> ;
					<option    value="在用">在用</option><option    value="超期使用">超期使用</option><option    value="闲置">闲置</option><option    value="已坏">已坏</option><option    value="待报废">待报废</option><option    value="已坏待报废">已坏待报废</option><option    value="已报废">已报废</option><option    value="意外丢失">意外丢失</option></select><button   type='submit'>数据检索</button></form><!-- <table  width="100%"  border="1" cellspacing="0" cellpadding="0" align='center'>  --><table  class="altrowstable  table-hover table-condensed" id="alternatecolor" ><tr ><!-- <th>ID</th> --><th width="50">公司</th><th width="30">部门</th><th>使用人</th><th>硬件类型</th><th align="center">资产编号</th><th width="30">使用状态</th><th>Brand/Model</th><th  align="center">硬件序列号</th><th width="30">到货日期（年）</th><th width="30">到货日期（月）</th><th width="30">到货日期（日）</th><th width="30">使用年限</th><!-- <th>显示器类型</th> --><th>设备所在地</th><th>OS</th><!-- <th>OSSN</th> --><th>Office</th><!-- <th>OfficeSN</th> --><!-- <th>old tag</th> --><th width="30">购买类型</th><th width="20">数量</th><th width="40">备注</th><th  >完整信息</th><th width="30">保修年限</th><!-- 				<th width="20">第1次续保时长</th><th width="20">第1次续保价格</th><th width="20">第2次续保时长</th><th width="20">第2次续保价格</th><th width="20">第3次续保时长</th><th width="20">第3次续保价格</th><th width="20">第4次续保时长</th><th width="20">第4次续保价格</th> --><th align="left"  width="20">操作</th></tr><?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><!-- <td><?php echo ($vo["id"]); ?></td> --><td width="55"><?php echo ($vo["company"]); ?></td><td width="70"><?php echo ($vo["dept"]); ?></td><td width="50"><?php echo ($vo["employee"]); ?></td><td width="55"><?php echo ($vo["hardtype"]); ?></td><td width="85"><?php echo ($vo["fixassettag"]); ?></td><td width="30"><?php echo ($vo["usestate"]); ?></td><td width="100  align="middle"><?php echo ($vo["brand"]); ?></td><td width="150" align="middle" ><?php echo ($vo["SN"]); ?></td><td width="40"><?php echo ($vo["buyyear"]); ?></td><td align="right"><?php echo ($vo["buymonth"]); ?></td><td align="right"  ><?php echo ($vo["buyday"]); ?></td><td align="center"><?php echo ($vo["useyear"]); ?></td><!-- <td><?php echo ($vo["LCDtype"]); ?></td> --><td width="80"><?php echo ($vo["locate"]); ?></td><td align="center"  width="53"><?php echo ($vo["OS"]); ?></td><!-- <td><?php echo ($vo["OSSN"]); ?></td> --><td width="70"><?php echo ($vo["office"]); ?></td><!-- <td><?php echo ($vo["officeSN"]); ?></td> --><!-- <td><?php echo ($vo["oldtag"]); ?></td> --><td width="25"><?php echo ($vo["buytype"]); ?></td><td align="center" ><?php echo ($vo["num"]); ?></td><td width="140"><?php echo ($vo["remark"]); ?></td><td width="80"><a href="__URL__/query/id/<?php echo ($vo["id"]); ?>"> 完整信息显示  </a></td><td align="center" ><?php echo ($vo["baoxiuyear"]); ?></td><!-- <td><?php echo ($vo["xubaoa"]); ?></td><td><?php echo ($vo["xubaoaprice"]); ?></td><td><?php echo ($vo["xubaob"]); ?></td><td><?php echo ($vo["xubaobprice"]); ?></td><td><?php echo ($vo["xubaoc"]); ?></td><td><?php echo ($vo["xubaocprice"]); ?></td><td><?php echo ($vo["xubaod"]); ?></td><td><?php echo ($vo["xubaodprice"]); ?></td>    --><td width="30"><!-- <a href="__URL__/del/id/<?php echo ($vo["id"]); ?>"   onclick="return confirm('删除后无法恢复,确定要删除吗')"> 删除</a> |  --><!--   下面为加了模块控制权限-删除 的语句    上面为未加模块控制权限的语句 --><?php  if( $userfun['fundelete'] == '1' ) {?><a href="__URL__/del/id/<?php echo ($vo["id"]); ?>"   onclick="return confirm('删除后无法恢复,确定要删除吗')"> 删除</a><br><?php  }?><!-- <a href="__URL__/modify/id/<?php echo ($vo["id"]); ?>">修改</a> --><!--   下面为加了模块控制权限-修改 的语句    上面为未加模块控制权限的语句 --><?php  if( $userfun['funmodify'] == '1' ) {?><a href="__URL__/modify/id/<?php echo ($vo["id"]); ?>"  > 修改   </a><br><?php  } if( $userfun['funtransfer'] == '1' ) {?><a href="__URL__/transfer/id/<?php echo ($vo["id"]); ?>"  > 转移   </a><?php  }?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></table><script src="__PUBLIC__/js/jquery.min.js"></script><script src="__PUBLIC__/js/bootstrap.min.js"></script><script type="text/javascript">function altRows(id){
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