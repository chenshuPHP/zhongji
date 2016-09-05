<?php
    namespace Admin\Model;
    use Think\Model;

    /**
     * 管理登录控制器
     */
    class AdminModel extends Model
    {
        /**
         * 判断登录是否成功
         */
        Public function login() {
            $password = I('post.admin_password');
            $where['admin_name'] = I('post.admin_name');
            $info = $this -> where($where) ->  find();
            if($info) {


                if($info['admin_password'] == md5(md5($password).$info['admin_salt']) ) {
                    $_SESSION['admin'] = $info;
                    return 1;
                } else {
                    return 2;
                }

            } else {
                return 3;
            }
        }
    }