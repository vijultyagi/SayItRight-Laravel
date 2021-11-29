$(document).ready(function () {
    //BindProfessor();
    document.getElementById("studenttable").style.display = 'none';
    document.getElementById("reports").style.display = 'none';
});
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',

    data: {
        datasets: [{
            label: '2020',
            data: [1, 2, 3, 2, 3, 2, 3, 2, 1, 2, 1, 2, 3, 2, 1, 2, 1, 2, 1, 2, 1, 0],
            borderWidth: 1,
            borderColor: [
                'rgba(54, 162, 235, 1)',
            ],
            backgroundColor: [
                'transparent',
            ],

        },
        {
            label: '2021',
            data: [1, 2, 3, 2, 3, 4, 3, 2, 3, 4, 5, 4, 3, 2, 1, 2, 3, 4, 3, 2, 1, 0],
            borderColor: [
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            backgroundColor: [
                'transparent',
            ],
        }
        ],

        labels: [0, 1, 2, 2, 3, 3, 4, 4, 4, 5, 5, 6, 7, 7, 7, 8, 8, 9, 9, 10, 10, 10]
    },
    options: {
        maintainAspectRatio: false,
        legend: {
            position: "top",
            align: "end",

        },
        scales: {
            yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'GPA'
                }
            }],
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'Students'
                }
            }]
        }
    }
});
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
        "Code": "001",
        "Name": "Yogeshwar",
        "Timings": "5:30 - 6:50 pm",
        "Days": "Tuesday, Thursday",
        "Office Hours": "5:30 - 6:50 pm",
    },
    {
        "Code": "002",
        "Name": "Sai",
        "Timings": "5:30 - 6:50 pm",
        "Days": "Tuesday, Thursday",
        "Office Hours": "5:30 - 6:50 pm",
    },
    {
        "Code": "003",
        "Name": "Saksham",
        "Timings": "5:30 - 6:50 pm",
        "Days": "Tuesday, Thursday",
        "Office Hours": "5:30 - 6:50 pm",
    }
];

function BindProfessor() {
    if ($.fn.DataTable.isDataTable("#tblprof")) {
        $('#tblprof').DataTable().clear().destroy();
    }
    $('#tblprof').DataTable({
        data: pdata,
        columns: [
            { "title": "Subject", "data": "Subject" },
            { "title": "Name", "data": "Name" },
            { "title": "Office Hours", "data": "Office Hours" },
            { "title": "Days", "data": "Days" },
            { "title": "Room", "data": "Room" },
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

function BindStudents() {
    if ($.fn.DataTable.isDataTable("#tblStudent")) {
        $('#tblStudent').DataTable().clear().destroy();
    }
    $('#tblStudent').DataTable({
        data: sdata,
        columns: [
            { "title": "Code", "data": "Code" },
            { "title": "Name", "data": "Name" },
            { "title": "Days", "data": "Days" },
            { "title": "Timings", "data": "Timings" },
            { "title": "Office Hours", "data": "Office Hours" },
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



$('#mngProf').click(function () {
    document.getElementById("professortable").style.display = 'block';
    document.getElementById("studenttable").style.display = 'none';
    document.getElementById("reports").style.display = 'none';
    BindProfessor();
});

$('#mngstud').click(function () {
    document.getElementById("professortable").style.display = 'none';
    document.getElementById("studenttable").style.display = 'block';
    document.getElementById("reports").style.display = 'none';
    //BindStudents();
});

$('#mngreports').click(function () {
    document.getElementById("professortable").style.display = 'none';
    document.getElementById("studenttable").style.display = 'none';
    document.getElementById("reports").style.display = 'block';
    //BindStudents();
});


