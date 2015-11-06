<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/11/2
 * Time: 23:14
 */

namespace Admin\Controller;


use Think\Controller;

class BaseController extends Controller{

    protected $model;

    public function _initialize()
    {
        //创建模型对象 该方法被构造函数调用
        $this->model = D(CONTROLLER_NAME);
    }

    public function index()
    {
        //>>1.接收查询数据,准备查询条件
        $wheres = array();
        //>>2.接收get请求过来的参数
        $keyword = I('get.keyword');
        if (!empty($keyword)) {
            //>>3.将要查询的具体条件放到where数组中
            $wheres['name'] = array('like', "%$keyword%");
        }
        //>>4.调用模型的getPageResult方法
        $pageResult = $this->model->getPageResult($wheres);
        //>>5.将当前请求的页面保存到cookie中以便操作后还在当前页面而不跳转到首页
        cookie('__forward__', $_SERVER['REQUEST_URI']);
        //>>6.将结果分配到页面显示
        $this->assign($pageResult);
        //>>7.将需要显示的标题分配的页面上显示
        $this->assign('meta_title', $this->meta_title);
        //>>8.将结果显示在页面
        $this->display('index');
    }

    public function add()
    {
        if (IS_POST) {
        //>>1.接收请求数据,使用模型中的create方自动验证和自动完成
        if ($this->model->create() !== false) {
            if ($this->model->add() !== false) {
                //>>2.添加成功,将结果还在当前页面显示
                $this->success('添加成功', cookie('__forward__'));
                return; //阻止后面的代码执行
            }
        }
        //>>3.验证和添加操作失败时原路返回到请求页面
        $this->error('操作失败' . showErrors($this->model));
    } else {
        //>>4.将要在页面显示的标题分发
        $this->assign('meta_title', '添加' . $this->meta_title);
        //>>5.调用要显示的页面进行相应的操作
        $this->display('edit');
    }
    }

    public function edit($id)
    {
        if (IS_POST) {
            //>>1.调用模型对应的方法create收集请求参数
            if ($this->model->create() !== false) {
                //>>2.调用模型对应的方法save保存要进行的修改
                if ($this->model->save() !== false) {
                    //>>3.表示修改成功
                    $this->success('修改成功', cookie('__forward__'));
                    return;
                }
            }
            //>>4.验证和修改失败,原路返回到请求页面
            $this->error('操作失败' . showErrors($this->model));
        } else {
            //>>5.根据id调用模型对应的方法find查找出需要的一行
            $rows = $this->model->find($id);
            //dump($rows); 因为查询出来的是一个关联一维数组,所以可以直接分配给页面
            //>>6.将查询出来的结果分配给页面以做回显
            $this->assign($rows);
            //>>7.将需要显示的标题分配给页面显示
            $this->assign('meta_title', '编辑' . $this->meta_title);
            //>>8.调用编辑视图以供编辑选择
            $this->display('edit');
        }
    }

    public function changeStatus($id, $status = -1)
    {
        //>>1.直接使用模型里的方法changeStatus修改
        $result = $this->model->changeStatus($id, $status);
        //>>>2.判断结果
        if ($result !== false) {
            $this->success('操作成功', cookie('__forward__'));
        } else {
            $this->error('操作失败');
        }
    }
}