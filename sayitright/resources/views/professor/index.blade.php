<!DOCTYPE html>
<html lang="en">

<head>
    <title>Professor</title>
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
                <li id="mngclass"><a href="#"><i class="far fa-calendar-alt" style="padding-right: 8%;"></i>Manage
                        Courses</a></li>
                <li id="mngstud"><a href="#"><i class="fas fa-users" style="padding-right: 7%;"></i>Manage
                        Students</a></li>
                <!-- <li id="mngrecord"><a href="#"><i class="fas fa-laptop-code" style="padding-right: 6%;"></i>Manage
                        Recordings</a></li> -->
                <li id="mngassignment"><a href="#"><i class="fas fa-laptop-code" style="padding-right: 6%;"></i>Manage
                        Assignments</a></li>
                <li id="addAssg"><a href="#"><i class="fas fa-plus" style="padding-right: 6%;"></i>Add Assignments</a>
                </li>

            </ul>
        </div>
        <div style="width: 80%; float:right; padding:2%; padding-top: 5%;">
            <div class="table-responsive table-bordered table-hover customdatatable">
                <div id="classtable">
                    <table class="display customdatagrid" id="tblClasses" style="width: 100%; height: auto;">
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
                <form id="enrollclassform" method="post" action="/professor">
                    @csrf
                    <input type="text" name="topic" id="topic" placeholder="Assignment Topic" required="required" maxlength="10"/>
                    <input type="text" name="description" id="description" placeholder="Description" required="required" maxlength="15" />
                    <input type="text" name="duedate" id="duedate" placeholder="Due Date" required="required" maxlength="15" />
                    <input type="number" name="points" id="points" placeholder="Points" required="required" maxlength="15" />
                    <input type="text" name="courseId" id="courseId" placeholder="Course Id" required="required" maxlength="10" />
                    <button type="submit" name="btnassignment" id="btnassignment" class="btn btn-primary btn-block btn-large"
                        style="margin-left: 25%; width: 40%;">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/index.js"></script>
<script src="../js/professor.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>

    $(document).ready(function () {
        // BindClasses();
        // BindAssignments();
        // BindStudent();
        // document.getElementById('btnassignmentupd').style.visibility = 'hidden';
        // document.getElementById('id').style.visibility = 'hidden';
    });
    
    function BindAssignments() {
    if ($.fn.DataTable.isDataTable("#tblAssignments")) {
        $('#tblAssignments').DataTable().clear().destroy();
    }
    $('#tblAssignments').DataTable({
        data: assdata,
        columns: [
            { "title": "Course", "data": "Name" },
            { "title": "Topic", "data": "Topic" },
            { "title": "Description", "data": "Description" },
            { "title": "Max Points", "data": "Points" },
            {
                "data": "Id",
                "render": function (CallLogNumber, type, full, meta) {
                    return '<a href="#" class="btn btn-xs btn-info" onclick="AddEdit(\'' + full.Id + '\',\'' + full.DueDate + '\',\'' + full.Topic + '\',\'' + full.Description + '\',\'' + full.Points + '\',\'' + full.CourseId + '\')"><i class="fa fa-edit"></i> Update</a>'
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
            { "width": "15%", "targets": 3 }

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

    function BindClasses() {
    if ($.fn.DataTable.isDataTable("#tblClasses")) {
        $('#tblClasses').DataTable().clear().destroy();
    }
    $('#tblClasses').DataTable({
        data: classdata,
        columns: [
            { "title": "Course", "data": "Name" },
            { "title": "Professor", "data": "ProfName" },
            { "title": "Days", "data": "Days" },
            { "title": "Timings", "data": "Timings" },
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
function AddEdit(Id,DueDate,Topic,Description,Points,CourseId){
    document.getElementById("classtable").style.display = 'none';
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'block';
    document.getElementById("studenttable").style.display = 'none';
    document.getElementById('btnassignmentupd').style.visibility = 'visible';
    document.getElementById('btnassignment').style.visibility = 'hidden';
    var id = document.getElementById('id');
    var topic = document.getElementById('topic');
    var description = document.getElementById('description');
    var duedate = document.getElementById('duedate');
    var points = document.getElementById('points');
    var courseId = document.getElementById('courseId');
    id.value = Id;
    topic.value = Topic;
    description.value = Description;
    duedate.value = DueDate;
    points.value = Points;
    courseId.value = CourseId;
}


</script>
</html>