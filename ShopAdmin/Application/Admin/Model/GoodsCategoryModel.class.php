<?php
namespace Admin\Model;


use Think\Model;

class GoodsCategoryModel extends BaseModel{
    //自动验证定义
    protected $_validate = array(
        array('NAME','require','分类名称不能够为空!'),
array('parent_id','require','父类id不能够为空!'),
array('lft','require','左分隔点不能够为空!'),
array('rgt','require','右分割点不能够为空!'),
array('sort','require','分类排序不能够为空!'),
array('STATUS','require','状态不能够为空!'),
    );


}