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
  <script  src="src/js/jquery-3.6.0.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

</head>

<body>
  
  <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"> <img src="./images/icon1.jpg" style="    width: 125px;
        border-radius: 5px;" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./adduser.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./timer.php">tracker</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./login.php">login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./addEmployee.php">addEmp</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./request.php">requests</a>
          </li>
          <li class="nav-item dropdown bg-dark">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu bg-dark text-white" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./addEmployee.php">EMP</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          
        </ul>
         
      </div>
    </div>
  </nav> -->
  <?php include_once('includes/header.php'); ?>


  <main >
   <div class="container p-5 text-center ">

    <h1>Requests</h1>
    <nav aria-label="Page navigation example ">
      <ul class="pagination     justify-content-center">
        <li class="page-item">
          <a class="page-link bg-dark h-100" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item " data-req="req-1"><a class="page-link bg-dark" href="#">leave request</a></li>
        <li class="page-item" data-req="req-2"><a class="page-link bg-dark" href="#">permission request </a></li>
        <li class="page-item"><a class="page-link bg-dark" href="#">Mission request </a></li>
        <li class="page-item">
          <a class="page-link bg-dark h-100" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>

<section id="req">
  <center id="req-1" class="req-holder" style=" display:block;">
    <div class="row px-3 border-3 border-bottom">
<div class="col-lg-6 text-start">
<h3>alandalus company </h3>
<p class="mb-1" > egyptian company joint stock </p>
<p>Rc 5070 south cariro</p>
</div>
<div class="col-lg-6 text-end">
<h3>شركه الاندلس  </h3>
<p class="mb-1">شركه مساهمه مصريه  </p>
<p> سجل تجاري 5070 جنوب القاهره</p>
</div>
    </div>
    <h2 class="py-3">leave request</h2>
    <div class="req-body">
      <div class="d-flex ">
        <p class="fs-5  "> Alexandria in day  <span>12/12/1212</span> </p>
      </div>
<div class="d-flex  py-2     align-items-end justify-content-center">

<p>Mr. General Manager of the company ,,,, </p>

</div>
<div class="d-flex  py-2 align-items-end ">
<span>requested to :</span><input type="text" class="border-0 rounded-0 border-3    border-bottom    form-control w-25    " name="inday" id="">
</div>
<div class="d-flex flex-wrap  pt-3  align-items-center">
<span>Please approve this leave as a </span> 
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
  <div class="d-flex  py-2  align-items-end">
    <span>for :</span><input type="text" class="border-0 rounded-0 border-3    border-bottom  w-25  form-control    " name="" id=""><span>days</span>

  </div>    
  <div class="d-flex  py-2 align-items-end ">
    <span>from day </span><input type="date" class="border-0 rounded-0 border-3    border-bottom   w-25  form-control    " name="" id=""><span>to day </span>

  </div>    
     <div class=" d-flex py-2 justify-content-center">
      <p>Thank you,,,</p>



     </div>


     <div class="row border-3 border-top pt-3 px-3">
<p class="mb-0 ">Browser default checkboxes and radios are replaced with the help of .form-check, a series of classes for both input types that improves the layout and behavior of their HTML elements, that provide greater customization and</p>
     </div>

    </div>
    <div class="d-flex  py-2 align-items-center justify-content-center">
      <button class="send-for-approval btn btn-primary download" onclick="send()">send for approval<i class="bi bi-send-fill"></i></button>
      <button class="btn btn-success" style="display: none;" onclick="screen(event)">Download your copy <i class="bi bi-download "></i>
      </button>
  
     </div>
  </center>
  <center id="req-2" class="req-holder" >
    <div class="row px-3 border-3 border-bottom">
<div class="col-lg-6 text-start">
<h3>alandalus company </h3>
<p class="mb-1" > egyptian company joint stock </p>
<p>Rc 5070 south cariro</p>
</div>
<div class="col-lg-6 text-end">
<h3>شركه الاندلس  </h3>
<p class="mb-1">شركه مساهمه مصريه  </p>
<p> سجل تجاري 5070 جنوب القاهره</p>
</div>
    </div>
    <h2 class="py-3">permission request</h2>
    <div class="req-body">
      <div class="d-flex ">
        <p class="fs-5  "> Alexandria in day  <span>12/12/1212</span> </p>
      </div>
<div class="d-flex  py-2     align-items-end justify-content-center">

<p>Mr. General Manager of the company ,,,, </p>

</div>
<div class="d-flex  py-2 align-items-end ">
<span>requested to :</span><input type="text" class="border-0 rounded-0 border-3    border-bottom    form-control w-25    " name="inday" id="">
</div>
<div class="d-flex      flex-wrap pt-3  align-items-center">
<span>Please approve this leave as a </span> 
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
  <div class="d-flex  py-2  align-items-end">
    <span>for :</span><input type="text" class="border-0 rounded-0 border-3    border-bottom  w-25  form-control    " name="" id=""><span>days</span>

  </div>    
  <div class="d-flex  py-2 align-items-end ">
    <span>from day </span><input type="date" class="border-0 rounded-0 border-3    border-bottom   w-25  form-control    " name="" id=""><span>to day </span>

  </div>    
     <div class=" d-flex py-2 justify-content-center">
      <p>Thank you,,,</p>



     </div>


     <div class="row border-3 border-top pt-3 px-3">
<p class="mb-0 ">Browser default checkboxes and radios are replaced with the help of .form-check, a series of classes for both input types that improves the layout and behavior of their HTML elements, that provide greater customization and</p>
     </div>

    </div>
    <div class="d-flex  py-2 align-items-center justify-content-center">
      <button class="send-for-approval btn btn-primary" onclick="send()">send for approval<i class="bi bi-send-fill"></i></button>
      <button class="btn btn-success" style="display: none;" onclick="screen(event)">Download your copy <i class="bi bi-download "></i>
      </button>
  
     </div>
  </center>
 

</section>


    

   </div>


  </main>

 

</body>
<script  src="src/js/req.js"></script>
<script  src="src/js/html2canvas.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/bootstrap.bundle.min.js"></script>

</html>