<?php
    namespace Admin\Model;
    use Think\Model;

    /**
     * 角色模型
     */
    class RoleModel extends Model
    {
        protected $insertFelds = array('role_name');
        //自动验证
        protected $patchValidate = true;
        protected $rules  = array(
            array('role_name','require','没有填写角色名称')
        );

        /**
         * 插入角色和权限关系表
         * @param $data
         * @param $options
         */
        public function _after_insert(&$data, $options)
        {

            parent::_before_insert($data, $options); // TODO: Change the autogenerated stub
            $auth = I('post.auth_id');
            $role = $data['role_id'];
            foreach($auth as $rows) {
                $data=[
                    'role_id' =>$role,
                    'auth_id' => $rows

                      ];

               $a =  M('RoleAuthority') -> add($data);


            }
        }
    }