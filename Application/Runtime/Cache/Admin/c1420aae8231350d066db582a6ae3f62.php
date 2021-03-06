<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>任务维护</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/Public/Admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/Public/Admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/Public/Admin/css/animate.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.css?v=4.1.0" rel="stylesheet">

    <link href="/Public/Admin/liger/lib/ligerUI/skins/Aqua/css/ligerui-all.css" rel="stylesheet" type="text/css">
</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>基本 <small>分类，查找</small></h5>
                    <button type="button"
                            class="btn btn-primary btn-sm"
                            id="add_task"
                            data-toggle="modal" data-target="#addModal"
                            style="position: relative; float:right; bottom:7px;">Add
                        <i class="glyphicon glyphicon-plus"></i>
                    </button>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>创建时间</th>
                            <th>任务摘要</th>
                            <th>预计工时</th>
                            <th>任务状态</th>
                            <th>执行人</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>编号</th>
                            <th>创建时间</th>
                            <th>任务摘要</th>
                            <th>预计工时</th>
                            <th>任务状态</th>
                            <th>执行人</th>
                            <th>操作</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal start -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit task</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Task</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="taskname" placeholder=".." value=""/>
                            <input type="hidden" id="tid" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="taskhours" class="col-sm-2 control-label">Hours</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="taskhours" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Executors</label>
                        <div class="col-sm-10">
                            <div class="col-md-12" style="border: 1px solid #CCCCCC; height: 300px; overflow:hidden;">
                                <ul id="tree1"></ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mod al-footer" style="text-align: right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="sbmbtn">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal start -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addModalLabel">Edit task</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Task</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="taskname_add" placeholder=".." value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="taskhours" class="col-sm-2 control-label">Hours</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="taskhours_add" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Executors</label>
                        <div class="col-sm-10">
                            <div class="col-md-12" style="border: 1px solid #CCCCCC; height: 300px; overflow:hidden;">
                                <ul id="tree2"></ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mod al-footer" style="text-align: right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="sbmbtn_add">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- 全局js -->
<script src="/Public/Admin/js/jquery-2.1.4.min.js"></script>
<script src="/Public/Admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/Public/Admin/js/plugins/jeditable/jquery.jeditable.js"></script>



<!-- 自定义js -->
<script src="/Public/Admin/js/content.js?v=1.0.0"></script>
<script src="/Public/Admin/liger/lib/ligerUI/js/core/base.js" type="text/javascript"></script>
<script src="/Public/Admin/liger/lib/ligerUI/js/plugins/ligerTree.js" type="text/javascript"></script>

<!-- Data Tables -->
<script src="/Public/Admin/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="/Public/Admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>

<!-- Page-Level Scripts -->
<script>
    var tree;

    function editClick(n,i){
        alert(n+'\n'+i);
        // 发送后台请求,修改数据
        $.ajax({
            url:"/Admin/Task/edittask",
            type:"post",
            data:{
                tname:'',
                tworker:''
            },
            dataType:'json',
            success:function (msg) {
                //console.log(msg);
                if (msg.m === 'ok'){
                    //alert('编辑成功');
                    //$('iframe').attr('src',"/index.php/Admin/labortime/labortimeedit").ready();
                    document.getElementsByTagName("iframe").src="/index.php/Admin/labortime/labortimeedit";
                }else{
                    alert('出错了');
                }
            }
        });
    }

    function delClick(n,i){

    }

    function getTree(treeid,tid){
        var tid0 = arguments[1] ? arguments[1] : -1;
        $.ajax({
            url:"/Admin/Task/getTreeData",
            type:"post",
            data:{tid:tid},
            dataType:'json',
            success:function (msg) {
                if (msg.m === 'ok'){
                    var datas = msg.d,
                        arr_data = [];
                    for(var i in datas){
                        arr_data.push(datas[i]);
                    }

                    tree = $("#"+treeid).ligerTree({
                        data:arr_data,
                        idFieldName :'id',
                        slide : false,
                        parentIDFieldName :'pid',
                        isExpand: true
                    });
                    treeManager = $("#"+treeid).ligerGetTreeManager();
                    //treeManager.collapseAll();
                }else{
                    alert('出错了');
                }
            }
        });
    }

    // 根据tid获取任务名称，执行人等信息
    function getInfoByTid(tid){
        var v;
        $.ajax({
            url:"/Admin/Task/getInfoTid",
            async:false,
            type:"post",
            data:{tid:tid},
            dataType:'json',
            success:function (msg) {
                if (msg.m === 'ok'){
                    v = msg.d;
                }else{
                    alert('出错了');
                }
            }
        });
        return v;
    }


    $(document).ready(function () {
        // tabel
        var tb = $('.dataTables-example').dataTable({
            "ajax": "<?php echo U('lists');?>",
            "columns": [
                { "data": "rn" },
                { "data": "tcreatetime" },
                { "data": "tname" },
                { "data": "thour" },
                { "data": "tstatus" },
                { "data": "tworker"},
                { "data": null}
            ],
            "columnDefs": [
                {
                    "targets":-1,
                    "render":function(data,type,row,meta) {
                        var id = row.tid;
                        var html = '';
                        html += "&nbsp;<a href='javascript:void(0);' class='up btn btn-default btn-xs edittask' onclick='getTree(\"tree1\",\""+id+"\")' data-toggle=\"modal\" data-target=\"#myModal\">" +
                            "<i class='fa fa-arrow-up'></i>" +
                            "编辑</a>"+
                            "<input type='hidden' value='"+id+"'/>";
                        html += "&nbsp;<a href='javascript:void(0);' class='down btn btn-default btn-xs deltask'>" +
                            "<input type='hidden' value='"+id+"'/>" +
                            "<i class='fa fa-arrow-down'></i>删除" +
                            "</a>";
                        return html;
                    }
                }
            ]
        });

        /***************** 新增 ******************/
        $('#add_task').bind('click',function () {
            getTree('tree2');
        });

        $('#sbmbtn_add').bind('click',function () {
            // 获取数据 检验数据 提交后台
            var tv          = tree.getChecked(),
                tname       = $('#taskname_add').val(),
                thour       = parseFloat($('#taskhours_add').val()),
                wid_arr     = [],
                wname_arr   = [],
                idx;

            // 获取选择项
            tv.map(function (v) {
                idx = v.data.id.indexOf('_');
                if (idx >= 0){
                    wid_arr.push(v.data.id.substring(0,idx));
                    wname_arr.push(v.data.text);
                }
            });

            if (!tname){
                alert('项目名称不能为空');
                return;
            }else if(isNaN(thour) || thour <= 0){
                alert('工时格式不正确');
                return;
            }else if(wid_arr.length == 0){
                alert('执行人不能为空');
                return;
            }

            // 提交后台
            $.ajax({
                url:"/Admin/Task/addtask",
                type:"post",
                data:{
                    tname:tname,
                    thour:thour,
                    wid_arr:wid_arr,
                    wname_arr:wname_arr
                },
                dataType:'json',
                success:function (msg) {
                    if (msg.m === 'ok'){
                        $('#addModal').modal('hide');
                    }else{
                        alert('出错了');
                    }
                },
                error:function(xhr){
                    console.log(xhr);
                }
            });

        });



        
        /******************* 修改 *******************/
        tb.on('init.dt',function(){
            $('.edittask').bind('click',function(){
                var tid = $(this).next().val();
                var d = getInfoByTid(tid);
                var taskname = d.tname;

                // 原任务名
                $('#taskname').val(taskname);
                $('#taskhours').val(d.thour);

                // 标记tid
                $('#tid').val(tid);
            });
        });

        $('#myModal').on('hidden.bs.modal', function (e) {
            $(this).removeData("bs.modal");
        });

        // 提交更改
        $('#sbmbtn').bind('click',function () {
            var tv          = tree.getChecked(),
                tid         = $('#tid').val(),
                tname       = $('#taskname').val(),
                thour       = parseFloat($('#taskhours').val()),
                wid_arr     = [],
                wname_arr   = [],
                idx;

            // 获取选择项
            tv.map(function (v) {
                idx = v.data.id.indexOf('_');
                if (idx >= 0){
                    wid_arr.push(v.data.id.substring(0,idx));
                    wname_arr.push(v.data.text);
                }
            });

            if (!tname){
                alert('项目名称不能为空');
                return;
            }else if(isNaN(thour) || thour <= 0){
                alert('工时格式不正确');
                return;
            }else if(wid_arr.length == 0){
                alert('执行人不能为空');
                return;
            }


            // 提交后台
            $.ajax({
                url:"/Admin/Task/edittask",
                type:"post",
                data:{
                    tid:tid,
                    tname:tname,
                    thour:thour,
                    wid_arr:wid_arr,
                    wname_arr:wname_arr
                },
                dataType:'json',
                success:function (msg) {
                    if (msg.m === 'ok'){
                        $('#myModal').modal('hide');
                    }else{
                        alert('出错了');
                    }
                },
                error:function(xhr){
                    console.log(xhr);
                }
            });
        });
    });
</script>
</body>
</html>