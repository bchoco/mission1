<?php
return array(
	/* 模块设置 */
	'MODULE_ALLOW_LIST'      =>  array('Home','Admin','App'),
	'DEFAULT_MODULE'        =>  'Home',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index', // 默认操作名称
	/* 数据库设置 */
    'DB_TYPE'               =>  'sqlsrv',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'MS',    // 数据库名
    'DB_USER'               =>  'sa',      // 用户名
    'DB_PWD'                =>  '123',     // 密码
    'DB_PORT'               =>  '1433',      // 端口
    'DB_PREFIX'             =>  'ms_',		 // 数据库表前缀
    /* 文件后缀设置 */
    'URL_HTML_SUFFIX'       =>  '', // 设置文件后缀为空
    /* 路径设置 */
    'AD_CSS'                =>  '/Public/Admin/css',
    'AD_JS'                =>  '/Public/Admin/js',

);