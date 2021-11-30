<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
    <style>
                    table {
  border-collapse: separate;
  border-spacing: 0;
}
th,
td {
  padding: 10px 15px;
}
thead {
  background: #395870;
  color: #fff;
}
tbody tr:nth-child(even) {
  background: #f0f0f2;
}
td {
  border-bottom: 1px solid #cecfd5;
  border-right: 1px solid #cecfd5;
}
td:first-child {
  border-left: 1px solid #cecfd5;
}
        </style>
</head>

<body>
    <div id="nav-placeholder" class="nav-container">
    </div>
    <div>
        <div class="container side-nav-container" style="width: 20%; float:left">
            <ul class="side-nav">
                <li id="mngclass"><a href="#"><i class="far fa-calendar-alt" style="padding-right: 8%;"></i>Manage
                        Courses</a></li>
                <li id="mngassignment"><a href="#"><i class="fas fa-laptop-code"
                            style="padding-right: 6%;"></i>Assignments</a></li>
                <li id="addclass"><a href="#"><i class="fas fa-plus" style="padding-right: 6%;"></i>Enroll Course</a>
                </li>
            </ul>
        </div>
        <div style="width: 80%; float:right; padding:2%; padding-top: 5%;">
            <div class="table-responsive table-bordered table-hover customdatatable">
                <div id="classtable">
                    {{-- <table class="display customdatagrid" id="tblClasses" style="width: 100%; height: auto;">
                    </table> --}}
                    <table class="styled-table" style="width: 100%">
                        <thead>
                        <tr>
                                        <th>Course Name</th>
                                        <th>Description</th>
                                        <th>Days</th>
                                        <th>Timings</th>
                                    </tr>
                        </thead>
                        
                        @foreach ($studentCourses as $studentCourse)
                            <tr>
                                <td>{{ $studentCourse->name }}</td>
                                <td>{{ $studentCourse->desc }}</td>
                                <td>{{ $studentCourse->Days }}</td>
                                <td>{{ $studentCourse->Timings }}</td>
                            </tr>        
                        @endforeach
                    </table>
                </div>
                <div id="assgtable">
                    <table>
                        <tr>
                            <td>Assignment Topic</td>
                            <td>Description</td>
                            <td>Due Date</td>
                            <td>Points</td>
                        </tr>
                        @foreach ($assignments as $assignment)
                            <tr>
                                <td>{{ $assignment->Topic }}</td>
                                <td>{{ $assignment->Description }}</td>
                                <td>{{ $assignment->DueDate }}</td>
                                <td>{{ $assignment->Points }}</td>
                            </tr>        
                        @endforeach
                    </table>
                </div>
                <div id="enrollclass" style="height: 70%;">

                <form id="enrollclassform" method="post" action="/student">
                    @csrf
                    <input type="text" name="course" id="courseid" placeholder="Course ID" required="required" maxlength="10"/>
                    <input type="text" name="professor" id="professorid" placeholder="Professor ID" required="required"  maxlength="15"/>
                    <button type="submit" name="btnenroll" id="btnenroll" class="btn btn-primary btn-block btn-large"
                        style="margin-left: 25%; width: 40%;">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/index.js"></script>
<script src="../js/manageclasses.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        // BindClasses();
        // BindAssignments();
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
            { "title": "Points", "data": "ScoredPoint" },
            {
                "data": "Id",
                "render": function (CallLogNumber, type, full, meta) {
                    return '<a href="#" class="btn btn-xs btn-info" onclick="AddEdit(\'' + full.CourseId + '\',\'' + full.Id + '\',\'' + full.Topic + '\',\'' + full.Description + '\',\'' + full.Points + '\')"><i class="fa fa-edit"></i> Submit</a>'
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
            { "width": "15%", "targets": 4 },

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
</script>
</html>