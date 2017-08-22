<?php


   //1. 确定后台管理应用名称Admin
   define('APP_NAME','Admin');
   
   //2.确定应用路径
   define('APP_PATH','./Admin/');

   //3 开启调试模式,不在runtime目录缓存
   define('APP_DEBUG',true);

   //4.应用核心文件
   require './ThinkPHP/ThinkPHP.php';



?>