<?php
include("./db.php");
if (isset($_GET['fetchData']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $fromPeriod = isset($_GET["fromPeriod"]) ? $_GET["fromPeriod"] : '';
    $toPeriod = isset($_GET["toPeriod"]) ? $_GET["toPeriod"] : '';
    $empID = isset($_GET["empID"]) ? $_GET["empID"] : '';

    $query =
        "SELECT * from sabry2 Where Emp_Code like '$empID' AND DATE_FORMAT(timein,'%Y%m%d') BETWEEN '$fromPeriod' AND '$toPeriod'";
    // echo $query;
    $result = mysqli_query($conn, $query);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data['data'][] = $row;
    }
    echo json_encode($data);
}
