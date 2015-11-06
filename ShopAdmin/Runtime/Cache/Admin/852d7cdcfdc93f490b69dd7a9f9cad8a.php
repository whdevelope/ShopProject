<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ECSHOP 管理中心 - 商品供应商 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="http://admin.shop.com/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
    <link href="http://admin.shop.com/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
    <link href="http://admin.shop.com/Public/Admin/css/page.css" rel="stylesheet" type="text/css" />
    
        <!--预留的一个块,为了让字模板覆盖它加入自己的css-->
    
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U('add');?>">添加<?php echo ($meta_title); ?></a></span>
    <span class="action-span1"><a href="#">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo ($meta_title); ?> </span>
    <div style="clear:both"></div>
</h1>
<div class="form-div">
    
    <form action="<?php echo U();?>" name="searchForm">
        <img src="http://admin.shop.com/Public/Admin/img/icon_search.gif" width="26" height="22" border="0" alt="search" />
        <input type="text" name="keyword" size="15" />
        <input type="submit" value=" 搜索 " class="button" />
    </form>
    
</div>

    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th><input class="all" type="checkbox"/>序号</th>
                                <th>分类名称</th>
                                <th>父类id</th>
                                <th>左分隔点</th>
                                <th>右分割点</th>
                                <th>分类排序</th>
                                <th>分类描述</th>
                                <th>状态</th>
                                <th>操作</th>
            </tr>
            <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
                    <td align="center" width="50px"><input class="id" name="id[]" type="checkbox" value="<?php echo ($row["id"]); ?>"/>
                    </td>
                    <td align='center'><?php echo ($row["NAME"]); ?></td>
<td align='center'><?php echo ($row["parent_id"]); ?></td>
<td align='center'><?php echo ($row["lft"]); ?></td>
<td align='center'><?php echo ($row["rgt"]); ?></td>
<td align='center'><?php echo ($row["sort"]); ?></td>
<td align='center'><?php echo ($row["intro"]); ?></td>
<td align='center'><?php echo ($row["STATUS"]); ?></td>
                    <td align="center">
                        <a href="<?php echo U('edit',array('id'=>$row['id']));?>" title="编辑">编辑</a> |
                        <a class="ajax-get" href="<?php echo U('changeStatus',array('id'=>$row['id'],'status'=>-1));?>" title="编辑">移除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <input type="button" class="ajax-post" url="<?php echo U('changeStatus');?>" value="删除选中"/>

        <div class="page">
            <?php echo ($pageHtml); ?>
        </div>
    </div>



<div id="footer">
    共执行 3 个查询，用时 0.021251 秒，Gzip 已禁用，内存占用 2.194 MB<br />
    版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/layer/layer.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/js/common.js"></script>

    <!--预留的一个块,为了让子模块覆盖它加入自己的js-->

</body>
</html>