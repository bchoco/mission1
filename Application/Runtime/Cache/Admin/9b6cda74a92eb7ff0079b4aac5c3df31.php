<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>工时维护</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/Public/Admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/Public/Admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/Public/Admin/css/animate.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Employee Info</h5>
                    <button type="button"
                            class="btn btn-primary btn-sm"
                            id="add_empl"
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
                            <th>姓名</th>
                            <th>部门</th>
                            <th>状态</th>
                            <th>电话</th>
                            <th>合同工时</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>编号</th>
                            <th>姓名</th>
                            <th>部门</th>
                            <th>状态</th>
                            <th>电话</th>
                            <th>合同工时</th>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addModalLabel">Add Employee</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="worker_add" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="worker_add" placeholder=".." value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dept_add" class="col-sm-2 control-label">Department</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="dept_add" id="dept_add">
                                <?php if(is_array($deptInfo)): foreach($deptInfo as $key=>$dp): ?><option id="<?php echo ($dp["did"]); ?>" value="<?php echo ($dp["did"]); ?>"><?php echo str_repeat('--',$dp['level']*3);?> <?php echo ($dp["dname"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hours_add" class="col-sm-2 control-label">Hours</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="hours_add" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tel_add" class="col-sm-2 control-label">Tel</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tel_add" value="" placeholder="optional"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sta_add" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="sta" id="sta_add">
                                <?php if(is_array(${empl})): foreach(${empl} as $key=>$v): ?><option value="<?php echo ($v); ?>"><?php echo ($v); ?></option><?php endforeach; endif; ?>
                            </select>
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

<!-- Modal start -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editModalLabel">Edit Employee</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="worker_edit" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="worker_edit" placeholder=".." value=""/>
                            <input type="hidden" id="wid" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dept_edit" class="col-sm-2 control-label">Department</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="dept_add" id="dept_edit">
                                <?php if(is_array($deptInfo)): foreach($deptInfo as $key=>$dp): ?><option id="d_<?php echo ($dp["did"]); ?>" value="<?php echo ($dp["did"]); ?>"><?php echo str_repeat('--',$dp['level']*3);?> <?php echo ($dp["dname"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hours_edit" class="col-sm-2 control-label">Hours</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="hours_edit" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tel_edit" class="col-sm-2 control-label">Tel</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tel_edit" value="" placeholder="optional"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sta_edit" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="sta" id="sta_edit">
                                <?php if(is_array(${empl})): foreach(${empl} as $key=>$v): ?><option value="<?php echo ($v); ?>"><?php echo ($v); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mod al-footer" style="text-align: right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="sbmbtn_edit">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- 全局js -->
<script src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/Public/Admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/Public/Admin/js/plugins/jeditable/jquery.jeditable.js"></script>

<!-- Data Tables -->
<script src="/Public/Admin/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="/Public/Admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>

<!-- 自定义js -->
<script src="/Public/Admin/js/content.js?v=1.0.0"></script>

<!-- Page-Level Scripts -->
<script>

    function getInfoEid(eid){
        var v;
        $.ajax({
            url:"/Admin/Labortime/getInfosEid",
            type:"post",
            async:false,
            data:{
                eid:eid
            },
            dataType:'json',
            success:function (msg) {
                if (msg.m === 'ok'){
                    //console.log(msg.d);
                    v = msg.d;
                }else{
                    //console.log(msg.d);
                    alert('出错了');
                }
            }
        });
        return v;
    }

    $(document).ready(function () {
        var tb = $('.dataTables-example').dataTable({
            "ajax": "<?php echo U('lists');?>",
            "columns": [
                { "data": "wid" },
                { "data": "wname" },
                { "data": "dname" },
                { "data": "wstatus" },
                { "data": "wtel"},
                { "data": "wlaborhours"},
                { "data": null}
            ],
            "columnDefs": [
                {
                    "targets":-1,
                    "render":function(data,type,row,meta) {
                        var id = row.wid;
                        var html = '';
                        html += "&nbsp;<a href='javascript:void(0);'  class='up btn btn-default btn-xs edit_empl' data-toggle=\"modal\" data-target=\"#editModal\"><i class='fa fa-arrow-up'></i>编辑</a><input type='hidden' value='"+id+"'/>";
                        html += "&nbsp;<a href='javascript:void(0);'  class='down btn btn-default btn-xs'><i class='fa fa-arrow-down'></i>删除</a><input type='hidden' value='"+id+"'/>";
                        return html;
                    }
                },
                {
                    "targets":-2,
                    "render":function(data,type,row,meta) {
                        return Number(data).toFixed(2);
                    }
                }
            ]
        });

        /******************** 新增操作 *******************/
        $('#sbmbtn_add').bind('click',function(){
            // 获取数据
            var ename = $('#worker_add').val(),
                edept = $('#dept_add option:selected').val(),
                ehours = parseFloat($('#hours_add').val()),
                etel = $('#tel_add').val(),
                esta = $('#sta_add option:selected').val();
                console.log('name:'+ename+',dept:'+edept+',hours:'+ehours+',tel:'+etel+',esta:'+esta);

            // 整理校验
            if(!ename){
                alert('名称不能为空');
                return;
            }else if(isNaN(ehours)){
                alert('小时数格式不正确');
                return;
            }

            // 提交
            $.ajax({
                url:'/Admin/Labortime/addEmployee',
                type:'post',
                data:{
                    ename: ename,
                    edept: edept,
                    ehours: ehours,
                    etel: etel,
                    esta: esta
                },
                dataType:'json',
                success:function (msg) {
                    if (msg.m == 'ok'){
                        console.log(msg.d);
                    }else{
                        alert('出错了');
                    }
                },
                error:function (xhr) {
                    console.log(xhr);
                }
            });
        });

        /******************** 编辑操作 *******************/
        tb.on('init.dt',function () {

            $('.edit_empl').bind('click',function () {
                var eid = $(this).next().val(),
                    d = getInfoEid(eid);
                console.log(d.wdepartment);

                // 显示原信息
                $('#worker_edit').val(d.wname);
                $('#d_'+d.wdepartment).attr('selected','selected');
                $('#hours_edit').val(Number(d.wlaborhours).toFixed(2));
                $('#tel_edit').val(d.wtel);
                $('#wid').val(d.wid);
                $('#sta_edit [value="'+d.wstatus+'"]').attr('selected','selected');
                
            });
            
            $('#sbmbtn_edit').bind('click',function () {

                var wn = $('#worker_edit').val(),
                    wd = $('#dept_edit').val(),
                    wh = parseFloat($('#hours_edit').val()),
                    wt = $('#tel_edit').val(),
                    ws = $('#sta_edit').val(),
                    wid = $('#wid').val();

                console.log(wn+' , '+wd+' , '+wh+' , '+wt+' , '+ws);

                // 检验
                if (!wn){
                    alert('员工姓名不能为空');
                    return;
                }else if(isNaN(wh) || wh >= 24 || wh == 0){
                    alert('工时数据无效');
                    return;
                }

                // 发送后台请求,修改数据
                $.ajax({
                    url:"/Admin/Labortime/editEmpl",
                    type:"post",
                    data:{
                        wn: wn,
                        wd: wd,
                        wh: wh,
                        wt: wt,
                        ws: ws,
                        wid:wid
                    },
                    dataType:'json',
                    success:function (msg) {
                        if (msg.m === 'ok'){
                            //$('iframe').attr('src',"/index.php/Admin/labortime/labortimeedit").ready();
                            document.getElementsByTagName("iframe").src="/index.php/Admin/labortime/labortimeedit";
                        }else{
                            alert('出错了');
                        }
                    }
                });
            });
        });
    });
</script>
</body>
</html>