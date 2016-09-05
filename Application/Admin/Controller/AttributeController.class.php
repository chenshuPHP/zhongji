<?php
    namespace Admin\Controller;
    use Think\Controller;

    /**
     * 商品属性表
     */
    class AttributeController extends BaseController
    {
        /**
         * 显示商品列表
         */
        Public function attrList($type_id='')
        {

            $attribute = D('attribute');
            $list = $attribute -> show($type_id);
            $type_list = M('attrtype') -> select();
            $this -> assign('type_list',$type_list);
            $this -> assign('attr_list',$list);
            $this -> display();
        }
        /**
         * 添加商品属性
         */
        Public function attrAdd()
        {

            if(IS_POST)
            {
                $attrModel = D('Attribute');
                if($attrModel -> create())
                {
                    if($attrModel -> add())
                    {
                        $this -> success('添加成功',U('attrList'));
                    }
                    exit;
                } else {
                    $this -> error($attrModel -> getError());
                }
            }
            $type_list = M('attrtype') -> select();

            $this -> assign('type_list',$type_list);
            $this -> display();
        }
        /**
         * 修改商品属性
         */
        Public function attrEdit($attr_id)
        {
            if(IS_POST) {
                $attr_model = D('attribute');
                if($attr_model -> create()) {
                    if($attr_model -> save()){
                        $this -> success('成功',U('attrList'));
                        exit;
                    } else {
                        $this -> error('失败');
                    }
                } else{
                    $this -> error($attr_model -> getError());
                }
            }
            $info = D('attribute') -> find($attr_id);
            $type_list = M('attrtype') -> select();
            $this -> assign('type_list',$type_list);
            $this -> assign('info',$info);
            $this -> display();
        }
        /**
         * 删除商品属性
         */
        Public function attrDelete($attr_id)
        {
            if(D('attribute') -> delete($attr_id))
            {
                $this -> success('删除成功');
            } else {
                $rhis -> error('删除失败');
            }
        }
    }