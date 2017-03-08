<?php
return array(
	'DB_CONf'=>array(
		'db_type'  => 'mysql',
		'db_user'  => 'root',
		'db_pwd'   => '123456',
		'db_host'  => '127.0.0.1',
		'db_port'  => '3306',
		'db_name'  => 'test',
 ),
    'TMPL_ENGINE_TYPE'      =>  'Smarty',     // 默认模板引擎 以下设置仅对使用Think模板引擎有效
    'TMPL_L_DELIM'          =>  '{',        // 模板引擎普通标签开始标记
    'TMPL_R_DELIM'          =>  '}',          // 模板引擎普通标签结束标记
	
    'URL_ROUTER_ON'   => true, 
    'URL_MAP_RULES'=>array(
        'index' => 'index.php/index/index/index',
    ),
	'URL_MODEL'=>2,
);