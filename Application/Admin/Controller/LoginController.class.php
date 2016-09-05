<?php
    namespace Admin\Controller;
    use Think\Controller;
    use Think\Verify;

    /**
     * 管理员登录控制器
     */
    class LoginController extends Controller
    {
        /**
         * d登录
         */
        public function login()
        {
            if(IS_POST) {

                $yanz = new \Think\Verify();
                if(!$yanz -> check(I('post.captcha'))) {

                    $this -> error('验证码错误');

                } else {
                    $admin = D('admin');

                    $info = $admin->login();
                    switch ($info) {
                        case 1 :
                            $this->success('登录成功', U('Index/index'));
                            break;
                        case 2 :
                            $this->error('密码错误');
                            break;
                        default :
                            $this->error('账号错误');
                    }
                    exit;
                }
            }
            $this -> display();
        }
        public function ver()
        {
            $config = array(
                'fontSize'    =>    15,    // 验证码字体大小
                'length'      =>    4,     // 验证码位数
                'useNoise'    =>    false, // 关闭验证码杂点
                'useImgBg '   =>    true,
                'fontttf'     => '5.ttf',
                'zhSet'       => true,
                'imageH'      => 30,
                'imageW'      => 150,
                'useImgBg'    => true

//                'useZh'       => true
            );
            $yanz = new \Think\Verify($config);
            $yanz->entry();
        }
    }