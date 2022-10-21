<?php
session_start();
if (isset($_SESSION['LoggedIn']) == true) {
    header('Location:timer.php');
}
$conn = mysqli_connect('localhost', 'root', null, 'hr-01');
if (!$conn) {
    echo mysqli_connect_error();
    exit();
}
$username = empty($_POST['Username'])
    ? ''
    : mysqli_escape_string($conn, $_POST['Username']);
$password = empty($_POST['password']) ? '' : md5($_POST['password']);
$query =
    "SELECT * FROM `users`WHERE `Username`='" .
    $username .
    "'and `Password`='" .
    $password .
    "'   LIMIT 1";
$result = mysqli_query($conn, $query);
// var_dump($result);
if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['LoggedIn'] = true;
    $_SESSION['ID'] = $row['ID'];
    $_SESSION['Username'] = $row['Username'];
    $_SESSION['DisplayName'] = $row['DisplayName'];
    $_SESSION['EmployeeID'] = $row['EmployeeID'];
    $_SESSION['logindate'] = date('Y-m-d h:i:sa');
    $_SESSION['leadername'] = $row['leadername'];
    $ffl = $row['EmployeeID'];
    // Check If 24 Hours Passed After User First Login To Create New Record
    $checkQuery = "select CASE WHEN HOUR(timediff(sysdate(),timein)) >= '18' THEN 'Passed' ELSE 'NotPassed' END AS checkResult FROM trans WHERE code = $ffl order by id desc limit 1;";
    $checkQueryExecute = mysqli_query($conn, $checkQuery);
    $checkQueryFetch = mysqli_fetch_assoc($checkQueryExecute);
    // var_dump($checkQuery);
    // exit();
    $idquery = "SELECT id  FROM `trans` WHERE  code = $ffl ORDER BY ID DESC LIMIT 1";
    $idresult = mysqli_query($conn, $idquery);
    $dd = "SELECT id  FROM `trans` WHERE  code = $ffl ORDER BY ID DESC LIMIT 1";
    $ff = mysqli_query($conn, $dd);
    $cc = mysqli_fetch_assoc($ff);
    if ($idresult->num_rows !== 1) { // Check If There's no Record
        $startquery =
            "INSERT INTO `trans` (`name`,`code`,`timein`,`timeout`,`break`,`workingon`,`status`,`endbreak`) VALUES
        ('" .
            $_SESSION['DisplayName'] .
            "' , '" .
            $_SESSION['EmployeeID'] . "' ,SYSDATE(),'" . '0' . "','" . '0' . "','" . '0' . "','" .
            '0' .
            "','" .
            '0' .
            "')";
        // echo $startquery;
        // exit();
        mysqli_query($conn, $startquery);
        //  echo $dd;exit();
        //  var_dump($cc['id']);exit();
        if (!isset($_SESSION['transId'])) {
            $_SESSION['transId'] = $cc['id'];
        }
    } else {
        echo 'already checked in';
        if ($checkQueryFetch['checkResult'] == 'Passed') {
            $startquery =
                "INSERT INTO `trans` (`name`,`code`,`timein`) VALUES
        ('" .
                $_SESSION['DisplayName'] .
                "' , '" .
                $_SESSION['EmployeeID'] .
                "' ,SYSDATE()" .
                // 'null' .
                // "','" .
                // 'null' .
                // "','" .
                // 'null' .
                // "','" .
                // 'null' .
                // "','" .
                // 'null' .
                ")";
            // echo $startquery;
            // exit();
            mysqli_query($conn, $startquery);
            //  echo $dd;exit();
            //  var_dump($cc['id']);exit();
            $dd = "SELECT id  FROM `trans` WHERE  code = $ffl ORDER BY ID DESC LIMIT 1";
            $ff = mysqli_query($conn, $dd);
            $cc = mysqli_fetch_assoc($ff);
            $_SESSION['transId'] = $cc['id'];

            if (!isset($_SESSION['transId'])) {
                $_SESSION['transId'] = $cc['id'];
            }
        } else {
            if (!isset($_SESSION['transId'])) {
                $_SESSION['transId'] = $cc['id'];
            }
        }
    }

    header('Location:./timer.php');


    exit();
} else {

    // echo 'error';
}

mysqli_free_result($result);
mysqli_close($conn);
?>



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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <?php if (isset($error)) {
        // echo $error;
    } ?>



    <main>
        <div class="container p-5 ">
            <div class="text-center" style="border-radius: .6875rem;margin: 0 auto;width: 40%;padding: 1.875rem;box-shadow: rgba(0, 0, 0, 0.2) 0rem 1.125rem 3.125rem -0.625rem;">
                <div class="  d-flex justify-content-center  align-items-center flex-column">
                    <img src="./images/1597256885097.jfif" alt="">
                </div>

                <form action="login.php" method="Post" class="text-center">
                    <!-- start username -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" type="Username" name="Username" id="Username" placeholder="enter your User name" value="<?= isset($_POST['Username']) ? $_POST['Username'] : '' ?>" required>
                        <label for="floatingInput">User Name</label>
                    </div>

                    <!--  start password -->

                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" type="password" name="password" id="password" placeholder="enter your password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" required>
                        <label for="floatingPassword" type="password" name="password">Password</label>
                    </div>
                    <!--  end password -->

                    <div class=" pt-4 d-flex justify-content-center  align-items-center flex-column">
                        <button class="btn btn-primary py-2 px-3" type="submit" name="submit" value="login">Login</button>
                </form>
            </div>
        </div>
        </div>
    </main>
</body>
<!-- <script  src="src/js/chart.js"></script> -->
<script src="src/js/jquery-3.6.0.min.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/bootstrap.bundle.min.js"></script>

</html>