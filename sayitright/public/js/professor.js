
var cdata = [
    {
        "Subject": "Web Data Management",
        "Students": "80",
        "Timings": "5:30 - 6:50 pm",
        "Days": "Tuesday, Thursday",
        "Code": "CSE-5360"
    },
    {
        "Subject": "Advanced Javascript",
        "Students": "80",
        "Timings": "5:30 - 6:50 pm",
        "Days": "Monday, Wednesday",
        "Code": "CSE-5361"
    }
];
var sdata = [
    {
        "Subject": "Web Data Management",
        "Name": "Vishal",
        "Timings": "5:30 - 6:50 pm",
        "Days": "Tuesday, Thursday",
        "Code": "CSE-5360"
    },
    {
        "Subject": "Web Data Management",
        "Name": "Vijul",
        "Timings": "5:30 - 6:50 pm",
        "Days": "Tuesday, Thursday",
        "Code": "CSE-5360"
    },
    {
        "Subject": "Advanced Javascript",
        "Name": "Vishal",
        "Timings": "5:30 - 6:50 pm",
        "Days": "Monday, Wednesday",
        "Code": "CSE-5361"
    }
];
var rdata = [
    {
        "Subject": "Web Data Management",
        "Professor": "Prof. Diaz",
        "Timings": "Recording Link",
        "Days": "Tuesday, Thursday",
        "Code": "CSE-5360"
    }
];
var adata = [
    {
        "Subject": "Web Data Management",
        "Due Date": "Nov'20, 2021",
        "Code": "5360",
        "Assignment": "Project 1",
        "Weightage": "100"
    },
    {
        "Subject": "Advance Javascript",
        "Due Date": "Nov'2, 2021",
        "Code": "5361",
        "Assignment": "Project 1",
        "Weightage": "100"
    }
];
$(document).ready(function () {
    //BindClasses();
    //document.getElementById("studenttable").style.display = 'none';
    // document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
});

function BindClasses() {
    if ($.fn.DataTable.isDataTable("#tblClasses")) {
        $('#tblClasses').DataTable().clear().destroy();
    }


    $('#tblClasses').DataTable({
        data: cdata,
        columns: [
            { "title": "Code", "data": "Code" },
            { "title": "Subject", "data": "Subject" },
            { "title": "Students", "data": "Students" },
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
function BindRecording() {
    if ($.fn.DataTable.isDataTable("#tblRecordings")) {
        $('#tblRecordings').DataTable().clear().destroy();
    }
    $('#tblRecordings').DataTable({
        data: rdata,
        columns: [
            { "title": "Code", "data": "Code" },
            { "title": "Subject", "data": "Subject" },
            { "title": "Professor", "data": "Professor" },
            { "title": "Date", "data": "Days" },
            { "title": "Link", "data": "Timings" },
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

// function BindStudents() {
//     if ($.fn.DataTable.isDataTable("#tblStudent")) {
//         $('#tblStudent').DataTable().clear().destroy();
//     }
//     $('#tblStudent').DataTable({
//         data: sdata,
//         columns: [
//             { "title": "Code", "data": "Code" },
//             { "title": "Subject", "data": "Subject" },
//             { "title": "Name", "data": "Name" },
//             { "title": "Days", "data": "Days" },
//             { "title": "Timings", "data": "Timings" },
//         ],
//         lengthMenu: [
//             [5, 10, 15, 20, -1],
//             [5, 10, 15, 20, "All"]],
//         columnDefs: [
//             { "width": "15%", "targets": 0 },
//             { "width": "15%", "targets": 1 },
//             { "width": "15%", "targets": 2 },
//             { "width": "15%", "targets": 3 },
//             { "width": "15%", "targets": 4 },

//         ],
//         "aaSorting": [],
//         scrollY: "295px",
//         scrollX: true,
//         retrieve: true,
//         fixedHeader: true,
//         "createdRow": function (row, data, dataIndex) {
//             $(row).addClass('newrow');
//         },
//         initComplete: function () {
//             $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off');
//         },
//         fixedColumns: {
//             leftColumns: 1,
//             rightColumns: 2
//         },
//         search: {
//             search: ""
//         },
//         ordering: false
//     });

// }
function BindAssignments() {
    if ($.fn.DataTable.isDataTable("#tblAssignments")) {
        $('#tblAssignments').DataTable().clear().destroy();
    }
    $('#tblAssignments').DataTable({
        data: adata,
        columns: [
            { "title": "Code", "data": "Code" },
            { "title": "Subject", "data": "Subject" },
            { "title": "Due Date", "data": "Due Date" },
            { "title": "Assignment", "data": "Assignment" },
            { "title": "Weightage", "data": "Weightage" },
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

$('#mngclass').click(function () {
    document.getElementById("classtable").style.display = 'block';
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
    document.getElementById("studenttable").style.display = 'none';
    BindClasses();
});
$('#mngrecord').click(function () {
    document.getElementById("classtable").style.display = 'none';
    document.getElementById("rectable").style.display = 'block';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
    document.getElementById("studenttable").style.display = 'none';
    BindRecording();
});
$('#mngassignment').click(function () {
    ShowAssignmentDiv();
});
$('#mngstud').click(function () {
    document.getElementById("classtable").style.display = 'none';
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
    document.getElementById("studenttable").style.display = 'block';
    //BindStudents();
});
$('#addAssg').click(function () {
    document.getElementById("classtable").style.display = 'none';
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'block';
    document.getElementById("studenttable").style.display = 'none';
    BindAssignments();
});
$("#btnassignment").on("click", function (e) {
    var code = document.getElementById("code");
    var subject = document.getElementById("subject");
    var duedate = document.getElementById("duedate");
    var assignment = document.getElementById("assignment");
    var weightage = document.getElementById("weightage");
    var Data = {};
    Data["Subject"] = subject.value;
    Data["Due Date"] = duedate.value;
    Data["Code"] = code.value;
    Data["Assignment"] = assignment.value;
    Data["Weightage"] = weightage.value;
    adata.push(Data);
    code.value = "";
    subject.value = "";
    duedate.value = "";
    assignment.value = "";
    weightage.value = "";
    ShowAssignmentDiv();
});

function ShowAssignmentDiv(){
    document.getElementById("classtable").style.display = 'none';
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'block';
    document.getElementById("enrollclass").style.display = 'none';
    document.getElementById("studenttable").style.display = 'none';
    BindAssignments();
}
