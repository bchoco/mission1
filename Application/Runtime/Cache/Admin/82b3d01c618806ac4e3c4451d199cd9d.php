<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/Admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
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
                    <h5>管理员维护 <small>部门管理员增删改</small></h5>
                    <button type="button"
                            class="btn btn-primary btn-sm"
                            id="add_admin"
                            data-toggle="modal" data-target="#addModal"
                            style="position: relative; float:right; bottom:7px;">Add
                        <i class="glyphicon glyphicon-plus"></i>
                    </button>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>用户名</th>
                            <th>所属角色</th>
                            <th>所属部门</th>
                            <th>最后登录时间</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <th>用户名</th>
                            <th>所属角色</th>
                            <th>所属部门</th>
                            <th>最后登录时间</th>
                            <th>状态</th>
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
                <h4 class="modal-title" id="addModalLabel">Add Admin</h4>
            </div>
            <div class="modal-body col-md-12">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="adm_add" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="adm_add" placeholder=".." />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pwd_add" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pwd_add" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dept_add" class="col-sm-2 control-label">Department</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="dept" id="dept_add">
                                <?php if(is_array($deptInfo)): foreach($deptInfo as $key=>$dp): ?><option value="<?php echo ($dp["did"]); ?>"><?php echo str_repeat('--',$dp['level']*3);?> <?php echo ($dp["dname"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">status</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="ustatus" id="s1_add" value="normal" checked> normal
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ustatus" id="s2_add" value="hidden"> hidden
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mod al-footer" style="text-align: right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addbtn">Save changes</button>
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
                <h4 class="modal-title" id="editModalLabel">Edit Admin</h4>
            </div>
            <div class="modal-body col-md-12">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="adm" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="adm" placeholder=".." value=""/>
                            <input type="hidden" id="uid" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pwd" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pwd" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dept" class="col-sm-2 control-label">Department</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="dept" id="dept">
                                <?php if(is_array($deptInfo)): foreach($deptInfo as $key=>$dp): ?><option id="d_<?php echo ($dp["did"]); ?>" value="<?php echo ($dp["did"]); ?>"><?php echo str_repeat('--',$dp['level']*3);?> <?php echo ($dp["dname"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="ustatus_edit" id="s1" value="normal" checked> normal
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ustatus_edit" id="s2" value="hidden"> hidden
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mod al-footer" style="text-align: right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editbtn">Save changes</button>
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
    function getInfoByUid(uid){
        var v=[];
        $.ajax({
            url:"/Admin/Authority/getInfoUid",
            async:false,
            type:"post",
            data:{uid:uid},
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
        var tb = $('.dataTables-example').dataTable({
            "ajax": "<?php echo U('Authority/lists');?>",
            "columns": [
                { "data": "usn" },
                { "data": "roname" },
                { "data": "dname" },
                { "data": "logintime" },
                { "data": "ustatus" },
                { "data": null }
            ],
            "columnDefs": [
                {
                    "targets":-1,
                    "render":function(data,type,row,meta) {
                        var uid = row.muid;
                        var html = '';
                        html += "&nbsp;<a href='javascript:void(0);' class='up btn btn-default btn-xs editadm ' data-toggle=\"modal\" data-target=\"#editModal\"><i class='fa fa-arrow-up'></i>编辑</a><input type='hidden' value='"+uid+"'/>";
                        html += "&nbsp;<a href='javascript:void(0);' class='down btn btn-default btn-xs deladm'><i class='fa fa-arrow-down'></i>删除</a><input type='hidden' value='"+uid+"'/>";
                        return html;
                    }
                }
            ]
        });

        // 表格加载完毕
        tb.on('init.dt',function(){
            $('.editadm').bind('click',function(){

                var uid = $(this).next().val();
                var d = getInfoByUid(uid);
                console.log(d);
                var adm = d.usn;

                // 原信息
                $('#adm').val(adm);
                $('#d_'+d.dept).attr('selected','selected');
                $('[value="'+d.ustatus+'"]').attr('checked','checked');

                // 标记uid
                $('#uid').val(uid);
            });
        });

        // 清空数据
        $('#editModal').on('hidden.bs.modal', function (e) {
            $(this).removeData("bs.modal");
        });
        $('#addModal').on('hidden.bs.modal', function (e) {
            $(this).removeData("bs.modal");
        });

        // 提交新增
        $('#addbtn').bind('click',function(){
            var name = $('#adm_add').val(),             // Mana_3
                pwd = $('#pwd_add').val(),              // 123
                dept = $('#dept_add').val(),            // Technology
                status = $("[name='ustatus']:checked").val(); // normal

            // 数据验证
            if (!name || !pwd){
                alert('用户名和密码不能为空');
                return;
            }

            // 提交后台
            $.ajax({
                url:"/Admin/Authority/addAdmin",
                type:"post",
                data:{
                    name:name,
                    pwd:pwd,
                    dept:dept,
                    status:status
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

        // 提交更改
        $('#editbtn').bind('click',function(){
            var name_edit = $('#adm').val(),             // Mana_3
                pwd_edit = $('#pwd').val(),              // 123
                dept_edit = $('#dept').val(),            // Technology
                status_edit = $("[name='ustatus_edit']:checked").val(), // normal
                uid_edit = $('#uid').val();
                //console.log('name:'+name_edit+',pwd:'+pwd_edit+',dept:'+dept_edit+',status:'+status_edit,',uid:'+uid_edit);
            // 数据验证
            if (!name_edit || !pwd_edit){
                alert('用户名和密码不能为空');
                return;
            }

            // 提交后台
            $.ajax({
                url:"/Admin/Authority/editAdmin",
                type:"post",
                data:{
                    name:name_edit,
                    pwd:pwd_edit,
                    dept:dept_edit,
                    status:status_edit,
                    uid:uid_edit
                },
                dataType:'json',
                success:function (msg) {
                    if (msg.m === 'ok'){
                        $('#editModal').modal('hide');
                    }else{
                        alert('出错了');
                        console.log(msg.d);
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