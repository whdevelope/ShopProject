<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/11/2
 * Time: 23:16
 */

namespace Admin\Model;


use Think\Model;
use Think\Page;

class BaseModel extends Model{

    protected $patchValidate = true;

    public function getPageResult($wheres = array())
    {
        //>>3.准备一个数组专门存放条件
        $wheres['status'] = array('neq', -1);
        //>>1.提供分页工具条
        $totalRows = $this->count();  //获取总条数
        $listRows = C('PAGE_SIZE') ? C('PAGE_SIZE') : 10;
        $page = new Page($totalRows, $listRows);
        $pageHtml = $page->show();

        //>>2.提供当前的列表数据
        $rows = $this->where($wheres)->limit($page->firstRow, $page->listRows)->select();
        //>>3.返回包含分页工具条和分页列表数据的相关选项
        return array('pageHtml' => $pageHtml, 'rows' => $rows);
    }

    public function changeStatus($id, $status)
    {
        $data = array('status' => $status);
        if ($status == -1) {
            //表示删除,将name原始值修改为xxx_del
            $data['name'] = array('exp', "concat(name,'_del')");
        }
        return $this->where(array('id' => array('in', $id)))->save($data);
    }
}