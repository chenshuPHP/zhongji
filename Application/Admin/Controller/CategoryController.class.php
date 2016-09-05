<?php
    namespace Admin\Controller;
    use Think\Controller;

    /**
     * 栏目控制器
     */
    class CategoryController extends BaseController
    {
        /**
         * 显示栏目列表
         */
        Public function lst()
        {
            $catModel = D('Category');
            $list = $catModel -> getTree();
            $this -> assign('list',$list);
            $this -> display();
        }
        /**
         * 添加分类
         */
        Public function add()
        {
            $catModel = D('Category');
            if(IS_POST)
            {
                if($catModel -> create(I('post.'),1))
                {
                    if($catModel -> add())
                    {
                       $this -> success('添加成功',U('lst'));
                        exit;
                    } else {
                        $this -> error('添加失败');
                    }
                } else {
                    $this -> error($catModel -> getError());
                }
            }
            $list = $catModel -> getTree();
            $this -> assign('list',$list);
            $this -> display();
        }
        /**
         * 修改分类
         */
        Public function update($cat_id)
        {

            $cat = D('Category');
            if(IS_POST) {
                if($aa = $cat ->create())
                {
                    if ($cat->save()) {
                        $this->success('修改成功', U('lst'));
                        exit;
                    } else {
                        $this->error('修改失败');
                    }
                } else{
                    $this -> error($cat -> getError());
                }
            }

            $info = $cat -> find(I('cat_id'));
            $list =  $cat -> getTree();
            $childid = $cat -> getChild(I('cat_id'));
            $this -> assign('info',$info);
            $this -> assign('childid',$childid);
            $this -> assign('list',$list);
            $this -> display();
        }
        /**
         * 删除类
         */
        public function delete($cat_id)
        {
            $cat = D('Category');
            $childid = $cat -> getChild(I('cat_id'));
            if(is_array($cat_id,$childid))
            {
                if(D('category') -> delete($cat_id))
                {
                    $this -> success('删除成功',U('lst'));
                } else{
                    $this-> error('删除失败',U('lst'));
                }
            } else {
                $this -> error('只能删除叶子节点',U('lst'));
            }
        }
    }