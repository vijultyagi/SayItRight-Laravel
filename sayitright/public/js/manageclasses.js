
var cdata = [
    {
        "Subject": "Web Data Management",
        "Professor": "Prof. Diaz",
        "Timings": "5:30 - 6:50 pm",
        "Days": "Tuesday, Thursday",
        "Code": "CSE-5360"
    }
];
var rdata = [
    {
        "Subject": "Web Data Management",
        "Professor": "Prof. Diaz",
        "Timings": "5:30 - 6:50 pm",
        "Days": "Tuesday, Thursday",
        "Code": "CSE-5360"
    }
];
var adata = [
    {
        "Subject": "Web Data Management",
        "Professor": "Prof. Diaz",
        "Code": "5360",
        "Assignment": "Project 1",
        "Grade": "A"
    }
];

$(document).ready(function () {
    //BindClasses();
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
});

// function BindClasses() {


//     if ($.fn.DataTable.isDataTable("#tblClasses")) {
//         $('#tblClasses').DataTable().clear().destroy();
//     }


//     $('#tblClasses').DataTable({
//         data: cdata,
//         columns: [
//             { "title": "Code", "data": "Code" },
//             { "title": "Subject", "data": "Subject" },
//             { "title": "Professor", "data": "Professor" },
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

function ShowManageClassDiv(){
    document.getElementById("classtable").style.display = 'block';
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
    //BindClasses();
}

$('#mngclass').click(function () {
    ShowManageClassDiv();
});
$('#mngrecord').click(function () {
    document.getElementById("classtable").style.display = 'none';
    document.getElementById("rectable").style.display = 'block';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
    BindRecording();
});
$('#mngassignment').click(function () {
    document.getElementById("classtable").style.display = 'none';
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'block';
    document.getElementById("enrollclass").style.display = 'none';
    //BindAssignments();
});
$('#addclass').click(function () {
    document.getElementById("classtable").style.display = 'none';
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'block';
    BindAssignments();
});
$("#btnenroll").on("click", function (e) {
    var code = document.getElementById("code");
    var subject = document.getElementById("subject");
    var professor = document.getElementById("professor");
    var days = document.getElementById("days");
    var timings = document.getElementById("timings");
    var Data = {};
    Data["Subject"] = subject.value;
    Data["Professor"] = professor.value;
    Data["Timings"] = timings.value;
    Data["Days"] = days.value;
    Data["Code"] = code.value;
    cdata.push(Data);
    code.value = "";
    subject.value = "";
    professor.value = "";
    days.value = "";
    timings.value = "";
    ShowManageClassDiv();
});
