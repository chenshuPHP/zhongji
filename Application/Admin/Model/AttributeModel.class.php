<?php
    namespace Admin\Model;
    use Think\Model;

    /**
     * 商品属性模型
     */
    class AttributeModel extends Model
    {
        protected $_validate = array(
            array('attr_name','require','属性名不能为空',1),
            array('attr_name','0,150','属性名称过长',0,'length'),
            array('type_id','number','所属类别不合法',0,),
            array('attr_type',array(0,1),'属性类别不合法',0,'in'),
            array('attr_input_type',array('0','1'),'属性录入方式不合法',0,'in')
        );
        /**
         * 显示
         */
        Public function show() {
            $where = array();
            $ty_id = I('type_id');
            if($ty_id) {
                $where['type_id'] = $ty_id;
            }
            return $this -> where($where) -> select();
        }
    }