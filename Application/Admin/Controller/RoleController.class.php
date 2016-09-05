<?php
    namespace Admin\Controller;
    /**
     * 角色控制器
     */
    class RoleController extends BaseController
    {
        /**
         * 角色列表
         */
        public function lst() {
            $authList = getTree('authority','aut_id');
            $this -> assign(array(
                'auth_list' => $authList
            ));
            $this -> display();
        }
        /**
         * 添加角色
         */
        Public function add()
        {
            $roleM = D('role');

            if(IS_POST) {
                if($roleM -> validate($rules) -> create()) {
                    if($roleM -> add()) {
                        $this -> success('添加成功',U('lst','html'));
                        exit;
                    } else {
                        $this -> error($roleM -> getError());
                    }
                } else {
                    $this -> error($roleM -> getError());
                }
            }
            $authList = getTree('authority','auth_id');
            $this -> assign(array(
                'auth_list' => $authList
            ));
            $this -> display();
        }
    }