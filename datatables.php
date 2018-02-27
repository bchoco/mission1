<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>datatables</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
     
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
     
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>

    <style type="text/css">
        #example {text-align:center;}
    </style>
</head>
<body>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
                <th></th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
                <th></th>
            </tr>
        </tfoot>
    </table>

    <script>
    function editRow(id) {
        alert(id);
    }
    function delRow(id) {
        alert(id);
    }
    //var data = ["Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011/04/25", "$3,120"];
    $(function(){
        var table = $('#example').dataTable({
            "ajax":"data.txt",
            //"ordering":false,
            "columns": [
                { "data": null, title:'<input type="checkbox" id="checkall" />'},
                { "data": "name" },
                { "data": "position" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "start_date" },
                { "data": "salary" },
                { "data": null, title:'操作'}
            ],
            "columnDefs": [{
                    "targets": 0,
                    "orderable": false,
                    "render": function(data,type,row,meta) {
                        return "<input type='checkbox' name='id[]' value='"+row.name+"' />";
                    },
                },
                {
                    "targets":-1,
                    "orderable": false,
                    "render": function(data,type,row,meta) {
                        var id = row.extn;
                        var html = "";
                        html += "&nbsp;<button onclick='editRow("+ id + ")'>编辑</button>";
                        html += "&nbsp;<button onclick='delRow("+ id + ")'>删除</button>";
                        return html;
                    }
                }
            ]
        });
    });
    </script>
</body>
</html>