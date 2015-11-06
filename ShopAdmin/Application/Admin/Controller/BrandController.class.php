<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Upload;

class BrandController extends BaseController
{
    protected $meta_title = '品牌';

//    public function add(){
//        if (IS_POST) {
//            //>>1.接收请求数据,使用模型中的create方自动验证和自动完成
//            if ($this->model->create() !== false) {
//                if ($this->model->add() !== false) {
//                   //>>2.添加成功,将结果还在当前页面显示
//                    $this->success('添加成功', cookie('__forward__'));
//                    return; //阻止后面的代码执行
//                }
//            }
//            //>>3.验证和添加操作失败时原路返回到请求页面
//            $this->error('操作失败' . showErrors($this->model));
//        } else {
//           //>>4.将要在页面显示的标题分发
//           $this->assign('meta_title', '添加' . $this->meta_title);
//            //>>5.调用要显示的页面进行相应的操作
//            $this->display('edit');
//        }
//    }
}