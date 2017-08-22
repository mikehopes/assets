<?php if (!defined('THINK_PATH')) exit();?>﻿<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8"><title>用户可操作公司权限新增</title><link rel="stylesheet"    href="__PUBLIC__/css/bootstrap.min.css"><link rel="stylesheet" href="__ROOT__/style/admin/css/admin.css" /><script src="__PUBLIC__/js/jquery.min.js"></script><script>			function jump(){
                window.location="__URL__/index";  //跳转到本模块的index页面
			}
		</script></head><body><form action='__URL__/create' method='post'><table  class='table' ><tr><td colspan='2' class="th"><span class="span_SERVER"> &nbsp</span>用户可操作公司新增模块</td></tr><tr ><th>操作用户</th><td width="50px"><select  	name='cuser'><?php
 $m=M('loguser'); $f=M('usercontrol'); $ff=$f->select(); foreach ($ff as $ss) { $userlist.=','.$ss['cuser']; } $uuu=explode(",", $userlist); $condition['username'] = array('not in',$uuu); $a=$m->where($condition)->order('id')->select(); foreach ($a as $b){ if ($b['username']!="admin") { echo "<option value=".$b['username'].">".$b['username']."</option>"; }else {} } ?></select></td></tr><tr><th align="left">可操作公司</th><td>全选/取消全选  &nbsp;&nbsp;
				<input type="checkbox" onclick="swapCheck()" /></br></br><!-- 				<div style="height:30px;  padding-top:30px;"><div style=" float:left; width:33%; height:30px;"></div><div style=" float:left; width:33%; height:30px;"></div><div style=" float:left; width:34%; height:30px;"></div></div> --><?php
 $m=M('company'); $mm=$m->select(); $i=0; $strhh="<div style='height:30px;  padding-top:00px;'><div style='float:left; width:25%; height:30px;'>"; $strh="<div style='float:left; width:25%; height:30px;'>"; foreach ($mm as $b) { $i++; if (($i % 4) == 1) { echo $strhh ."<input  type='checkbox' name='company[]' value='".$b['comname']."'>"."&nbsp"."&nbsp".$b['comname']."</div>"; }elseif (($i % 4) != 0) { echo $strh ."<input  type='checkbox' name='company[]' value='".$b['comname']."'>"."&nbsp"."&nbsp".$b['comname']."</div>"; } else{ echo $strh."<input type='checkbox' name='company[]' value='".$b['comname']."'>"."&nbsp"."&nbsp".$b['comname']."</div>"."</div>"; } } ?></td></tr><tr><td colspan='4' align="center" ><input   class="btn btn-primary"  type="submit" value='保存新增用户可操作公司权限'/>  &nbsp 
				<button type="button" class="btn btn-default" onclick="jump()" >					返回</button></td></tr></table></form><script type="text/javascript">        //checkbox 全选/取消全选  
        var isCheckAll = false;  
        function swapCheck() {  
            if (isCheckAll) {  
                $("input[type='checkbox']").each(function() {  
                    this.checked = false;  
                });  
                isCheckAll = false;  
            } else {  
                $("input[type='checkbox']").each(function() {  
                    this.checked = true;  
                });  
                isCheckAll = true;  
            }  
        }  
    </script></body></html>