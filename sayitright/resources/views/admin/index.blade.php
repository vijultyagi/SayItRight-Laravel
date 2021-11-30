<!DOCTYPE html>
<html lang="en">

<head>
    <title>Super-Admin</title>
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

                <li id="mngProf"><a href="#"><i class="far fa-calendar-alt" style="padding-right: 8%;"></i>Manage
                        Professor</a></li>
                <li id="mngstud"><a href="#"><i class="fas fa-users" style="padding-right: 7%;"></i>Manage
                        Advisor</a></li>
                <li id="mngreports"><a href="#"><i class="fas fa-users" style="padding-right: 7%;"></i>Manage
                        Reports</a></li>


            </ul>
        </div>
        <div style="width: 80%; float:right; padding:2%; padding-top: 5%;">
            <div class="table-responsive table-bordered table-hover customdatatable">

                <div id="professortable">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>Phone No.</td>
                            <td>Email</td>
                            <td>Address</td>
                        </tr>
                        @foreach ($professors as $professor)
                            <tr>
                                <td>{{ $professor->Name }}</td>
                                <td>{{ $professor->PhoneNo }}</td>
                                <td>{{ $professor->Email }}</td>
                                <td>{{ $professor->Address }}</td>
                            </tr>        
                        @endforeach
                    </table>
                </div>
                <div id="studenttable">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>Phone No.</td>
                            <td>Email</td>
                            <td>Address</td>
                        </tr>
                        @foreach ($advisors as $advisor)
                            <tr>
                                <td>{{ $advisor->Name }}</td>
                                <td>{{ $advisor->PhoneNo }}</td>
                                <td>{{ $advisor->Email }}</td>
                                <td>{{ $advisor->Address }}</td>
                            </tr>        
                        @endforeach
                    </table>
                </div>
                <div id="reports">
                    <canvas id="myChart" width="200" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
    function GetProfData(){
        $host = "51.81.160.136";
        $userName = "vks9135_vishal";
        $password = "Arlington@2021";
        $dbName = "vks9135_SayItRight";
    
    $conn = new mysqli($host, $userName, $password, $dbName);
    
        $sql_query = "select * from Users where UserType=2";
        $result = mysqli_query($conn,$sql_query);
        $emparray = array();
        while($row =mysqli_fetch_assoc($result))
        {
            $emparray[] = $row;
        }
        return json_encode($emparray);
    }

    function GetAdvData(){
        $host = "51.81.160.136";
        $userName = "vks9135_vishal";
        $password = "Arlington@2021";
        $dbName = "vks9135_SayItRight";
    
    $conn = new mysqli($host, $userName, $password, $dbName);
    
        $sql_query = "select * from Users where UserType=3";
        $result = mysqli_query($conn,$sql_query);
        $emparray = array();
        while($row =mysqli_fetch_assoc($result))
        {
            $emparray[] = $row;
        }
        return json_encode($emparray);
    }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script src="../js/index.js"></script>
<script src="../js/admin.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>

    $(document).ready(function () {
        // BindProfessor();
        // BindAdvisor();
        // document.getElementById('id').style.visibility = 'hidden';
    });

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

    function BindAdvisor() {

        if ($.fn.DataTable.isDataTable("#tblAdvisor")) {
            $('#tblAdvisor').DataTable().clear().destroy();
        }
        $('#tblAdvisor').DataTable({
            data: advdata,
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

</script>
</html>