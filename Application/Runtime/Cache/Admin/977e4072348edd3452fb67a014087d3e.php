<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>数据表格</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/Public/Admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/Public/Admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/Public/Admin/css/animate.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <!-- 筛选条件 -->
            <form class="form-horizontal" role="form" method="POST" autocomplete="off">
                <div class="col-md-12 form-group">

                    <label class="col-md-2 control-label"> 时间段 </label>
                    <div class="col-md-2" style="width: 200px;">
                        <div class="input-group">
                            <input class="form-control" placeholder="yyyy-mm-dd"
                                   id="start" name="start" type="text" />
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <div style="text-align: center;line-height: 30px;width: 85px;" class="col-md-1 p-0 m-0"> 至 </div>
                    <div class="col-md-2" style="width: 200px;">
                        <div class="input-group">
                            <input class="form-control" placeholder="yyyy-mm-dd"
                                   id="end" name="end" type="text"/>
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button id="sbm" type="button" class="btn btn-primary waves-effect waves-light m-b-5"> 查 询 </button>
                    </div>

                </div>
                <input type="hidden" id="typeid" value="1"/>
            </form>

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>操作系统信息</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <tbody>
                        <tr class="gradeX">
                            <td width='20%'>系统版本</td>
                            <td>V1.0</td>
                        </tr>
                        <tr class="gradeX">
                            <td>操作系统</td>
                            <td><?php echo ($os); ?></td>
                        </tr>
                        <tr class="gradeX">
                            <td>PHP版本</td>
                            <td><?php echo ($version); ?></td>
                        </tr>
                        <tr class="gradeX">
                            <td>运行方式</td>
                            <td><?php echo ($sapi); ?></td>
                        </tr>
                        <tr class="gradeX">
                            <td>数据库</td>
                            <td><?php echo ($mysql); ?></td>
                        </tr>
                        <tr class="gradeX">
                            <td>ThinkPHP版本</td>
                            <td><?php echo ($tp); ?></td>
                        </tr>
                        <tr class="gradeX">
                            <td>最大上传附件</td>
                            <td><?php echo ($uploadmax); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 全局js -->
<script src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/Public/Admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/Public/Admin/js/plugins/jeditable/jquery.jeditable.js"></script>

<!-- Data Tables -->
<script src="/Public/Admin/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="/Public/Admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>

<!-- 自定义js -->
<script src="/Public/Admin/js/content.js?v=1.0.0"></script>
<script src="/Public/Admin/js/bootstrap-datetimepicker.min.js"></script>
<script src="/Public/Admin/js/bootstrap-datetimepicker.zh-CN.js"></script>

</body>
</html>

<script type="text/javascript">
    $(function () {
        var stt = $('#start'),
            end = $('#end');
        // datepicker
        stt.datetimepicker({
            format: 'yyyy-mm-dd',
            language:'zh-CN',
            minView:'month'
        });
        end.datetimepicker({
            format: 'yyyy-mm-dd',
            language:'zh-CN',
            minView:'month'
        });
    });
</script>