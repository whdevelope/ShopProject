$(function(){
    //列表中复选框的特效
    $('.all').change(function(){
       $('.id').prop('checked',$(this).prop('checked'));
    });
    //在所有的class=id的复选框上加上change事件
    $('.id').change(function(){
       $('.all').prop('checked',$('.id:not(:checked)').length==0);
    });


    $('.ajax-get').click(function(){
        var url = $(this).attr('href');
        $.get(url,function(data) {
           showLayer(data);
        });
        return false;//取消默认操作
    }) ;

    $('.ajax-post').click(function(){
        var form = $(this).closest('form');
        var url = form.length==0?$(this).attr('url'):form.attr('action');
        var param = form.length==0?$('.id').serialize():form.serialize();
        $.post(url,param,function(data){

            showLayer(data);
        });
        return false;
    });

    //根据data中的值提示不同的信息
    function showLayer(data){
        layer.msg(data.info, {
            icon: data.status ? 1 : 0,
            offset: 0,
            shift: 6,
            time: 1000 //1秒后自动关闭
        }, function () {
            if (data.status) {
                console.debug(data.url);
                location.href = data.url;
            }
        });
    }

});