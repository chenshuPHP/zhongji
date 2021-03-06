<?php
    namespace Admin\Model;
    use Think\Image;
    use Think\Model;
    use Think\Upload;

    /**
     * 品牌模型
     */
    class BrandModel extends Model
    {
        protected $insertFields = array('brand_name','brand_logo','site_url','brand_desc','is_show','sort_order');
        protected $updateFields = array('brand_id','brand_name','brand_logo','site_url','brand_desc','is_show','sort_order');
        //自动验证
        protected $_validata = array(
            array('brand_name','require','没有输入品牌名',1),
            array('site_url','url','网址输入有误'),
            array('sort_order','number','排序要是数字'),
            array('is_show',array(0,1),'是否显示输入有误')
        );
        public function search($apiece=3)
        {
            $where = array();

            $brand = I('post.brand_name');
            if($brand)
            {
                $where['a.brand_name'] = array('LIKE',"%$brand%");
            }

            //****分页*******
            $count = $this -> alias('a') -> where($where) -> count();
            $page = new \Think\Page($count,$apiece);
            $page->setConfig('prev','上一页');
            $page -> setConfig('next','下一页');
            $page->setConfig('theme','总共%TOTAL_ROW%条记录,共有%TOTAL_PAGE%页,当前是%NOW_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
            $show = $page -> show();
            $list = $this -> alias('a') -> order('brand_name desc') -> where($where) -> select();

            return array(
                'show' => $show,
                'list' => $list
            );
        }

        /**
         * 添加品牌之前上传图片
         * @param $data 要插入数据库的数据
         * @param $options  插入信息
         * @return 图片保存的路径
         */
        function _before_insert(&$data, $options)
        {
            parent::_before_insert($data, $options); // TODO: Change the autogenerated stub
            if($_FILES['brand_logo']['error'] == '0')
            {
                //****上传图片****
                $config = C('IMAGE_CONFIG');
                $config['savePath'] = 'Brand/';
                $brandImg = new \Think\Upload($config);
                $info = $brandImg -> upload();
                if($info)
                {
                    //******制作缩略图*******
                    $logoPath = './Public/Uploads/'.$info['brand_logo']['savepath'] . $info['brand_logo']['savename'];

                    $sm_logo = new \Think\Image();
                    $sm_logo -> open($logoPath);
                    $smPath =  './Public/Uploads/'.$info['brand_logo']['savepath'].'sm_' . $info['brand_logo']['savename'];
                    $sm_logo -> thumb(30,30) -> save($smPath);
                    $data['brand_logo'] = $logoPath;
                    $data['sm_logo'] = $smPath;

                }
            }
        }

        /**
         * 删除商品的同时删除图片
         * @param $options  需要超做的信息
         */
        public function _before_delete($options)
        {
            parent::_before_delete($options); // TODO: Change the autogenerated stub
            $info = $this -> field('brand_logo,sm_logo') -> find($options['where']['brand_id']);
            unlink($info['brand_logo']);
            unlink($info['sm_logo']);
        }

        /**
         * 修改品牌信息时修改图片
         * @param $data 修改的新数据
         * @param $options  信息
         */
        public function _before_update(&$data, $options)
        {
            parent::_before_update($data, $options); // TODO: Change the autogenerated stub
            //****上传图片****
            $config = C('IMAGE_CONFIG');
            $config['savePath'] = 'Brand/';
            $brandImg = new \Think\Upload($config);
            $info = $brandImg -> upload();
            if($info)
            {
                //******制作缩略图*******
                $logoPath = './Public/Uploads/'.$info['brand_logo']['savepath'] . $info['brand_logo']['savename'];

                $sm_logo = new \Think\Image();
                $sm_logo -> open($logoPath);
                $smPath =  './Public/Uploads/'.$info['brand_logo']['savepath'].'sm_' . $info['brand_logo']['savename'];
                if ($sm_logo -> thumb(30,30) -> save($smPath)){
                    $data['brand_logo'] = $logoPath;
                    $data['sm_logo'] = $smPath;

                    $info = $this -> field('brand_logo,sm_logo') -> find($options['where']['brand_id']);
                    unlink($info['brand_logo']);
                    unlink($info['sm_logo']);
                }


            }
        }
    }

