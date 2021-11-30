
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
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
    document.getElementById("classtable").style.display = 'block';
});


function ShowManageClassDiv(){
    document.getElementById("classtable").style.display = 'block';
    // document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
    //BindClasses();
}

$('#mngclass').click(function () {
    ShowManageClassDiv();
});
$('#mngrecord').click(function () {
    document.getElementById("classtable").style.display = 'none';
    // document.getElementById("rectable").style.display = 'block';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
    BindRecording();
});
$('#mngassignment').click(function () {
    document.getElementById("classtable").style.display = 'none';
    // document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'block';
    document.getElementById("enrollclass").style.display = 'none';
    //BindAssignments();
});
$('#addclass').click(function () {
    document.getElementById("classtable").style.display = 'none';
    // document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'block';
    BindAssignments();
});
// $("#btnenroll").on("click", function (e) {
//     var code = document.getElementById("code");
//     var subject = document.getElementById("subject");
//     var professor = document.getElementById("professor");
//     var days = document.getElementById("days");
//     var timings = document.getElementById("timings");
//     var Data = {};
//     Data["Subject"] = subject.value;
//     Data["Professor"] = professor.value;
//     Data["Timings"] = timings.value;
//     Data["Days"] = days.value;
//     Data["Code"] = code.value;
//     cdata.push(Data);
//     code.value = "";
//     subject.value = "";
//     professor.value = "";
//     days.value = "";
//     timings.value = "";
//     ShowManageClassDiv();
// });
