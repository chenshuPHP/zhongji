<?php
    namespace Home\Controller;
    use Think\Controller;

    /**
     * 用户注册ajax版
     */
    class RegisterController extends Controller{
        //加载注册
        public function regist() {
            $this -> display();
        }
        //验证
        Public function check() {

        }
        /**
         * 验证码
         */
        Public function Verify() {
            $config =    array(
                'fontSize'    =>  30,    // 验证码字体大小
                'length'      =>  3,     // 验证码位数
                'useNoise'    =>  false,//关闭验证码杂点);
                'useImgBg'    =>  true,     //useImgBg 是否使用背景图片 默认为false
                'useCurve'    => false,
                'fontttf'     => '',

            );
            $Verify =     new \Think\Verify($config);
            $Verify->entry();
        }
    }