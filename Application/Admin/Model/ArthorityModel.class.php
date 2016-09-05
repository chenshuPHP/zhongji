<?php
    namespace Admin\Model;
    use Think\Model;

    /**
     * 权限模型
     */
    class AuthorityModel extends Model
    {
        //自动验证
        protected $_validate = array(
            array('auth_name','require','没有填写权限名'),
            array('parent_id','number','上级id操作有误')
        );
    }