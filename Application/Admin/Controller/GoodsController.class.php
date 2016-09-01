<?php
    namespace Admin\Controller;
    use Think\Controller;

    /**
     * 商品控制器
     */
    class GoodsController extends Controller
    {
        /**
         * 显示商品列表
         */
        public function lst()
        {
            $goodsModel = D('goods');
            $data = $goodsModel -> search();

            $this -> assign(array(
                  'list'         => $data['list'],
                  'show'         => $data['show'],
                'right_btn'=>  '商品列表',
                'right_link'=>  'add',
                'left_btn'   =>'商品添加'
            ));


            $this -> display();
        }

        /**
         * 添加商品
         */
        Public function add()
        {

            if(IS_POST)
            {
                $model = D('goods');

                if($model -> create(I('post.'),1))
                {
                    $goods_sn = I('post.goods_sn');
                    if(empty($goods_sn))
                    {
                        $model -> goods_sn = 'sn_'.time().uniqid();
                    }
                    $model -> add_time = time();

                    if( $model->add())
                    {

                        $this -> success('添加成功',U('lst'));
                    }
                } else
                    $this -> error($model->getError());
                exit;
            }


            $type_list = D('attrtype') -> select();
            $cat_list = getTree('Category');
            $brand_list = D('Brand') -> select();

            $this->assign(array(

            ));
            $this -> assign(array(
                'right_btn'=>'商品列表',
                'right_link'=>'lst',
                'left_btn'   =>'商品添加',
                 'cat_list'   => $cat_list,
                'type_list'  => $type_list,
                'brand_list'=> $brand_list
            ));
            $this -> display();
        }
        /**
         * 修改商品信息
         */
        Public function update()
        {
            $goodsModel = D('goods');
            if(IS_POST)
            {
                if( $goodsModel -> create(I('post.'),2) )
                {
                    $goodsModel->goods_desc=clearXSS($_POST['goods_desc']);

                    if($goodsModel -> save())
                    {
                        $this -> success('修改成功',U('lst'));

                    } else {
                        $this -> error('修改失败');
                    }
                    exit;
                }
                    $this -> error($goodsModel -> getError());
                    exit;
            }
            $goodsId = I('get.goods_id');

            if($goodsId)
            {
                //获取该商品的信息
                $data = $goodsModel->find($goodsId);
            }
            $this -> assign('info',$data);
            $this -> display();
        }
        /**
         * 删除商品
         */
        Public function goodsDel($goods_id)
        {
            if(D('goods') -> delete($goods_id))
            {
                $this -> success('删除成功',U('lst'));
            } else
                $this -> success('删除失败',U('lst'));
        }
        public function showattr()
        {
            $where['type_id'] = I('get.type_id');
            $list = D('Attribute') -> where($where)-> select();

            $this -> assign('attr_list',$list);
            $this -> display();
        }

    }