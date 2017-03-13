<?php
return array(
	'DB_CONf'=>array(
		'db_type'  => 'mysql',
		'db_user'  => 'bdm253597331',
		'db_pwd'   => 'zcn290027',
		'db_host'  => 'bdm253597331.my3w.com',
		'db_port'  => '3306',
		'db_name'  => 'bdm253597331_db',
 ),
    'TMPL_ENGINE_TYPE'      =>  'Smarty',     // 默认模板引擎 以下设置仅对使用Think模板引擎有效
    'TMPL_L_DELIM'          =>  '{',        // 模板引擎普通标签开始标记
    'TMPL_R_DELIM'          =>  '}',          // 模板引擎普通标签结束标记
	
    'URL_ROUTER_ON'   => true, 
    'URL_MAP_RULES'=>array(
        'index' => 'index.php/index/index/index',
    ),
	'URL_MODEL'=>2,
	' access_token'=>'XRUJ3ImlffHbyUd71OADC0BTucTgF0Kynq6ZOnRAZ6qKzydoTnBlIEYFhACAVPW',
	'appid'=>'wx0503ec22870883c9',
	'appsecret'=> 'faf6778e6d6d7617ed27958f22acfaf5',
);