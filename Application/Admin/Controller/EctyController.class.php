<?php
namespace Admin\Controller;
use \Think\Controller;
class EctyController extends Controller
{
public function sheng()
{
    $shengg = S('shengf');
    if(empty($shengg)) {
        $shengg = M('region') ->where('pid = 1 and type = 1') ->  select();

        S('shengf',$shengg);
    }
    $this -> assign('sheng',$shengg);
    $this -> display();
    }
    public function eity()
    {
        $where = $_POST;
        if(empty($where))
        {
            echo json_encode(array('status' => 0, 'ime' => '网络错误'));
            exit;
        }
        $eity = S('eity_pid'.$_POST['pid']);
        if(empty($eity))
        {
            $eity = M('region') -> where($where) -> select();
            S('eity_pid'.$_POST['pid'], $eity);
        }
        $this -> assign('eity',$eity);
        $this -> display();
    }
}