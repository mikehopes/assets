<?php if (!defined('THINK_PATH')) exit();?>﻿<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8"><title>Office管理模块</title><link rel="stylesheet"    href="__PUBLIC__/css/bootstrap.min.css"><link rel="stylesheet" href="__ROOT__/style/admin/css/admin.css" /><script>			function jump(){
                window.location="__URL__/add";    //跳转到本模块的add页面 
			}
		</script></head><body><table class='table'><tr><td colspan='2' class="th"><span class="span_SERVER"> &nbsp</span>Office管理模块</td></tr><tr><th>office</th><th>操作</th></tr><!--遍历数据--><?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vo["office"]); ?></td><td><a href="__URL__/del/id/<?php echo ($vo["id"]); ?>"    onclick="return confirm('删除后无法恢复,确定要删除吗')">删除</a> | <a href="__URL__/modify/id/<?php echo ($vo["id"]); ?>">修改</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></table><center><button class="btn btn-primary" onclick="jump()">新增office</button></center></body></html>