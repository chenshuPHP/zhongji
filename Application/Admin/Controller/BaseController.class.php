<?php
    namespace Admin\Controller;
    use Think\Controller;

    /**
     * 后台基础控制器
     */
    class BaseController extends Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this -> initFinalize();
        }
        public function initFinalize() {
            $id = $_SESSION['admin'];
            if(empty($id)) {
                $this -> error('请登录',U('Login/login'));
            }
        }
    }