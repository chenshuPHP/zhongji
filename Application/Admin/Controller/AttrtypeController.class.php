<?php
    namespace Admin\Controller;
    use Think\Controller;

    /**
     * 商品类别控制器
     */
    class AttrtypeController extends BaseController
    {
        /**
         * 显示商品类型
         */
       public function attrtypeList(){
           $list = D('Attrtype') -> select();

           $this -> assign('list',$list);
           $this -> display();
       }
        /**
         * 添加商品类型
         */
        Public function attrtypeAdd() {
            if(IS_POST) {
                $category = D('Attrtype');
                if ($category -> create()) {
                    if($category -> add(I('post.'))){
                        $this -> success('添加成功',U('attrtypeList'));exit;
                    }
                }
                $this -> error($category -> getError());
                exit;
            }
            $this -> display();
        }
        public function attrtypeEdit($type_id) {
            $category = D('Attrtype');
            if(IS_POST) {

                if ( $data = $category -> create()) {

                    if($category -> save()){
                        $this -> success('修改成功',U('attrtypeList'));
                        exit;
                    } else {
                        $this -> error('没有修改');
                    }
                } else {
                    $this -> error($category -> getError());

                }

            }
            $info = $category -> find($type_id);

            $this -> assign('info',$info);
            $this -> display();
        }
        public function attrtypeDelete() {
            $id = I('get.type_id');
            if(M('Attrtype') -> delete($id)) {
                $this -> success('成功',U('attrtypeList'));
            }
            else{
                $this -> error('失败',U('attrtypeList'));
            }
        }
    }