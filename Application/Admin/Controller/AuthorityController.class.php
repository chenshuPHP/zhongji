<?php
    namespace Admin\Controller;
    /**
     * 权限管理控制器
     */
    class AuthorityController extends BaseController{
        /**
         * 显示权限列表
         */
        Public function lst() {
            $auth_list = getTree('authority','auth_id');

            $this -> assign(array(
                'auth_list' => $auth_list
            ));
            $this -> display();
        }
        /**
         * 添加权限
         */
        Public function add()
        {
            $authM = D('Authority');
            if(IS_POST) {
                if($authM -> create()) {
                    if($authM -> add()) {
                        $this -> success('添加成功',U('lst'));exit;
                    }  else {
                        $this -> error('添加失败');
                    }
                } else{
                    $this -> error($authM -> getError());
                }
            }
            $authList = getTree('authority','auth_id');

            $this -> assign(array(
                'authList' => $authList
            ));
            $this -> display();
        }
    }