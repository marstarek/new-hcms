<?php include("./db.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HCMS</title>
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.2.0/css/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- Start Loader -->
    <div class="loader">

    </div>
    <!-- End Loader -->
    <!-- Start Header Section -->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./images/icon1.png" alt="Logo">
                HCMS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li> -->
                </ul>
                <div class='report-name fw-bold d-flex bg-light p-1'>
                    Working Hours Report
                </div>
            </div>
        </div>
    </nav>
    <!-- End Header Section -->
    <!-- Start Params Section -->
    <sction class="mx-2 ">
        <div class="container">
            <div class="row height d-flex justify-content-center align-items-center text-center border p-4">
                <div class="col">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-light" id="basic-addon1"><i class="bi bi-calendar-range"></i></span>
                        <input id="fromPeriod" type="text" class="form-control" placeholder="YYYYMMDD" aria-label="YYYYMMDD" aria-describedby="basic-addon1" maxlength="8">
                        <input id="toPeriod" type="text" class="form-control" placeholder="YYYYMMDD" aria-label="YYYYMMDD" aria-describedby="basic-addon1" maxlength="8">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-light" id="basic-addon2"><i class="bi bi-people"></i></span>
                        <select id="empID" class="form-select form-select-sm" aria-label="Default select example">
                            <option selected disabled>Select Employee</option>
                            <!-- Fetch Users -->
                            <?php
                            $query =
                                "SELECT ID,EmployeeID,Username,DisplayName FROM users";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $ID = $row["ID"];
                                $EmployeeID = $row["EmployeeID"];
                                $UserName = $row["Username"];
                                $DisplayName = $row["DisplayName"];
                                echo "<option value='$EmployeeID'>$EmployeeID|$UserName|$DisplayName";
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <div class="col-3">
                    <div class="d-grid gap-1">
                        <button id="fetchData" type="button" class="btn btn-sm btn-block btn-dark"><i class="bi bi-search"></i> Search</button>
                    </div>
                </div>
            </div>
        </div>
    </sction>
    <!-- End Params Section -->
    <!-- Start Report Section -->
    <section class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table table-hover text-center d-none" id="dataTable">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th>Emp. Name</th>
                                <th>Emp. Code</th>
                                <th>Break Start</th>
                                <th>Break End</th>
                                <th>Break Period</th>
                                <th>Logged In</th>
                                <th>Logged Out</th>
                                <th>Working Period</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- End Report Section -->
</body>
<!-- <script  src="src/js/chart.js"></script> -->
<script src="src/js/jquery-3.6.0.min.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.2.0/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {
        function timestrToSec(timestr) {
            var parts = timestr.toString().split(":");
            if (parts.length == 1) {
                return 0;
            } else {
                return (parts[0] * 3600) +
                    (parts[1] * 60) +
                    (+parts[2]);
            }

        }

        function pad(num) {
            if (num < 10) {
                return "0" + num;
            } else {
                return "" + num;
            }
        }

        function formatTime(seconds) {
            return [pad(Math.floor(seconds / 3600) % 60),
                pad(Math.floor(seconds / 60) % 60),
                pad(seconds % 60),
            ].join(":");
        }
        $(document).on('click', '#fetchData', function() {
            console.log('y');
            $("#dataTable").removeClass("d-none");
            var table = $('#dataTable').DataTable().destroy();
            $('#dataTable').DataTable({
                // serverSide: true,
                processing: true,
                lengthChange: false,
                // buttons: ['copy', 'excel', 'pdf', 'colvis'],
                // buttons: ['copy', 'excel', 'pdf'],
                "dom": 'Blfrtip',
                buttons: [{
                        extend: 'copyHtml5',
                        text: 'Copy <i class="bi bi-clipboard"></i>',
                        titleAttr: 'Copy'
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Excel <i class="bi bi-file-earmark-spreadsheet"></i>',
                        titleAttr: 'Excel'
                    },
                    // {
                    //     extend: 'csvHtml5',
                    //     text: '<i class="fa fa-file-text-o"></i>',
                    //     titleAttr: 'CSV'
                    // },
                    {
                        extend: 'pdfHtml5',
                        text: 'PDF <i class="bi bi-file-earmark-pdf"></i>',
                        titleAttr: 'PDF'
                    }
                ],

                order: [
                    [0, 'desc']
                ],
                rowGroup: {
                    className: 'text-center',
                    startRender: function(rows, group) {
                        return group + ' ' + rows.count() + ' Day(s)';
                    },
                    endRender: function(rows, group) {

                        var breakHours = rows
                            .data()
                            .pluck('Net_Break')
                            .reduce(function(a, b) {
                                console.log(b);
                                // return parseInt(a) + parseInt(b);
                                return formatTime(timestrToSec(a) + timestrToSec(b));

                            }, 0);
                        var workingHours = rows
                            .data()
                            .pluck('Total_Working_Time')
                            .reduce(function(a, b) {
                                console.log(b);
                                // return parseInt(a) + parseInt(b);
                                return formatTime(timestrToSec(a) + timestrToSec(b));

                            }, 0);

                        return $('<tr/>')

                            .append('<td class="text-center fw-bold bg-dark text-light" colspan="3"><i class="bi bi-hourglass"></i> Total Break Hours</td><td class="fw-bold bg-dark text-light">' + breakHours + '</td><td class="text-center fw-bold bg-dark text-light" colspan="2"><i class="bi bi-stopwatch"></i> Total Working Hours</td><td class="fw-bold bg-dark text-light">' + workingHours + '</td>');

                    },
                    dataSrc: "NAME"
                },
                columnDefs: [{
                    targets: [0],
                    visible: false
                }],
                "ajax": {
                    "url": "http://localhost/hcms/working_hours_ajax.php?fetchData",
                    "data": {
                        fromPeriod: ($("#fromPeriod").val() == '') ? '20220101' : $("#fromPeriod").val(),
                        toPeriod: ($("#toPeriod").val() == '') ? '20250101' : $("#toPeriod").val(),
                        empID: ($("#empID").val() == null) ? '%' : $("#empID").val()
                    },
                    "type": "GET"
                },
                "columns": [

                    {
                        data: "NAME"
                    },
                    {
                        data: "Emp_Code"
                    },
                    {
                        data: "break"
                    },
                    {
                        data: "endbreak"
                    },
                    {
                        data: "Net_Break"
                    },
                    {
                        data: "timein"
                    },
                    {
                        data: "timeout"
                    },
                    {
                        data: "Total_Working_Time"
                    }
                ]

            });

            table.buttons().container()
                .appendTo('#dataTable_wrapper .col-md-6:eq(0)');
            $(".dt-buttons").children().removeClass("btn-secondary").addClass("btn-dark")
        });

    });
</script>
<footer class="bg-dark text-light p-2 text-center  fixed-bottom font-small">Made With <i class="bi bi-emoji-kiss-fill"></i> &copy;2022 By Mars </footer>

</html>