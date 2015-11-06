<extend name="Common:index"/>
<block name="list">
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th><input class="all" type="checkbox"/>序号</th>
                <?php foreach($fields as $field):
                    if($field['key']=='PRI'){
                        continue;
                    }
                    $comment = strpos($field['comment'],'@')===false?$field['comment']:strstr($field['comment'],'@',true);//将简介中前面的部分截取出来
                ?>
                <th><?php echo $comment?></th>
                <?php endforeach;?>
                <th>操作</th>
            </tr>
            <volist name="rows" id="row">
                <tr>
                    <td align="center" width="50px"><input class="id" name="id[]" type="checkbox" value="{$row.id}"/>
                    </td>
                    <?php foreach($fields as $field){
                        if($field['key']=='PRI'){
                            continue;
                        }
                        if($field['field']=='status'){
                            echo '<td align="center"><a class="ajax-get" href="{:U(\'changeStatus\',array(\'id\'=>$row[\'id\'],\'status\'=>1-$row[\'status\']))}"><img src="__IMG__/{$row.status}.gif"/></a></td>';
                            echo "\r\n";
                        }else{
                            echo "<td align='center'>{\$row.{$field['field']}}</td>\r\n";
                        }
                    }?>
                    <td align="center">
                        <a href="{:U('edit',array('id'=>$row['id']))}" title="编辑">编辑</a> |
                        <a class="ajax-get" href="{:U('changeStatus',array('id'=>$row['id'],'status'=>-1))}" title="编辑">移除</a>
                    </td>
                </tr>
            </volist>
        </table>
        <input type="button" class="ajax-post" url="{:U('changeStatus')}" value="删除选中"/>

        <div class="page">
            {$pageHtml}
        </div>
    </div>
</block>