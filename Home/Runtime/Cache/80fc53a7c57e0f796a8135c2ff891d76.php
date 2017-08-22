<?php if (!defined('THINK_PATH')) exit();?><html><head><meta http-equiv="content-type" content="text/html; charset=utf-8"><title>系统信息</title><link rel="stylesheet" href="__ROOT__/style/admin/css/admin.css" /><link rel="stylesheet"    href="__PUBLIC__/css/bootstrap.min.css"></head><body><table class="table"><tr><td colspan='2' class="th"><span class="span_people"> &nbsp</span>系统信息</td></tr><tr><td>登陆用户</td><td><?php echo $_SESSION['username']; ?></td></tr><tr><td>当前时间</td><!-- 			<td><?php echo date('y-m-d h:i:s') ?></td> --><td><?php  header("content-type:text/html;charset=gb2312"); date_default_timezone_set("PRC"); echo '<div id="time"></div><script type="text/javascript">				        var dayNames = new Array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");  
				            function get_obj(time){  
				                return document.getElementById(time);  
				            }  
				            var ts='.(round(microtime(true)*1000)).';  
				            function getTime(){  
				                var t=new Date(ts);  
				                with(t){  
				                    var _time=""+getFullYear()+"-" + (getMonth()+1)+"-"+getDate()+" " + (getHours()<10 ? "0" :"") + getHours() + ":" + (getMinutes()<10 ? "0" :"") + getMinutes() + ":" + (getSeconds()<10 ? "0" :"") + getSeconds() + " " + dayNames[t.getDay()];  
				                }  
				                get_obj("time").innerHTML=_time;  
				                setTimeout("getTime()",1000);  
				                ts+=1000;  
				            }  
				            getTime();  
				    </script>'; ?></td></tr><tr><td>客户端IP</td><td><?php  echo get_client_ip(); ?></td></tr><tr><td colspan='2' class="th"><span class="span_server" style="float:left">&nbsp</span>服务器信息</td></tr><tr><td>服务器环境</td><td><?php echo "thinkphp/".THINK_VERSION." ".apache_get_version(); ?></td></tr><tr><td>PHP版本</td><td><?php echo PHP_VERSION ?></td></tr><tr><td>服务器IP</td><td><?php echo $_SERVER["SERVER_ADDR"]; ?></td></tr><tr><td>数据库信息</td><!-- 	<td><?php echo "mysql" .mysql_get_server_info() ; ?></td>     --><td>MSSQL2008</td></tr><tr><td>ip地址位置</td><td><?php  echo "客户端IP ".$iparea['ip']." 属于".$iparea['country'].$iparea['area']; ?></td></tr></table></body></html>