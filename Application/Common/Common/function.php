<?php

//自定义过滤XXS攻击函数
function clearXSS($data)
{
    require_once '/htmlpurifier/HTMLPurifier.auto.php';
    // 生成默认的配置
    $_clean_xss_config = HTMLPurifier_Config::createDefault();
    $_clean_xss_config->set('Core.Encoding', 'UTF-8');
    // 设置允许出现的标签
    $_clean_xss_config->set('HTML.Allowed', 'div,b,strong,i,em,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]');
    // 设置允许出现的css样式
    $_clean_xss_config->set('CSS.AllowedProperties', 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align');
    // 设置a标签上可以使用target属性
    $_clean_xss_config->set('HTML.TargetBlank', TRUE);
    // 根据配置生成对象
    $_clean_xss_obj = new HTMLPurifier($_clean_xss_config);
    // 过滤数据
    return $_clean_xss_obj->purify($data);
}
function delImages($path)
{
    foreach (path as $pa) {
        unlink($pa);
    }
}
    /**
     * @param $parent_id  父级id
     * @return array      树形结构数组
     */
     function getTree($table) {
        $arr = M($table) -> select();

        return createTree($arr,$parent_id=0,$deel=0);
    }
    /**
     * @param $arr          数组
     * @param $parent_id    父级id
     * @param $deel         深度
     * @return array        树形数组
     */
     function createTree($arr,$parent_id,$deel)
    {
        static $tree = array();

        foreach($arr as $value)
        {
            if($value['parent_id'] == $parent_id  )
            {
                $value['deel'] = $deel;
                $tree[] = $value;
                createTree($arr,$value['cat_id'],$deel+1);
            }
        }

        return $tree;
    }

    /**
     * 获取子集
     * @param $cat_id 父级id
     */
     function getChild($table,$cat_id)
    {

        $arr = M($table)-> select();
        return lookup($arr,$cat_id);
    }
     function lookup($arr,$parent_id)
    {
        static $childs = array();
        foreach($arr as $rows)
        {
            if($rows['parent_id'] == $parent_id)
            {
                $childs[] = $rows['cat_id'];
                lookup($arr , $rows['cat_id']);
            }
        }
        $childs[] = $parent_id;
        return $childs;
    }
//定义一个单文件上传的函数，
//函数的返回值，是上传文件后存储上传文件的路径。
//需要一个参数，来指定，是否生成缩略图，指定生成几张缩略图，指定缩略图的大小
//需要一个参数，指定上传的路径，保存的位置
//需要一个参数，上传文件域的名称
//参数1：上传文件域的名称
//参数2：指定上传的位置
//参数3：是否生成缩略图，使用数组的方式来传递
/*array(
    array('230','230'),
    array('100','100')
)*/

    function addImage($Name,$fleName,$size=array())
    {

        //****上传图片****
        $config = C('IMAGE_CONFIG');
        $rootPath = $config['rootPath'];
        $config['savePath'] = $fleName;
        $brandImg = new \Think\Upload($config);
        $info = $brandImg -> upload();
        if($info)
        {
            //******制作缩略图*******

            $logoPath = $info[$Name]['savepath'] . $info[$Name]['savename'];
            $pathInfo[] = $logoPath;
            if($size) {

                $sm_logo = new \Think\Image();
                $sm_logo -> open($rootPath.$logoPath);
                foreach($size as $k => $v)
                {
                    $smPath =  $info[$Name]['savepath']. $k  . $info[$Name]['savename'];
                    $pathInfo[] = $sm_logo -> thumb($v[0],$v[1]) -> save($rootPath.$smPath);
                }

            }
            return array(
                'info'=>1,
                'img'=>$pathInfo
            );
        } else {
            return array(
                'info'=>0,
                'error'=>$brandImg -> getError()
            );
        }
    }

        /**\
         * print_r 打印数据
         * @param $data  需要打印的数据
         */
        function p($data)
        {
            echo '<pre>';
            print_r($data);
            exit;
        }
        /**
         * 判断是否上传了相册
         * @return boolean true|flase
         */
        function isPhoto($data)
        {
            foreach($data as $rows)
            {
                if($rows['error'] == 0) {
                    return true;
                }
            }
            return false;
        }
