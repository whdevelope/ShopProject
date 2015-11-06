<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: brand_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ECSHOP 管理中心 - <?php echo ($meta_title); ?>供应商</title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="http://admin.shop.com/Public/Admin/css/general.css" rel="stylesheet" type="text/css" />
    <link href="http://admin.shop.com/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
    
    <link href="http://admin.shop.com/Public/Admin/uploadify/uploadify.css" rel="stylesheet" type="text/css">

</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U('index');?>"><?php echo mb_substr($meta_title,2,null,'utf-8');?>列表</a></span>
    <span class="action-span1"><a href="#">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo ($meta_title); ?> </span>
    <div style="clear:both"></div>
</h1>
<div class="main-div">
  
    <form method="post" action="<?php echo U();?>" enctype="multipart/form-data">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">品牌名称</td>
                <td>
                    <input type="text" name="name" maxlength="60" value="<?php echo ($name); ?>" /><span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">品牌网址</td>
                <td>
                    <input type="text" name="url" maxlength="60" value="<?php echo ($url); ?>" /><span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">品牌LOGO</td>
                <td>
                    <input type="file" name="upload-logo" maxlength="60" id="upload-logo"/>
                    <input type="hidden" class="logo" name="logo" value="<?php echo ($logo); ?>"/>
                    <div class="upload-img-box" style="display:<?php echo ($logo?'block':'none'); ?>">
                        <div class="upload-pre-item">
                            <img src="/Uploads/<?php echo ($logo); ?>">
                    </div>

                    </div>
                </td>
            </tr>
            <tr>
                <td class="label">品牌描述</td>
                <td>
                    <textarea rows="10" cols="40" name="intro" ><?php echo ($intro); ?></textarea> <span class="require-field">*</span>
                </td>
            </tr>

            <tr>
                <td class="label">排序</td>
                <td>
                    <input type="text" name="sort" maxlength="40" size="15" value="<?php echo ((isset($sort) && ($sort !== ""))?($sort):20); ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">状态</td>
                <td>
                    <input type="radio" class="status" name="status" value="1"  /> 是
                    <input type="radio" class="status" name="status" value="0"  /> 否
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><br />
                    <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
                    <input type="submit" class="button ajax-post" value=" 确定 " />
                    <input type="reset" class="button" value=" 重置 " />
                </td>
            </tr>
        </table>
    </form>

</div>
<div id="footer">
    共执行 1 个查询，用时 0.018952 秒，Gzip 已禁用，内存占用 2.197 MB<br />
    版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。
</div>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/layer/layer.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/Admin/js/common.js"></script>
<script type="text/javascript">
    $(function(){
        //选中是否为显示的状态
        $('.status').val([<?php echo ((isset($status) && ($status !== ""))?($status):1); ?>]);

    });
</script>

    <script type="text/javascript" src="http://admin.shop.com/Public/Admin/uploadify/jquery.uploadify.js"></script>
    <script type="text/javascript">
        $("#upload-logo").uploadify({
            height  : 25, //指定删除插件的高和宽
            width   : 145,
            swf     : 'http://admin.shop.com/Public/Admin/uploadify/uploadify.swf',//指定swf的地址
            uploader: '<?php echo U("Uploader/index");?>',//在服务器上处理上传的代码
            'buttonText': '选择图片',//上传按钮上的文字
            'fileSizeLimit': '2MB',//限制大小
            'formData'     : {'dir' : 'brand'},//通过post方式传递的额外参数
            'multi'         : true,//是否支持多文件上传
            'onUploadSuccess' : function(file,data,response){ //上传成功时执行的方法
                $('.logo').val(data);
                $('.upload-img-box').show();
                $('.upload-img-box img').attr('src',"/Uploads/"+data);
            },
            'onUploadError' : function(file,errorCode,errorMsg,errorString){ //上传失败时执行
                alert('该文件上传失败!错误信息为:'+errorString);
            }
        });
    </script>

</body>
</html>