<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理组维护</title>
   <link rel="shortcut icon" href="favicon.ico">
    <link href="/Public/Admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Admin/liger/lib/ligerUI/skins/Aqua/css/ligerui-all.css" rel="stylesheet" type="text/css">

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
                    <h5>管理组维护 <small>管理组与组权限修改</small></h5>
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
                            <th>id</th>
                            <th>父级id</th>
                            <th>管理组</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>id</th>
                            <th>父级id</th>
                            <th>管理组</th>
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
                <h4 class="modal-title" id="addModalLabel">Add Role</h4>
            </div>
            <div class="modal-body col-md-12">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="role_add" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="role_add" placeholder=".." />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="parent_add" class="col-sm-2 control-label">Parent</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="dept" id="parent_add">
                                <option value="nan"> -- select one -- </option>
                                <?php if(is_array($roleInfo)): foreach($roleInfo as $key=>$ad): ?><option value="<?php echo ($ad["roid"]); ?>"><?php echo str_repeat('&#45;&#45;',$ad['level']*3);?> <?php echo ($ad["roname"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Privilege</label>
                        <div class="col-sm-10">
                            <div class="col-md-12" style="border: 1px solid #CCCCCC; height: 300px; overflow:hidden;">
                                <?php echo ($html); ?>
                            </div>
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
                <h4 class="modal-title" id="editModalLabel">Edit Role</h4>
            </div>
            <div class="modal-body col-md-12">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="role_add" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="role_edit" placeholder=".." />
                            <input type="hidden" id="r_id" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="parent_add" class="col-sm-2 control-label">Parent</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="dept" id="parent_edit">
                                <option value="nan"> -- select one -- </option>
                                <?php if(is_array($roleInfo)): foreach($roleInfo as $key=>$ad): ?><option value="<?php echo ($ad["roid"]); ?>" id="p_<?php echo ($ad["roid"]); ?>"><?php echo str_repeat('&#45;&#45;',$ad['level']*3);?> <?php echo ($ad["roname"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Privilege</label>
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
<script src="/Public/Admin/liger/lib/ligerUI/js/core/base.js" type="text/javascript"></script>
<script src="/Public/Admin/liger/lib/ligerUI/js/plugins/ligerTree.js" type="text/javascript"></script>

<!-- Page-Level Scripts -->
<script>
    var tree;
    $(document).ready(function () {
        var tb = $('.dataTables-example').dataTable({
            "ajax": "<?php echo U('Authority/rolelists');?>",
            "columns": [
                { "data": "roid" },
                { "data": "ropid" },
                { "data": "roname" },
                { "data": null }
            ],
            "columnDefs": [
                {
                    "targets":-1,
                    "render":function(data,type,row,meta) {
                        var roleid = row.roid;
                        var html = '';
                        html += "&nbsp;<a href='javascript:void(0);' class='up btn btn-default btn-xs editrole ' data-toggle=\"modal\" data-target=\"#editModal\"><i class='fa fa-arrow-up'></i>编辑</a><input type='hidden' value='"+roleid+"'/>";
                        html += "&nbsp;<a href='javascript:void(0);' class='down btn btn-default btn-xs delrole'><i class='fa fa-arrow-down'></i>删除</a><input type='hidden' value='"+roleid+"'/>";
                        return html;
                    }
                }
            ]
        });

        /*var arr_data = [
            { id: 1, pid: 0, text: 'president' },
            { id: 2, pid: 1, text: 'technology' },
            { id: 3, pid: 1, text: 'administration' }
        ];*/

        tree = $("#tree1").ligerTree({ checkbox: true });
        treeManager = $("#tree1").ligerGetTreeManager();
        treeManager.collapseAll();

        $('#addModal').on('hidden.bs.modal', function (e) {
            $(this).removeData("bs.modal");
        });
        $('#editModal').on('hidden.bs.modal', function (e) {
            $(this).removeData("bs.modal");
        });

        /******************** 添加role操作 ********************/
        // 提交添加修改
        $('#addbtn').bind('click',function () {
            // 整理数据
            var tree_data = tree.getChecked(),
                privilege = [],
                tmp = '',
                rolename,
                roleparent;
            for(var i in tree_data){
                if (typeof tree_data[i].data.children == 'undefined'){
                    tmp = tree_data[i].data.text;
                    tmp = tmp.substring(0,tmp.indexOf('-'));
                    privilege.push(tmp); // [1,5,6] 权限
                }
            }

            rolename = $('#role_add').val(); // 名称

            var options = $("#parent_add option:selected");
            roleparent = options.val();// 父级 1,2,...,nan
//console.log(privilege);
            // 检验数据合法性
            if (!rolename){
                alert('管理组名称不能为空!');
                return;
            }else if (roleparent == 'nan'){
                alert('请选择上级管理组！');
                return;
            }else if(privilege.length == 0){
                alert('请选择管理组权限！');
                return;
            }

            // 提交后台
            $.ajax({
                url:'/Admin/Authority/insertRole',
                type:'post',
                data:{
                    name:rolename,
                    parent:roleparent,
                    privilege:privilege
                },
                dataType:'json',
                success:function(msg){
                    console.log('okok');
                    $('#addModal').modal('hide');
                },
                error:function(xhr){
                    console.log(xhr);
                }
            });
        });


        tb.on('init.dt',function () {
            /******************** 编辑role操作 ********************/
            $('.editrole').bind('click',function () {
                // 获取roleid
                var roleid = $(this).next().val();
                $('#r_id').val(roleid);

                // 获取该组原信息
                $.ajax({
                    url:"/Admin/Authority/getInfoRid",
                    type:"post",
                    data:{roleid:roleid},
                    dataType:'json',
                    success:function (msg) {
                        if (msg.m === 'ok'){
                            // 显示基本信息
                            $('#role_edit').val(msg.d.roname);
                            $('#p_'+msg.d.ropid).attr('selected','selected');

                            // 获取组织架构树
                            var datas = msg.t,
                                arr_data = [];
                            for(var i in datas){
                                arr_data.push(datas[i]);
                            }

                            tree = $("#tree2").ligerTree({
                                data:arr_data,
                                idFieldName :'id',
                                slide : false,
                                parentIDFieldName :'pid'
                            });
                            treeManager = $("#tree2").ligerGetTreeManager();
                            //treeManager.collapseAll();
                        }else{
                            alert('出错了');
                        }
                    },
                    error:function (xhr) {
                        console.log(xhr);
                    }
                });
            });

            // 提交编辑操作
            $('#editbtn').bind('click',function () {
                // 获取用户填写的信息, 提交给后台, 关闭模态框
                var r_id = $('#r_id').val(),
                    r_name = $('#role_edit').val(),
                    r_parent = $('#parent_edit option:selected').val(),
                    r_priv0 = tree.getChecked();

                var r_priv = r_priv0.map(function(v, i){
                    if (typeof v.data.son == 'undefined'){
                        return v.data.id;
                    }
                });

                // 检查数据合法性
                if (!r_name){
                    alert('管理组名称不能为空');
                    return;
                }else if(r_parent === 'nan'){
                    alert('请选择父级分组');
                    return;
                }else if(r_priv.length == 0){
                    alert('请选择权限');
                    return;
                }

                $.ajax({
                    url:"/Admin/Authority/editRole",
                    type:"post",
                    data:{
                        r_id: r_id,
                        r_name: r_name,
                        r_parent: r_parent,
                        r_priv: r_priv
                    },
                    dataType:'json',
                    success:function (msg) {
                        if (msg.m === 'ok'){
                            $('#editModal').modal('hide');
                        }else{
                            alert('出错了');
                        }
                    },
                    error:function (xhr) {
                        console.log(xhr);
                    }
                });

            });
        });

    });
</script>
<script>
    function editPrivileges(id) {
        location.href = '<?php echo U("Admin/Privileges/index/roleid/'+id+'");?>';
    }
    function delRole(id) {
        alert(id);
    }
</script>
</body>
</html>