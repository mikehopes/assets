<?php
return array(
	//'配置项'=>'配置值'
    'URL_PATHINFO_DEPR' =>  '/'   ,   //修改URL的分割符
    
    'TMPL_L_DELIM'  =>  '<{'    ,     //设置左界符
    'TMPL_R_DELIM'  =>  '}>'     ,    //设置右界符

    'DB_TYPE'  =>  'sqlsrv'      ,    //设置数据库类型
    'DB_HOST'  =>  '10.250.88.88'  , //设置主机
    'DB_NAME'  =>  'asset'   ,        //设置数据库名
    'DB_USER'  =>  'sa'       ,       //设置用户名
    'DB_PWD'   =>  '1111' ,    //设置密码
    'DB_PORT'  =>  '1433'       ,     //设置端口号
    'DB_PREFIX'  =>  ''      ,        //设置自动添加表前缀 M方法中
    'DB_SQL_LOG'  =>    true,         // 记录SQL信息
   
     'SHOW_PAGE_TRACE'  => false,    //开启页面Trace  调试用  修改后再删除 Runtime文件夹
    
     
     
     //  'DB_DSN'=>'mysql://root:@localhost:3306/thinkphp',//使用DSN方式配置数据库信息
   

   	'TMPL_TEMPLATE_SUFFIX'=>'.html',//更改模板文件后缀名
	//'TMPL_FILE_DEPR'=>'_',//修改模板文件目录层次
	//'DEFAULT_THEME'=>'my',//设置默认模板主题
	//'TMPL_DETECT_THEME'=>true,//自动侦测模板主题
	//'THEME_LIST'=>'your,my',//支持的模板主题列表
    	'TMPL_PARSE_STRING'=>array(           //添加自己的模板变量规则
		'__CSS__'=>__ROOT__.'/Public/Css',
		'__JS__'=>__ROOT__.'/Public/Js',

        
	),


); 
?>