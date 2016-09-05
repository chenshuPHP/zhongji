<?php
    namespace Admin\Controller;
    use Think\Controller;

    /**
     * 商品品牌控制器
     */
    class BrandController extends BaseController
    {
        /**
         * 显示品牌列表
         */
        public function brandList()
        {

            $brandModel = D('Brand');
            $data = $brandModel -> search();
            $this -> assign('list',$data['list']);

            $this -> assign('show',$data['show']);
            $this -> display();
        }

        /**
         * 添加品牌
         */
        public function brandAdd()
        {
            if(IS_POST) {
                $brand = D('brand');
                if($brand -> create($_POST, 1)){
                    if($brand -> add()) {
                        $this -> success('添加成功',U('brandList'));
                        exit;
                    } else{
                        $this -> error('添加失败');
                    }
                } else
                    $this -> error($brand -> getError());
                exit;
            }
            $this -> display();
        }
        Public function brandDel($brand_id)
        {
            $brand = D('brand');
            if($brand -> delete($brand_id)) {
                $this -> success('删除成功',U('brandList'));
            } else {
                $this -> error('删除失败',U('brandList'));
            }
        }
        Public function brandUpdate($brand_id)
        {
            $brand = D('Brand');
            if(IS_POST)
            {
                if($aa = $brand -> create(I('post.'),2))
                {

                    if($brand -> save())
                    {
                        $this -> success('修改成功',U('brandList'));
                        exit;
                    } else{
                        $this -> error('修改失败');
                    }
                } else {
                    $this -> error($brand -> getError());
                }

            }
            $info = $brand -> find($brand_id);
            $this -> assign('info',$info);
            $this -> display();
        }
    }