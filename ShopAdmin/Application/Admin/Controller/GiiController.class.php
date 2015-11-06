<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/11/3
 * Time: 12:47
 */

namespace Admin\Controller;


use Think\Controller;

class GiiController extends Controller{
    public function index(){
        if(IS_POST){
            header('Content-type:text/html;charset=utf-8');
            //>>1.提供模板中所需要的数据(从请求中获取)
             //>>1.1提交类的名字
            $table_name = I('post.table_name');
            $name = parse_name($table_name,1);//将用户输入的表名转换为规范的类目
            //>>1.2提供meta_title的值(从information_schema表中查询)
            $sql = "SELECT  TABLE_COMMENT  FROM  information_schema.TABLES where  table_schema = '".C('DB_NAME')."' and TABLE_NAME='$table_name'";
            $rows = M()->query($sql);
            $meta_title = $rows[0]['table_comment'];
            //>>2.让模板使用数据合成代码
            defined('TEMPLATE_PATH')or define('TEMPLATE_PATH',ROOT_PATH.'Template/');

            //====================生成控制器===================
            ob_start();
            require TEMPLATE_PATH.'Controller.tpl'; //将tpl当作html
            //>>3.获取生成的代码,将其输出到指定的文件中
            $controller_content = ob_get_clean();
            $controller_content = "<?php\r\n".$controller_content;
            $controller_path = APP_PATH.'Admin/Controller/'.$name.'Controller.class.php';
            file_put_contents($controller_path,$controller_content);

            //=======================获取表中的每个字段的详细信息============
            $sql = "show full columns from " .$table_name;
            $fields = M()->query($sql);
            foreach($fields as &$field){
                $comment = $field['comment'];
                preg_match('/(.*)@([a-z]*)\|?(.*)/',$comment,$result);
                if(!empty($result)){
                    $field['comment'] = $result[1];
                    $field['input_type'] = $result[2];
                    if(!empty($result[3])){
                        parse_str($result[3],$option_values);//1=是 0=否
                        $field['option_values'] = $option_values;
                    }
                }

            }

            unset($field); //避免后面在使用$field出错,因为field也在后面foreach中使用

            //=======================生成模型===================
            ob_start();
            require TEMPLATE_PATH.'Model.tpl';//将tpl当中html
            $model_content = ob_get_clean();
            $model_content = "<?php\r\n".$model_content;
            $model_path = APP_PATH.'Admin/Model/'.$name.'Model.class.php';
            file_put_contents($model_path,$model_content);

            //==========================生成index页面=========================
            ob_start();
            require TEMPLATE_PATH.'index.tpl'; //将tpl当作html
            $index_content = ob_get_clean();
            $view_dir = APP_PATH.'Admin/View/'.$name; //控制器对应的视图文件夹的目录路径
            if(!is_dir($view_dir)){
                mkdir($view_dir,0777,true);
            }
            $index_path = $view_dir.'/index.html';
            file_put_contents($index_path,$index_content);//将index内容输出到index.html中


            //===============================生成edit页面==============================
            ob_start();
            require TEMPLATE_PATH.'edit.tpl';
            $edit_content = ob_get_clean();
            $view_dir = APP_PATH.'Admin/View/'.$name; //控制器对应的视图文件夹的目录路径
            if(!is_dir($view_dir)){
                mkdir($view_dir,0777,true);
            }
            $edit_path = $view_dir.'/edit.html';
            file_put_contents($edit_path,$edit_content); //将edit的内容输出到edit.html中
            $this->success('代码生成成功!');
        }else{
            $this->display('index');
        }
    }
}