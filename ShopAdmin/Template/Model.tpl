namespace Admin\Model;


use Think\Model;

class <?php echo $name?>Model extends BaseModel{
    //自动验证定义
    protected $_validate = array(
        <?php foreach($fields as $field){  //根据表中的字段生成验证规则
            //主键和可以为空的不需要生成验证规则
            if($field['key']=='PRI' || $field['null']=='YES'){
                continue;
            }
            //如果注解中包含@,就将@前面的部分截取出来
            $comment = strpos($field['comment'],'@')===false?$field['comment']:strstr($field['comment'],'@',true);//将简介中@前面的部分截取出来
            echo "array('{$field['field']}','require','{$comment}不能够为空!'),\r\n";
        }?>
    );


}