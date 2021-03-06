<?php
return array(
	//'配置项'=>'配置值'

    "LOAD_EXT_FILE"=>"image",   //自定义函数库
    'URL_HTML_SUFFIX'=>'html',  //伪静态后缀
    'IMAGE_CONFIG'=>array(
        'maxSize'   =>     3145728 ,// 设置附件上传大小
        'exts'      =>     array('jpg', 'gif', 'png', 'jpeg'),// 设置附件上传类型
        'rootPath'  => './Public/Uploads/',  //不能自动生成,必须手动创建
        'htmlPath'  => '/Public/Uploads/'  //用于图片显示的路径

    ),


        //'配置项'=>'配置值'
////数据库配置信息
        'DB_TYPE'   => 'mysql', // 数据库类型
        'DB_HOST'   => 'localhost', // 服务器地址
        'DB_NAME'   => 'shop', // 数据库名
        'DB_USER'   => 'root', // 用户名
        'DB_PWD'    => '', // 密码
        'DB_PORT'   => 3306, // 端口
        'DB_PREFIX' => 'shop_', // 数据库表前缀
        'DB_CHARSET'=> 'utf8', // 字符集
        'DEFAULT_FILTER'        =>  'clearXSS'

);