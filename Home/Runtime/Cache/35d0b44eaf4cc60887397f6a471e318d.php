<?php if (!defined('THINK_PATH')) exit();?><html><head><meta http-equiv="content-type" content="text/html; charset=utf-8"><title>IT资产管理密码修改</title><link rel="stylesheet"    href="__PUBLIC__/css/bootstrap.min.css"><link rel="stylesheet" href="__ROOT__/style/admin/css/admin.css" /><style type="text/css">		table{ font-size:20px;  border-collapse:collapse;width:600px;word-break: break-all; word-wrap: break-word;       }
		.div-a{ float:left;width:33%;}  
		</style><script>			function jump(){ 
                window.location="__URL__/add";
			}
			function jumpindex(){ 
      		window.location="__APP__/gdzc/index";
   			}
		</script></head><body><table class="table"><tr><td colspan='2' class="th"><span class="span_SERVER"> &nbsp</span>用户密码修改模块</td></tr><!--写表头--><tr><!-- <th>id</th> --><th>账号</th><th>操作</th></tr><!--遍历数据--><?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><!-- <td><?php echo ($vo["id"]); ?></td> --><td><?php echo ($vo["username"]); ?></td><td><a href="__URL__/passwordmodify/">修改密码 </a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></table></body></html>