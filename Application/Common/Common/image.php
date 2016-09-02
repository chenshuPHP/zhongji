<?php
/**
 * 上传相册
 * @param $saveP      保存文件名
 * @param $fileName   文件域名称
 * @param array $size 缩略图尺寸
 */
function uloadPhoto($saveP,$fileName,$size=array())
    {

        $config = C('IMAGE_CONFIG');
        $config['savePath'] = $saveP.'/';

        $photo = new \Think\Upload($config);
        $info = $photo -> upload(array("$fileName "=> $_FILES[$fileName]));


        if($info) {
            $arr = array();
            $root = $config['rootPath'];
            foreach($info as $rows)
            {
                //原图路径
                $imgPath = $root.$rows['savepath'].$rows['savename'];
                $imageI = array();
                //缩略图保存路径
                $imageI[] = $imgPath;
                if($size) {
                    $img = new \Think\Image();
                    //打开原图
                    $img->open($imgPath);
                    foreach ($size as $k => $v) {
                        $smallImg = $root . $rows['savepath'] . $k . $rows['savename'];
                        //按原来的比例生成一个缩略图
                        $img->thumb($v[0], $v[1])->save($smallImg);
                        $imageI[] = $smallImg;
                    }

                }

                $arr = $imageI;
            }
            return array(
                'status' => 1,
                'imgP'   => $arr
            ) ;
        } else {
            return array(
               'status' => 0 ,
                'error' => $photo -> getError()
            );
        }
    }