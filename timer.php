        <?php
        session_start();
        include_once './db.php';
var_dump($_SESSION);
       
        $loginDate = $_SESSION['logindate'];
        $empcode = $_SESSION['EmployeeID'];
        $sessionTransID = $_SESSION['ID'];

        $qr = "SELECT *  FROM `trans` WHERE code = $empcode ";
        $qrresult = mysqli_query($conn, $qr);
        $timeinquary = "SELECT timein  FROM `trans` WHERE code = $empcode ";
        $timeinresult = mysqli_query($conn, $timeinquary);
        $daterow = mysqli_fetch_assoc($timeinresult);
        // $curdate = date('Y-m-d');
        // $loginDatenew = strtotime($loginDate);
        // $dateresult = date('Y-m-d',$loginDatenew);
        // $databasedate = ($daterow["timein"]);
        // $dateresultx = date('Y-m-d H:i:s',$databasedate);
        //   var_dump($databasedate);
        // var_dump($loginDate);
        // $ad = strtotime($loginDate);
        // echo $ad."\n";

        // $dt = new DateTime("$loginDate");
        // echo $dt->format('Y-m-d H:i:s');
        // var_dump($dt);
        // var_dump (substr($loginDate,0, -2));
        // $loginDate=substr($loginDate,0, -2);





        // $idquery = "SELECT id  FROM `trans` WHERE  code = $empcode ORDER BY ID DESC LIMIT 1";
        // $idresult = mysqli_query($conn, $idquery);
        // if ($idresult->num_rows !== 1) {
        //     $startquery =
        //         "INSERT INTO `trans` (`name`,`code`,`timein`,`timeout`,`break`,`workingon`,`status`,`endbreak`) VALUES
        //    ('" .
        //         $_SESSION['DisplayName'] .
        //         "' , '" .
        //         $_SESSION['EmployeeID'] .
        //         "' ,SYSDATE(),'" .
        //         '0' .
        //         "','" .
        //         '0' .
        //         "','" .
        //         '0' .
        //         "','" .
        //         '0' .
        //         "','" .
        //         '0' .
        //         "')";
        //         // echo $startquery;
        //         // exit();
        //     mysqli_query($conn, $startquery);
        
        // } else {
        //     echo 'already checked in';
            
        // }
  
       
        // var_dump( $cc);exit();
        $sessionUserID = isset($_SESSION['ID']) ? $_SESSION['ID'] : -1;
        $query = "SELECT *  FROM `users` WHERE ID = $sessionUserID AND isAdmin = 1";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows !== 1) {
            echo 'Un Authorized !';
            exit();
        }
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
            <link rel="stylesheet" href="https:
            <script src=" https:
                integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
                crossorigin="anonymous" referrerpolicy="no-referrer">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
                integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
            <link href='./src/lib/main.css' rel='stylesheet' />
            <script src="src/js/jquery-3.6.0.js"></script>
            <script src="src/js/calander.js"></script>
            <script src='./src/lib/main.min.js'></script>

        </head>
        <!-- Include Header File -->
        <?php include_once 'includes/header.php'; ?>

        <body>
            <main>
                <div class="containerx " style="height: 93vh;">
                    <div class="row h-100 pe-4 ">
                        <div class="col-lg-3 px-0 d-flex flex-column bg-dark ">
                            <div class="user">
                                <div class="user__info d-flex     align-items-center flex-column">
                                    <div class="user__icon">
                                        <img src="images/img.jpg" class="w-100" alt="Jeremy Robson" />
                                        <i class="bi bi-camera-fill upload-img"></i>
                                    </div>
                                    <div class="user__text">
                                        <h1 class="text--med">
                                            <?= $_SESSION['DisplayName'] ?>
                                        </h1>
                                        <p class="text--small"><span>ID:</span> <span
                                                class="user_id"><?= $_SESSION['ID'] ?></span>

                                        </p>
                                        <span
                                                class="transId"><?= $_SESSION['transId'] ?></span>                                    </div>
                                </div>
                                <ul class="user__nav d-flex">
                                    <li class="">Sphinx Co</li>
                                    <li class="">Front End Developer </li>
                                    <li>checked in at: <span id="startat"></span>
                                    </li>
                                    <li>Loged in at: <span>
                                            <?= $_SESSION['logindate'] ?>
                                        </span></li>
                                    <li>working at: <span id="working-at"></span></li>
                                    <li>checked out at:<span class="time-card__hours " id="checked-out"></span>
                                    </li>
                                    <li>Leave Balance :<span class=" ">21 per year</span>
                                    </li>
                                    <li>permissions Balance<span class=" ">2 per month</span>
                                    </li>




                                </ul>

                            </div>
                            <div class="text-center py-5">
                                <button class=" btn btn-danger    checkout  ">
                                    check out <i class="bi bi-box-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-9 py-5">
                            <div class="row justify-content-center text-center">
                                <h1>Time Tracker</h1>
                                <button style="width: fit-content;" class="py-2 btn btn-primary  getCurrentTime"
                                    onclick="getCurrentTime(event)">
                                    checkin
                                </button>
                                <form method="POST" action="timer.php" class="project-form py-2">
                                    <input type="text" style="padding:.7rem .7rem"
                                        class="  mx-auto w-50 form-control bg-dark text-white " name="workingon"
                                        id="task" placeholder="Enter project name" />
                                    <button id="timerwork" class="btn btn-primary ">
                                        Start work
                                    </button>
                                </form>
                            </div>
                            <div class="row py-3">
                                <div class=" time-card col-lg-3 col-sm-6 d-flex flex-column     align-items-center "
                                    style="gap: 27px;">
                                    <div class="" style="height: fit-content;">
                                        <button id="start" class="btn btn-primary " type="submit" name="submit">
                                            Start work
                                        </button>
                                    </div>
                                    <div class="time-card__info ">
                                        <div class="d-flex time-card__upper">
                                            <p class="time-card__title">working hours</p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="text--big time-card__time">
                                                <span class="time-card__hours "><span id="hours">00:</span>
                                                    <span id="mins">00:</span>
                                                    <span id="seconds">00</span></span>
                                            </p>

                                        </div>
                                    </div>



                                </div>
                                <div class=" time-card col-lg-3 col-sm-6 d-flex flex-column     align-items-center "
                                    style="gap: 27px;">

                                    <div class="" style="    height: fit-content;">
                                        <button id="" class="take_Break btn btn-primary">Take a break</button>
                                        <button id="" class="stop_Break btn btn-success" style="display:none">Stop
                                            break</button>
                                    </div>
                                    <div class="time-card__info ">
                                        <div class="d-flex time-card__upper">
                                            <p class="time-card__title">Break</p>

                                        </div>
                                        <div class="d-flex flex-column">
                                            <p class="text--big  ">
                                                <span class="time-card__hours " id="have-break" style=""></span>
                                            </p>
                                            <p class="text--small break-parent">
                                                <span class="time-card__hours--last" id="breakat"></span>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6  px-0">
                                    <div id='calendar'></div>
                                </div>
                            </div>
                            <?php
                            $conn = mysqli_connect(
                                'localhost',
                                'root',
                                null,
                                'hr-01'
                            );

                            if (!$conn) {
                                echo mysqli_connect_error();
                                exit();
                            }

                            $sessionUserID = isset($_SESSION['ID'])
                                ? $_SESSION['ID']
                                : -1;

                            $query = "SELECT *  FROM `users` WHERE ID = $sessionUserID AND isAdmin = 1 AND IsLeader = 1";

                            $result = mysqli_query($conn, $query);
                            if ($result->num_rows !== 1) {
                                echo 'Un Authorized !';
                                exit();
                            }
                            include_once 'chart.php';
                            ?>

                            <div class="  row  py-3 ps-2 admins-controls" style="--bs-columns: 4; --bs-gap: 5rem;">
                                <?php
                                $conn = mysqli_connect(
                                    'localhost',
                                    'root',
                                    null,
                                    'hr-01'
                                );

                                if (!$conn) {
                                    echo mysqli_connect_error();
                                    exit();
                                }

                                $sessionUserID = isset($_SESSION['ID'])
                                    ? $_SESSION['ID']
                                    : -1;

                                $query = "SELECT *  FROM `users` WHERE ID = $sessionUserID AND isAdmin = 1 AND IsLeader = 1";

                                $result = mysqli_query($conn, $query);
                                if ($result->num_rows !== 1) {
                                    echo 'Un Authorized !';
                                    exit();
                                }
                                include_once 'team.php';
                                include_once 'inrequests.php';
                                ?>




                            </div>
                        </div>

                    </div>



                </div>
                <!-- modals -->
                <section>
                    <!-- Modal1 -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Employee to my team</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex ">
                                        <input type="text" style="padding:.7rem .7rem"
                                            class="  mx-auto w-50 form-control bg-dark text-white" name="project"
                                            id="task" placeholder="Search for Employee">
                                    </div>
                                    <table class="table">

                                        <tbody>
                                            <tr>

                                                <th scope="row"><img
                                                        style="width:30px;background:white;border-radius:50%;"
                                                        src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" alt="">
                                                </th>
                                                <td>Tarek Ahmed </td>
                                                <td>299</td>
                                                <td>Hazem,s team</td>
                                                <td class="py-0"><i
                                                        class="bi bi-plus-square-fill text-success fs-4 add-teammember-btn"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><img
                                                        style="width:30px;background:white;border-radius:50%;"
                                                        src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" alt="">
                                                </th>
                                                <td>Tarek Ahmed </td>
                                                <td>299</td>
                                                <td>Hazem,s team</td>
                                                <td class="py-0"><i
                                                        class="bi bi-plus-square-fill text-success fs-4 add-teammember-btn"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><img
                                                        style="width:30px;background:white;border-radius:50%;"
                                                        src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" alt="">
                                                </th>
                                                <td>Tarek Ahmed </td>
                                                <td>299</td>
                                                <td>Hazem,s team</td>
                                                <td class="py-0"><i
                                                        class="bi bi-plus-square-fill text-success fs-4 add-teammember-btn"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Modal2 -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <center id="req-1" class="req-holder" style=" display:block;padding: 1rem 2rem;">


                                        <div class="req-body">
                                            <div class="d-flex ">
                                                <span class="fs-5 m-0  "> Tarek Ahmed Elrashidy </span>
                                            </div>
                                            <div class="d-flex ">
                                                <p class="fs-5 m-0  "> Requested at :<span>12/12/1212</span> </p>
                                            </div>

                                            <div class="d-flex  align-items-end ">
                                                <span>requested to :</span><input type="text"
                                                    class="border-0 rounded-0 border-3    border-bottom    form-control w-25    "
                                                    name="inday" id="">
                                            </div>
                                            <div class="d-flex flex-wrap  pt-3  align-items-center">
                                                <span>leave type </span>
                                                <div class="form-check ps-5">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault1">
                                                    <label class="form-check-label fw-bold" for="flexRadioDefault1">
                                                        ordinary
                                                    </label>
                                                </div>
                                                <div class="form-check ps-5">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault2">
                                                    <label class="form-check-label fw-bold" for="flexRadioDefault2">
                                                        Extraordinary
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="d-flex    align-items-end">
                                                <span>for :</span><input type="text"
                                                    class="border-0 rounded-0 border-3    border-bottom  w-25  form-control    "
                                                    name="" id=""><span>days</span>

                                            </div>
                                            <div class="d-flex  align-items-end ">
                                                <span>from day </span><input type="date"
                                                    class="border-0 rounded-0 border-3    border-bottom   w-25  form-control    "
                                                    name="" id=""><span>to day </span>

                                            </div>
                                            <div class="  py-1 ">
                                                <span>Accepted by : </span><span>Ahmed hosny</span>
                                            </div>
                                            <div class="  py-1 ">
                                                <span>Accepted at :</span><span>15/12/2020</span>
                                            </div>
                                        </div>

                                    </center>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Modal3 -->
                    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">leave request</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <center id="req-1" class="req-holder" style=" display:block;padding: 1rem 2rem;">


                                        <div class="req-body">
                                            <div class="d-flex ">
                                                <span class="fs-5 m-0  "> Tarek Ahmed Elrashidy </span>
                                            </div>
                                            <div class="d-flex ">
                                                <p class="fs-5 m-0  "> Requested at :<span>12/12/1212</span> </p>
                                            </div>

                                            <div class="d-flex  align-items-end ">
                                                <span>requested to :</span><input type="text"
                                                    class="border-0 rounded-0 border-3    border-bottom    form-control w-25    "
                                                    name="inday" id="">
                                            </div>
                                            <div class="d-flex flex-wrap  pt-3  align-items-center">
                                                <span>leave type </span>
                                                <div class="form-check ps-5">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault1">
                                                    <label class="form-check-label fw-bold" for="flexRadioDefault1">
                                                        ordinary
                                                    </label>
                                                </div>
                                                <div class="form-check ps-5">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault2">
                                                    <label class="form-check-label fw-bold" for="flexRadioDefault2">
                                                        Extraordinary
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="d-flex    align-items-end">
                                                <span>for :</span><input type="text"
                                                    class="border-0 rounded-0 border-3    border-bottom  w-25  form-control    "
                                                    name="" id=""><span>days</span>

                                            </div>
                                            <div class="d-flex  align-items-end ">
                                                <span>from day </span><input type="date"
                                                    class="border-0 rounded-0 border-3    border-bottom   w-25  form-control    "
                                                    name="" id=""><span>to day </span>

                                            </div>
                                            <div class="  pt-3 d-flex  justify-content-center ">
                                                <button class="btn btn-primary px-2 me-2 accept-request ">Accept<i
                                                        class="bi bi-check2-circle"></i></button>
                                                <button class="btn btn-danger px-2 reject-request">Rejecte <i
                                                        class="bi bi-x-circle"></i></button>
                                            </div>



                                            <div class="  pt-3 justify-content-center  flex-column  send-comment-holder "
                                                style='display: flex'>

                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Leave a comment here"
                                                        id="floatingTextarea2" style="height: 100px"></textarea>
                                                    <label for="floatingTextarea2">Comments</label>
                                                </div>
                                                <div class="d-flex justify-content-center py-2">
                                                    <button class="btn btn-danger px-2 me-2 send-comment ">Send
                                                    </button>
                                                    <button
                                                        class="btn btn-secondary px-2 cancel-comment ">Cancel</button>
                                                </div>
                                            </div>
                                        </div>

                                    </center>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </body>
        <script src="src/js/chart.js"></script>
        <script src="src/js/app.js"></script>
        <script src="src/js/main.js"></script>
        <script src="src/js/jquery-3.6.0.js"></script>
        <script src="src/js/bootstrap.min.js"></script>
        <script src="src/js/bootstrap.bundle.min.js"></script>

        </html>