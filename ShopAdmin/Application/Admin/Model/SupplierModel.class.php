<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/10/31
 * Time: 15:12
 */

namespace Admin\Model;


use Think\Model;

class SupplierModel extends BaseModel{
    //是否开启批处理验证
    //自动验证定义
    protected $_validate = array(
        array('name','require','名称不能为空!'),
        array('name','','名称不能重复!','','unique'),//表示是否唯一
        array('intro','require','简介不能为空!'),
    );


}