<?php
define('WEB_PATH','http://admin.shop.com/');
return array(
	//'配置项'=>'配置值'
    'TMPL_PARSE_STRING' => array(
        '__CSS__' => WEB_PATH.'Public/Admin/css',
        '__IMG__' => WEB_PATH.'Public/Admin/img',
        '__JS__' => WEB_PATH.'Public/Admin/js',
        '__LAYER__' => WEB_PATH.'Public/Admin/layer/layer.js',
        '__UPLOADIFY__' => WEB_PATH.'Public/Admin/uploadify',
    )

);