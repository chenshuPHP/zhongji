<?php
    namespace Admin\Model;
    use Think\Image;
    use Think\Image\Driver\Imagick;
    use Think\Model;
    use Think\Upload;

    /**
     * 商品模型
     */
    class GoodsModel extends Model
    {
//        protected $insertFields = array('goods_name', 'goods_price', 'is_sale', 'market_price', 'goods_desc');
        protected $updataFields = array('goods_id', 'goods_name', 'goods_price', 'is_sale', 'market_price', 'goods_desc');
        protected $_validate = array(
            array('goods_name', 'require', '没有输入商品名', 1),
            array('goods_price', 'require', '没有输入商品价格', 1),
            array('goods_price', 'currency', '商品价格要是货币模式如10.22',),
//            array('goods_price','1,10',''),
            array('market_price', 'currency', '货币模式'),

        );

        public function search($apiece = 3)
        {
            $where = array();
            //$map['字段1']  = array('表达式','查询条件1');
            //关键字
            $keyword = I('get.keyword');
            if ($keyword) {
                $where['a.goods_name'] = array('LIKE', "%$keyword%");
            }
            //价钱
            $small = I('get.small');
            $big = I('get.big');

            //是否上架
            $is_sale = I('get.is_sale');
            if ($is_sale == '0' || $is_sale == '1') {
                $where['a.is_sale'] = array('EQ', $is_sale);
            }
            //排序
            $orderBy = 'a.goods_price';
            $orderWay = I('ord') ? I('ord') : 'asc';


            $count = $this->alias('a')->where($where)->count();
            $page = new \Think\Page($count, $apiece);
            $page->setConfig('next', '下一页');
            $page->setConfig('prev', '上一页');
            $page->setConfig('theme', '总共%TOTAL_ROW%条记录,共有%TOTAL_PAGE%页,当前是%NOW_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
            $show = $page->show();
            $list =
                $this->field('a.*,b.brand_name')
                -> join('a right join shop_brand b on a.brand_id=b.brand_id')
                ->where($where)
//                ->order("$orderBy $orderWay")
                ->limit($page->firstRow . ',' . $page->listRows)
                ->select();
            return array(
                'show' => $show,
                'list' => $list
            );
        }

        public function _before_insert(&$data, $oprion)
        {
            $goods_sn = I('post.goods_sn');
            if(empty($goods_sn))
            {
                $data['goods_sn'] = 'sn_'.time().uniqid();
            }
            $data['add_time'] = time();

            if ($_FILES['goods_origin']['error'] == '0') {

                $info = addImage('goods_origin','goods/',array('img_' => array(30,40),'sm_'=>array(90,50)));
                if($info['info'] ) {

                    $data['goods_origin']=$info['img'][0];
                    $data['goods_img']=$info['img'][1];
                    $data['goods_thumb']=$info['img'][2];
                } else {
                    $this -> error = $info['error'];
                    return false;
                }


            }
        }

        /**
         * 在删除数据之前删除图片
         * @param $option
         */
        public function _before_delete($option)
        {
            //******删除商品的图片*******
           $imgPath = $this -> field('goods_img,sm_img') -> find($option['where']['goods_id']);
            $img_config = C('IMAGE_CONFIG');

            unlink($img_config['rootPath'].$imgPath['goods_img']);
            unlink($img_config['rootPath'].$imgPath['sm_img']);

        }
        /**
         * 在修改数据的之前上传新的图片, 在删除原有的图片
         */
        Public function _before_update(&$data, $options)
        {

            if($_FILES['goods_img']['error'] == 0)
            {
                //获取商品路径配置文件
                $imgCon = C('IMAGE_CONFIG');
                $imgCon['savePath'] = 'Goods/';
                $upImg = new \Think\Upload($imgCon);
                $info = $upImg -> upload();
                if (!$info)
                {

                } else{
                    //制作缩略图
                    //获取图片路径
                    $imgPath = './Public/Uploads/'.$info['goods_img']['savepath'].$info['goods_img']['savename'];

                    $smImg = new  \Think\Image();

                    $smImg -> open($imgPath);

                    $smPath = $imgCon['rootPath'].$info['goods_img']['savepath'].'sm_'.$info['goods_img']['savename'];
                    if($smImg -> thumb(50,50) -> save($smPath))
                    {
                        $data['goods_img'] = $imgPath;
                        $data['sm_img']    = $smPath;
                        //删除原图
                        $yuanInfo = $this -> field('goods_img,sm_img') -> find($options['where']['goods_id']);
                        delImages($yuanInfo);
                    }

                }
            }

        }

        /**
         * @param $data
         * @param $options
         * @return bool|string
         */
        public function _after_insert($data, $options)
        {
            parent::_after_insert($data, $options); // TODO: Change the autogenerated stub
            $goods_attr = I('post.attr');
            $goods_attrM = M('goodsattr');
            $goods_id = $data['goods_id'];
            foreach($goods_attr as $k =>$v )
            {
                if(is_array($v))
                {
                    foreach($v as $kry => $value)
                    {
                        $goods_attrM -> attr_value = $value;
                        $goods_attrM -> goods_id =$goods_id;
                        $goods_attrM -> attr_id =$k;
                        if($goods_attrM -> add())
                        {

                        } else {
                            return  '失败';
                            $this -> error = $error;
                        }

                    }
                } else {
                    $goods_attrM -> goods_id = $goods_id;
                    $goods_attrM ->attr_id= $k;
                    $goods_attrM -> attr_value = $v;
                    if($goods_attrM -> add())
                    {
                        return true;
                    } else {
                        return  '失败';
                        $this -> error = $error;
                    }
                }
            }
            if(isPhoto($_FILES['photo'])) {

               $info =  uloadPhoto('goodsPhoto','photo',$arr=array(array(150,150)));

                if($info['status']) {
                    foreach($info['imgP'] as $v)
                    {
                        M('album') -> add(array(
                            'goods_id'     => $goods_id,
                            'album_ori'    => $v[0],
                            'album_thumb'  => $v[1]

                        ));
                    }
            } else {
               $this -> error = $info['error'];

            }
            }
        }

    }