<?php
    namespace Admin\Model;
    use Think\Model;

    /**
     * 分类模型
     */
    class CategoryModel extends Model{
        protected $insertFields = array('cat_name','parent_id');
        protected $updateFields = array('cat_id','parent_id');
        protected $_validate = array(
            array('cat_name','require','分类名字不能为空'),
            array('parent_id','number','上级分类输入有误')
        );
        /**
         * @param $parent_id  父级id
         * @return array      树形结构数组
         */
        public function getTree($parent_id) {
            $arr = $this -> select();
            return $this -> createTree($arr,$parent_id=0,$deel=0);
        }

        /**
         * @param $arr          数组
         * @param $parent_id    父级id
         * @param $deel         深度
         * @return array        树形数组
         */
        public function createTree($arr,$parent_id,$deel)
        {
            static $tree = array();

            foreach($arr as $value)
            {
                if($value['parent_id'] == $parent_id  )
                {

                    $value['deel'] = $deel;
                    $tree[] = $value;
                    $this -> createTree($arr,$value['cat_id'],$deel+1);
                }
            }

            return $tree;
        }

        /**
         * 获取子集
         * @param $cat_id 父级id
         */
        Public function getChild($cat_id)
        {
            $arr = $this-> select();
            return $this-> lookup($arr,$cat_id);
        }
        public function lookup($arr,$parent_id)
        {
            static $childs = array();
            foreach($arr as $rows)
            {
                if($rows['parent_id'] == $parent_id)
                {
                    $childs[] = $rows['cat_id'];
                    $this -> lookup($arr , $rows['cat_id']);
                }
            }
            $childs[] = $parent_id;
            return $childs;
        }
    }