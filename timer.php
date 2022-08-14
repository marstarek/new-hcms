<?php
session_start();


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

  <link href='./src/lib/main.css' rel='stylesheet' />
  <script src="src/js/jquery-3.6.0.js"></script>
  <script src='./src/lib/main.min.js'></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        // initialDate: '2020-06-12',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        select: function(arg) {
          var title = prompt('Event Title:');
          if (title) {
            calendar.addEvent({
              title: title,
              start: arg.start,
              end: arg.end,
              allDay: arg.allDay
            })
          }
          calendar.unselect()
        },
        eventClick: function(arg) {
          if (confirm('Are you sure you want to delete this event?')) {
            arg.event.remove()
          }
        },
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: [{
            title: 'All Day Event',
            start: '2022-06-01'
          },
          {
            title: 'Long Event',
            start: '2022-09-07',
            end: '2022-06-10'
          },
          {
            groupId: 999,
            title: 'Repeating Event',
            start: '2022-06-09T16:00:00'
          },
          {
            groupId: 999,
            title: 'Repeating Event',
            start: '2022-06-16T16:00:00'
          },
          {
            title: 'Conference',
            start: '2022-06-11',
            end: '2022-06-13'
          },
          {
            title: 'Meeting',
            start: '2022-06-12T10:30:00',
            end: '2022-06-12T12:30:00'
          },
          {
            title: 'Lunch',
            start: '2022-06-12T12:00:00'
          },
          {
            title: 'Meeting',
            start: '2022-06-12T14:30:00'
          },
          {
            title: 'Happy Hour',
            start: '2022-06-12T17:30:00'
          },
          {
            title: 'Dinner',
            start: '2022-06-12T20:00:00'
          },
          {
            title: 'Birthday Party',
            start: '2022-06-13T07:00:00'
          },
          {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2022-06-28'
          }
        ]
      });

      calendar.render();
    });
  </script>
</head>
<!-- Include Header File -->
<?php include_once('includes/header.php'); ?>

<body>
  <main>
    <div class="containerx " style="height: 93vh;">
      <div class="row h-100 w-100 ">
        <div class="col-lg-3 pe-0 d-flex flex-column bg-dark ">
          <div class="user">
            <div class="user__info d-flex     align-items-center flex-column">
              <div class="user__icon">
                <img src="images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" class="w-100" alt="Jeremy Robson" />
                <i class="bi bi-camera-fill upload-img"></i>
              </div>
              <div class="user__text">
                <h1 class="text--med"><?= $_SESSION['DisplayName']; ?></h1>
                <p class="text--small">ID:<?= $_SESSION['EmployeeID']; ?></p>
              </div>
            </div>
            <ul class="user__nav d-flex">
              <li class="">Sphinx Co</li>
              <li class="">Front End Developer </li>
              <li>checked in at: <span id="startat"></span></li>
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
            <button class=" btn btn-danger    checkout  disable" onclick="checkout()">
              check out <i class="bi bi-box-arrow-right"></i>
            </button>
          </div>
        </div>
        <div class="col-lg-9 py-5">
          <div class="row justify-content-center text-center">
            <h1>Time Tracker</h1>
            <button style="width: fit-content;" class="py-2 btn btn-primary  getCurrentTime" onclick="getCurrentTime(event)">
              checkin
            </button>
            <form class="project-form py-2">

              <input type="text" style="padding:.7rem .7rem" class="  mx-auto w-50 form-control bg-dark text-white    disable" name="project" id="task" placeholder="Enter project name" />
            </form>
          </div>
          <div class="row py-3">
            <div class=" time-card col-lg-3 d-flex flex-column     align-items-center " style="gap: 27px;">
              <div class="" style="height: fit-content;">
                <button id="start" class="btn btn-primary disable">
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
            <div class=" time-card col-lg-3 d-flex flex-column     align-items-center " style="gap: 27px;">

              <div class="" style="    height: fit-content;">
                <button id="stop" class="btn btn-primary  disable">Take a break</button>
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
          <section class="graph-container py-5">
            <div class="row">
              <div class="col-md-8">
                <canvas id="myChart"></canvas>
              </div>
              <div class="col-md-4">
                <canvas id="myChart2"></canvas>
              </div>

            </div>

          </section>
          <div class="  row  py-3 ps-2 admins-controls" style="--bs-columns: 4; --bs-gap: 5rem;">



            <!-- My Team -->
            <div class="col-lg-12 border border-2 rounded bg-dark text-white pb-3">

              <div class="d-flex justify-content-between align-items-start py-3">
                <h3>My Team <i class="bi bi-diagram-3-fill"></i></h3>
                <div class="d-flex     align-items-center">
                  <i class="bi bi-person-plus-fill fs-3  " style="color:#007ac3" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                  <a href="https://trello.com" target="_blank"> <img src="./images/Trello-Logo.png" style="width: 100px" alt=""></a>

                </div>

              </div>
              <div class="">

                <div class="row-cols-xl-5 flex-wrap  d-flex  emp-cards">
                  <!-- emp-card -->
                  <div class="col-lg-3 p-3 emp-card-holder">
                    <div class="emp-card-body">
                      <div class="emp-card-img">
                        <img src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" class="" alt="...">
                        <i class="bi bi-x-circle-fill text-danger delete-member-btn"></i>
                      </div>
                      <div class="body">
                        <h5 class="emp-card-title pt-2">ahmed hosny</h5>
                        <div class="row">
                          <h6>stetus</h6>
                          <div class="col">
                            <p>Working</p>
                            <i class="bi bi-circle-fill text-success"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 p-3 emp-card-holder">
                    <div class="emp-card-body">
                      <div class="emp-card-img">
                        <img src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" class="" alt="...">
                        <i class="bi bi-x-circle-fill text-danger delete-member-btn"></i>
                      </div>
                      <div class="body">
                        <h5 class="emp-card-title pt-2">ahmed hosny</h5>
                        <div class="row">
                          <h6>stetus</h6>
                          <div class="col">
                            <p>in leave</p>
                            <i class="bi bi-dash-circle-fill text-danger"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 p-3 emp-card-holder">
                    <div class="emp-card-body">
                      <div class="emp-card-img">
                        <img src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" class="" alt="...">
                        <i class="bi bi-x-circle-fill text-danger delete-member-btn"></i>
                      </div>
                      <div class="body">
                        <h5 class="emp-card-title pt-2">ahmed hosny</h5>
                        <div class="row">
                          <h6>stetus</h6>
                          <div class="col">
                            <p>in break</p>
                            <i class="bi bi-pause-circle-fill  text-warning"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 p-3 emp-card-holder">
                    <div class="emp-card-body">
                      <div class="emp-card-img">
                        <img src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" class="" alt="...">
                        <i class="bi bi-x-circle-fill text-danger delete-member-btn"></i>
                      </div>
                      <div class="body">
                        <h5 class="emp-card-title pt-2">ahmed hosny</h5>
                        <div class="row">
                          <h6>stetus</h6>
                          <div class="col">
                            <p>Working</p>
                            <i class="bi bi-circle-fill text-success"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>



                </div>
              </div>





            </div>
            <div class="col-lg-12  py-4">
              <div class="row">
                <div class="col-lg-6 border border-2 rounded bg-dark text-white p-1 px-2">
                  <h5>Accepted Requests</h5>
                  <div class="">
                    <table class="table text-white">

                      <tbody>
                        <tr class="" data-bs-toggle="modal" data-bs-target="#exampleModal2">

                          <th scope="row"><img style="width:30px;background:white;border-radius:50%;" src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" alt=""> </th>
                          <td>Tarek Ahmed </td>
                          <td>299</td>
                          <td>leave request</td>
                          <td><i class="bi bi-check2-circle text-success"></i></td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#exampleModal2">
                          <th scope="row"><img style="width:30px;background:white;border-radius:50%;" src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" alt=""> </th>
                          <td>Tarek Ahmed </td>
                          <td>299</td>
                          <td>permission request</td>
                          <td><i class="bi bi-check2-circle text-success"></i></td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#exampleModal2">
                          <th scope="row"><img style="width:30px;background:white;border-radius:50%;" src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" alt=""> </th>
                          <td>Tarek Ahmed </td>
                          <td>299</td>
                          <td>permission request</td>
                          <td><i class="bi bi-check2-circle text-success"></i></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-lg-6 border border-2 rounded bg-dark text-white p-1 px-2">
                  <h5>incoming Requests</h5>
                  <div class="">
                    <table class="table text-white">

                      <tbody>
                        <tr data-bs-toggle="modal" data-bs-target="#exampleModal3">

                          <th scope="row"><img style="width:30px;background:white;border-radius:50%;" src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" alt=""> </th>
                          <td>Tarek Ahmed </td>
                          <td>299</td>
                          <td>leave request</td>
                          <td><i class="bi bi-stopwatch-fill text-warning"></i></td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#exampleModal3">
                          <th scope="row"><img style="width:30px;background:white;border-radius:50%;" src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" alt=""> </th>
                          <td>Tarek Ahmed </td>
                          <td>299</td>
                          <td>permission request</td>
                          <td><i class="bi bi-stopwatch-fill text-warning"></i></td>
                        </tr>
                        <tr data-bs-toggle="modal" data-bs-target="#exampleModal3">
                          <th scope="row"><img style="width:30px;background:white;border-radius:50%;" src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" alt=""> </th>
                          <td>Tarek Ahmed </td>
                          <td>299</td>
                          <td>Mission request</td>
                          <td><i class="bi bi-stopwatch-fill text-warning"></i></td>
                        </tr>
                      </tbody>
                    </table>






                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>



    </div>
    <!-- modals -->
    <section>
      <!-- Modal1 -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Employee to my team</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="d-flex ">
                <input type="text" style="padding:.7rem .7rem" class="  mx-auto w-50 form-control bg-dark text-white" name="project" id="task" placeholder="Search for Employee">
              </div>
              <table class="table">

                <tbody>
                  <tr>

                    <th scope="row"><img style="width:30px;background:white;border-radius:50%;" src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" alt=""> </th>
                    <td>Tarek Ahmed </td>
                    <td>299</td>
                    <td>Hazem,s team</td>
                    <td class="py-0"><i class="bi bi-plus-square-fill text-success fs-4 add-teammember-btn"></i></td>
                  </tr>
                  <tr>
                    <th scope="row"><img style="width:30px;background:white;border-radius:50%;" src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" alt=""> </th>
                    <td>Tarek Ahmed </td>
                    <td>299</td>
                    <td>Hazem,s team</td>
                    <td class="py-0"><i class="bi bi-plus-square-fill text-success fs-4 add-teammember-btn"></i></td>
                  </tr>
                  <tr>
                    <th scope="row"><img style="width:30px;background:white;border-radius:50%;" src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" alt=""> </th>
                    <td>Tarek Ahmed </td>
                    <td>299</td>
                    <td>Hazem,s team</td>
                    <td class="py-0"><i class="bi bi-plus-square-fill text-success fs-4 add-teammember-btn"></i></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>

      <!-- Modal2 -->
      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <span>requested to :</span><input type="text" class="border-0 rounded-0 border-3    border-bottom    form-control w-25    " name="inday" id="">
                  </div>
                  <div class="d-flex flex-wrap  pt-3  align-items-center">
                    <span>leave type </span>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                      <label class="form-check-label fw-bold" for="flexRadioDefault1">
                        ordinary
                      </label>
                    </div>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                      <label class="form-check-label fw-bold" for="flexRadioDefault2">
                        Extraordinary
                      </label>
                    </div>
                  </div>
                  <div class="d-flex    align-items-end">
                    <span>for :</span><input type="text" class="border-0 rounded-0 border-3    border-bottom  w-25  form-control    " name="" id=""><span>days</span>

                  </div>
                  <div class="d-flex  align-items-end ">
                    <span>from day </span><input type="date" class="border-0 rounded-0 border-3    border-bottom   w-25  form-control    " name="" id=""><span>to day </span>

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
      <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">leave request</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <span>requested to :</span><input type="text" class="border-0 rounded-0 border-3    border-bottom    form-control w-25    " name="inday" id="">
                  </div>
                  <div class="d-flex flex-wrap  pt-3  align-items-center">
                    <span>leave type </span>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                      <label class="form-check-label fw-bold" for="flexRadioDefault1">
                        ordinary
                      </label>
                    </div>
                    <div class="form-check ps-5">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                      <label class="form-check-label fw-bold" for="flexRadioDefault2">
                        Extraordinary
                      </label>
                    </div>
                  </div>
                  <div class="d-flex    align-items-end">
                    <span>for :</span><input type="text" class="border-0 rounded-0 border-3    border-bottom  w-25  form-control    " name="" id=""><span>days</span>

                  </div>
                  <div class="d-flex  align-items-end ">
                    <span>from day </span><input type="date" class="border-0 rounded-0 border-3    border-bottom   w-25  form-control    " name="" id=""><span>to day </span>

                  </div>
                  <div class="  pt-3 d-flex  justify-content-center ">
                    <button class="btn btn-primary px-2 me-2 accept-request ">Accept<i class="bi bi-check2-circle"></i></button>
                    <button class="btn btn-danger px-2 reject-request">Rejecte <i class="bi bi-x-circle"></i></button>
                  </div>



                  <div class="  pt-3 justify-content-center  flex-column  send-comment-holder " style='display: flex'>

                    <div class="form-floating">
                      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                      <label for="floatingTextarea2">Comments</label>
                    </div>
                    <div class="d-flex justify-content-center py-2">
                      <button class="btn btn-danger px-2 me-2 send-comment ">Send </button>
                      <button class="btn btn-secondary px-2 cancel-comment ">Cancel</button>
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

  <!-- FOOTER -->
  <!-- <footer class="w-100 py-4 flex-shrink-0 bg-dark text-white">
    <div class="container py-4">
        <div class="row gy-4 gx-5">
            <div class="col-lg-4 col-md-6">
                <h5 class="h1 text-white">FB.</h5>
                <p class="small ">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
 
            </div>
            <div class="col-lg-2 col-md-6 text-white">
                <h5 class="text-white mb-3">Quick links</h5>
                <ul class="list-unstyled  ">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Get started</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 text-white">
                <h5 class="text-white mb-3">Quick links</h5>
                <ul class="list-unstyled ">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Get started</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 text-white">
                <h5 class="text-white mb-3">Newsletter</h5>
                <p class="small ">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                <form action="#">
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-primary" id="button-addon2" type="button"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</footer> -->


</body>
<script src="src/js/chart.js"></script>
<script src="src/js/app.js"></script>
<!-- <script  src="src/js/jquery-3.6.0.js"></script> -->
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/bootstrap.bundle.min.js"></script>

</html>