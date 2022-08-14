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

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
            <a class="nav-link" href="./addemp.php">addEmp</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./request.php">request1</a>
          </li>
          <li class="nav-item dropdown bg-dark">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu bg-dark text-white" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./addemp.php">EMP</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          
        </ul>
         
      </div>
    </div>
  </nav>

  <main >
   <div class="containerx px-5 mx-5">

    <!-- <section class="graph-container py-5">
      <div class="row">
        <div class="col-md-8">
          <canvas id="myChart"></canvas>
        </div>
        <div class="col-md-4">
          <canvas id="myChart2"></canvas>
        </div>

      </div>
     
    </section> -->
    <div class="table-container">
      <h1>ADD New Employee</h1>
      <button class="btn btn-success  add-new-btn" role="button"><strong>+</strong></button>

      <table class="table  my-5">
        <thead>
          <tr class="text-center bg-dark text-white">
            <th scope="col">#</th>
            <th scope="col">EMP name</th>
            <th scope="col">Emp-code</th>
            <th scope="col">email</th>
            <th scope="col">job title</th>
            <th scope="col">DEP-id</th>
            <th scope="col">National-id</th>
            <th scope="col">Bank Acc</th>
            <th scope="col"> Insurance No</th>
            <th scope="col">start date</th>
            <th scope="col">phone No</th>
            <th scope="col">Address</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>
              <input class="form-control bg-dark  text-white " type="text" placeholder="EMP name" aria-label="EMP name">
            </td>
            <td>
              <input class="form-control bg-dark  text-white " type="text" placeholder="Emp-code" aria-label="Emp-code">
            </td>
            <td>
              <input class="form-control bg-dark text-white" type="email" type="text" placeholder="email" aria-label="email">
            </td>
            <td>
              <input class="form-control bg-dark text-white" type="text" type="text" placeholder="job title" aria-label="job title ">
            </td>
            <td>
              <input class="form-control bg-dark text-white"  type="text" placeholder="DEP-id" aria-label="DEP-id">
            </td>
            <td>
              <input class="form-control bg-dark text-white" maxlength="14" type="number" placeholder="National-id" aria-label="National-id">

            </td>
            <td>
              <input class="form-control bg-dark text-white" maxlength="14" type="number" placeholder="Bank Acc" aria-label="Bank Acc">

            </td>
            <td>
              <input class="form-control bg-dark text-white" type="number" placeholder="Insurance No" aria-label="Insurance No">

            </td>
            <td>
              <input class="form-control bg-dark text-white" type="date" placeholder="start date" aria-label="start date">

            </td>
            <td>
              <input class="form-control bg-dark text-white" type="number" placeholder="phone No" aria-label="phone No">

            </td>
            <td>
              <input class="form-control bg-dark text-white" type="text" placeholder="address" aria-label="address">
            </td>
           
           
            <td class="d-flex ">
              <button class="btn btn-warning btn-block me-3">Update</button>
              <button class="btn btn-danger btn-block">Delete</button>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>
              <input class="form-control bg-dark  text-white " type="text" placeholder="EMP name" aria-label="EMP name">
            </td>
            <td>
              <input class="form-control bg-dark  text-white " type="text" placeholder="Emp-code" aria-label="Emp-code">
            </td>
            <td>
              <input class="form-control bg-dark text-white" type="email" type="text" placeholder="email" aria-label="email">
            </td>
            <td>
              <input class="form-control bg-dark text-white" type="text" type="text" placeholder="job title" aria-label="job title ">
            </td>
            <td>
              <input class="form-control bg-dark text-white"  type="text" placeholder="DEP-id" aria-label="DEP-id">
            </td>
            <td>
              <input class="form-control bg-dark text-white" maxlength="14" type="number" placeholder="National-id" aria-label="National-id">

            </td>
            <td>
              <input class="form-control bg-dark text-white" maxlength="14" type="number" placeholder="Bank Acc" aria-label="Bank Acc">

            </td>
            <td>
              <input class="form-control bg-dark text-white" type="number" placeholder="Insurance No" aria-label="Insurance No">

            </td>
            <td>
              <input class="form-control bg-dark text-white" type="date" placeholder="start date" aria-label="start date">

            </td>
            <td>
              <input class="form-control bg-dark text-white" type="number" placeholder="phone No" aria-label="phone No">

            </td>
            <td>
              <input class="form-control bg-dark text-white" type="text" placeholder="address" aria-label="address">
            </td>
           
            <td>
              <button class="btn btn-success  w-100">create</button>
            </td>
          </tr>

      
      
        </tbody>
      </table>
    </div>
    
   
   </div>


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
<script  src="src/js/chart.js"></script>
<script  src="src/js/jquery-3.6.0.min.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/bootstrap.bundle.min.js"></script>

</html>