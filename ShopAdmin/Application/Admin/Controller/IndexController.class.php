<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        $this->display('index');
    }
    public function top(){
        $this->display('top');
    }
    public function menu(){
        $this->display('menu');
    }
    public function main(){
        $this->display('main');
    }
}