<!DOCTYPE html>
<html lang="en">

<head>
    <title>Advisor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
</head>

<body>
    <div id="nav-placeholder" class="nav-container">
    </div>
    <div>
        <div class="container side-nav-container" style="width: 20%; float:left">
            <ul class="side-nav">
                <li id="mngProf"><a href="#"><i class="far fa-calendar-alt" style="padding-right: 8%;"></i>Professors
                        </a></li>
                <li id="mngstud"><a href="#"><i class="fas fa-users" style="padding-right: 7%;"></i>Students
                        </a></li>
                <li id="mngassignment"><a href="#"><i class="fas fa-laptop-code" style="padding-right: 6%;"></i>Manage
                        Courses</a></li>
                <li id="addAssg"><a href="#"><i class="fas fa-plus" style="padding-right: 6%;"></i>Add Course</a>
                </li>

            </ul>
        </div>
        <div style="width: 80%; float:right; padding:2%; padding-top: 5%;">
            <div class="table-responsive table-bordered table-hover customdatatable">
                <div id="classtable">
                    <table class="display customdatagrid" id="tblClasses" style="width: 100%; height: auto;">
                    </table>
                </div>
                <div id="professortable">
                    <table class="display customdatagrid" id="tblprof" style="width: 100%; height: auto;">
                    </table>
                </div>
                <div id="studenttable">
                    <table class="display customdatagrid" id="tblStudent" style="width: 100%; height: auto;">
                    </table>
                </div>
                <div id="rectable">
                    <table class="display customdatagrid" id="tblRecordings" style="width: 100%; height: auto">
                    </table>
                </div>
                <div id="assgtable">
                    <table class="display customdatagrid" id="tblAssignments" style="width: 100%; height: auto;">
                    </table>
                </div>
                <div id="enrollclass" style="height: 70%;">
                <form id="enrollclassform" method="post" action="/advisor">
                    @csrf
                    <input type="text" name="name" id="name" placeholder="Course Name" required="required" />
                    <input type="text" name="description" id="description" placeholder="Description" required="required" />
                    <input type="text" name="days" id="days" placeholder="Days" required="required" />
                    <input type="text" name="timings" id="timings" placeholder="Timings" required="required" />
                    <button type="submit" name="btncourse" id="btncourse" class="btn btn-primary btn-block btn-large"
                        style="margin-left: 25%; width: 40%;">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/index.js"></script>
<script src="../js/advisor.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        // BindClasses();
        // BindStudent();
        // BindProfessor();
        // document.getElementById('btncourseupd').style.visibility = 'hidden';
        // document.getElementById('id').style.visibility = 'hidden';
    });
    
    function BindClasses() {


if ($.fn.DataTable.isDataTable("#tblAssignments")) {
    $('#tblAssignments').DataTable().clear().destroy();
}
$('#tblAssignments').DataTable({
    data: classdata,
    columns: [
        { "title": "Course", "data": "Name" },
        { "title": "Description", "data": "Description" },
        { "title": "Days", "data": "Days" },
        { "title": "Timings", "data": "Timings" },
        {
                "data": "Id",
                "render": function (CallLogNumber, type, full, meta) {
                    return '<a href="#" class="btn btn-xs btn-info" onclick="AddEdit(\'' + full.Id + '\',\'' + full.Name + '\',\'' + full.Description + '\',\'' + full.Days + '\',\'' + full.Timings + '\')"><i class="fa fa-edit"></i> Edit</a>'
                }
            }
    ],
    lengthMenu: [
        [5, 10, 15, 20, -1],
        [5, 10, 15, 20, "All"]],
    columnDefs: [
        { "width": "15%", "targets": 0 },
        { "width": "15%", "targets": 1 },
        { "width": "15%", "targets": 2 },
        { "width": "15%", "targets": 3 },

    ],
    "aaSorting": [],
    scrollY: "295px",
    scrollX: true,
    retrieve: true,
    fixedHeader: true,
    "createdRow": function (row, data, dataIndex) {
        $(row).addClass('newrow');
    },
    initComplete: function () {
        $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off');
    },
    fixedColumns: {
        leftColumns: 1,
        rightColumns: 2
    },
    search: {
        search: ""
    },
    ordering: false
});

}

function BindProfessor() {


if ($.fn.DataTable.isDataTable("#tblprof")) {
    $('#tblprof').DataTable().clear().destroy();
}
$('#tblprof').DataTable({
    data: profdata,
    columns: [
        { "title": "Name", "data": "Name" },
        { "title": "PhoneNo", "data": "PhoneNo" },
        { "title": "Email", "data": "Email" },
        { "title": "Address", "data": "Address" },
    ],
    lengthMenu: [
        [5, 10, 15, 20, -1],
        [5, 10, 15, 20, "All"]],
    columnDefs: [
        { "width": "15%", "targets": 0 },
        { "width": "15%", "targets": 1 },
        { "width": "15%", "targets": 2 },
        { "width": "15%", "targets": 3 },

    ],
    "aaSorting": [],
    scrollY: "295px",
    scrollX: true,
    retrieve: true,
    fixedHeader: true,
    "createdRow": function (row, data, dataIndex) {
        $(row).addClass('newrow');
    },
    initComplete: function () {
        $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off');
    },
    fixedColumns: {
        leftColumns: 1,
        rightColumns: 2
    },
    search: {
        search: ""
    },
    ordering: false
});

}

function BindStudent() {


if ($.fn.DataTable.isDataTable("#tblStudent")) {
    $('#tblStudent').DataTable().clear().destroy();
}
$('#tblStudent').DataTable({
    data: studdata,
    columns: [
        { "title": "Name", "data": "Name" },
        { "title": "PhoneNo", "data": "PhoneNo" },
        { "title": "Email", "data": "Email" },
        { "title": "Address", "data": "Address" },
    ],
    lengthMenu: [
        [5, 10, 15, 20, -1],
        [5, 10, 15, 20, "All"]],
    columnDefs: [
        { "width": "15%", "targets": 0 },
        { "width": "15%", "targets": 1 },
        { "width": "15%", "targets": 2 },
        { "width": "15%", "targets": 3 },

    ],
    "aaSorting": [],
    scrollY: "295px",
    scrollX: true,
    retrieve: true,
    fixedHeader: true,
    "createdRow": function (row, data, dataIndex) {
        $(row).addClass('newrow');
    },
    initComplete: function () {
        $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off');
    },
    fixedColumns: {
        leftColumns: 1,
        rightColumns: 2
    },
    search: {
        search: ""
    },
    ordering: false
});

}

function AddEdit(Id,Name,Description,Days,Timings){
    
    document.getElementById("classtable").style.display = 'none';
    document.getElementById("professortable").style.display = 'none';
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'block';
    document.getElementById("studenttable").style.display = 'none';
    document.getElementById('btncourseupd').style.visibility = 'visible';
    document.getElementById('btncourse').style.visibility = 'hidden';
    var id = document.getElementById('id');
    var name = document.getElementById('name');
    var description = document.getElementById('description');
    var days = document.getElementById('days');
    var timings = document.getElementById('timings');
    id.value = Id;
    name.value = Name;
    description.value = Description;
    days.value = Days;
    timings.value = Timings;
}
</script>
</html>