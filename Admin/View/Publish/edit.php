<include file="Include:plugins_ueditor"/>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">修改公告</h3>
                <div class="box-tools">
                    <a href="javascript:;" onclick="helpClassConfig()" class="btn btn-box-tool"><i class="fa fa-cogs"></i> 分类管理</a>
                </div>
            </div>
            <div class="box-body">
                <form action="{:U('Publish/edit')}" class="form-horizontal well-lg">                    
                    {:W('Form/select',array(array('label'=>'分类名称','name'=>'class_name','value'=>'')))}
                    {:W('Form/input',array(array('label'=>'标题','name'=>'title','value'=>$data['title'])))}
                    {:W('Form/ueditor',array(array('label'=>'内容','name'=>'content','value'=>$data['content'])))}                 
                <input type="hidden" name="id" value="{$data['id']}">
                </form>
            </div>
            <div class="box-footer">
                <button type="button" class="btn btn-default">提交</button>
            </div>
        </div>
    </div>
</div>
<!-- <div id="names" style="display:none;">{$names}</div> -->
<script>
    formSubmit.submit($('form'), $('button'));

    function helpClassConfig(){
        var content = '<textarea name="publish_class_names" class="form-control" placeholder="一行一个" rows="3">'+$("#names").text()+'</textarea>'
        dialog({
            width: 300,
            title: '帮助文档分类',
            content: content,
            ok: function(){
                formSubmit.ajax({
                    url:"{:U('PubClassConfig')}",
                    type:"post",
                    data:{help_class_names:$('textarea[name=publish_class_names]').val()}
                });
            },
            cancel: function(){return;},
            okValue: '保存',
            cancelValue: '取消',
            zIndex: 99999
        }).showModal();
    }
</script>