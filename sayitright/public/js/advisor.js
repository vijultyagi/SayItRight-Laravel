
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

var pdata = [
    {
        "Subject": "Web Data Management",
        "Name": "Vishal",
        "Office Hours": "5:30 - 6:50 pm",
        "Days": "Tuesday, Thursday",
        "Room": "ERB-221"
    },
    {
        "Subject": "Advanced JS",
        "Name": "Vijul",
        "Office Hours": "5:30 - 6:50 pm",
        "Days": "Tuesday, Thursday",
        "Room": "ERB-222"
    },
    {
        "Subject": "Angular",
        "Name": "Piyush",
        "Office Hours": "5:30 - 6:50 pm",
        "Days": "Tuesday, Thursday",
        "Room": "ERB-223"
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
    document.getElementById("studenttable").style.display = 'none';
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
    document.getElementById("professortable").style.display = 'none';
});



$('#mngclass').click(function () {
    document.getElementById("classtable").style.display = 'block';
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
    document.getElementById("studenttable").style.display = 'none';
    document.getElementById("professortable").style.display = 'none';
    //BindClasses();
});
$('#mngProf').click(function () {
    document.getElementById("classtable").style.display = 'block';
    document.getElementById("professortable").style.display = 'none';
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
    document.getElementById("studenttable").style.display = 'none';
    //BindProfessor();
});
$('#mngrecord').click(function () {
    document.getElementById("classtable").style.display = 'none';
    document.getElementById("professortable").style.display = 'none';
    document.getElementById("rectable").style.display = 'block';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
    document.getElementById("studenttable").style.display = 'none';
    //BindRecording();
});
$('#mngassignment').click(function () {
    ShowAssignmentDiv();
});
$('#mngstud').click(function () {
    document.getElementById("classtable").style.display = 'none';
    document.getElementById("professortable").style.display = 'none';
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
    document.getElementById("studenttable").style.display = 'block';
    //BindStudents();
});
$('#addAssg').click(function () {
    document.getElementById("classtable").style.display = 'none';
    document.getElementById("professortable").style.display = 'none';
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'block';
    document.getElementById("studenttable").style.display = 'none';
    
    //BindAssignments();
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
    //ShowAssignmentDiv();
});

function ShowAssignmentDiv(){
    document.getElementById("classtable").style.display = 'none';
    document.getElementById("professortable").style.display = 'block';
    document.getElementById("rectable").style.display = 'none';
    document.getElementById("assgtable").style.display = 'none';
    document.getElementById("enrollclass").style.display = 'none';
    document.getElementById("studenttable").style.display = 'none';
    //BindAssignments();
}