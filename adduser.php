<?php
session_start();
$error_field = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validation
    // var_dump($_POST);
    if (!(isset($_POST['Username']) && !empty($_POST['Username']))) {
        $error_field[] = 'Username';
    }
    if (
        !(isset($_POST['email']) &&
            filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)
        )
    ) {
        $error_field[] = 'email';
    }
    if (!(isset($_POST['password']) && strlen($_POST['password']) > 5)) {
        $error_field[] = 'password';
    }
    // if (!$error_field) {
    // header('Location: form.php?error_field='.implode(",", $error_field));

    $conn = mysqli_connect('localhost', 'root', null, 'hr-01');

    if (!$conn) {
        echo mysqli_connect_error();
        exit();
    }
    $Username = mysqli_escape_string($conn, $_POST['Username']);
    $DisplayName = mysqli_escape_string($conn, $_POST['DisplayName']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);
    $isAdmin = isset($_POST['isAdmin']) && $_POST['isAdmin'] == 'on' ? 1 : 0;
    $isActive = isset($_POST['isActive']) && $_POST['isActive'] == 'on' ? 1 : 0;
    $EmployeeID = mysqli_escape_string($conn, $_POST['EmployeeID']);
    $CreatedDate = date('Y-m-d h:i:sa');

    // $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . 'uploads';
    // $avatar = '';
    // if ($_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
    //     $temp_name = $_FILES['avatar']['temp_name'];
    //     $avatar = basename($_FILES['avatar']['Username']);
    //     move_uploaded_file($temp_name, '$uploads_dir/$name.$avatar');
    // } else {
    //     echo 'error cant upload file';
    //     exit();
    // }
    $query =
        "INSERT INTO `users` (`Username`,`DisplayName`,`email`,`password`,`isAdmin`,isActive,EmployeeID,CreatedBy,CreatedDate) VALUES ('" .
        $Username .
        "' , '" .
        $DisplayName .
        "' , '" .
        $email .
        "','" .
        $password .
        "',
        '" .
        $isAdmin .
        "',
        '" .
        $isActive .
        "',
        '" .
        $EmployeeID .
        "',
        '" .
        $_SESSION['ID'] .
        "',
        '" .
        $CreatedDate .
        "')";
    if (mysqli_query($conn, $query)) {
        // header('Location: list.php');
    } else {
        //echo $query;
        echo mysqli_error($conn);
    }

    mysqli_close($conn);
}

// }
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
    <script src="src/js/jquery-3.6.0.min.js"></script>

</head>

<body>
<?php include_once ('includes/header.php')?>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <img src="./images/icon.jpg" style="    width: 125px;
        border-radius: 5px;" alt="icon">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </nav> -->

    <main>
        <div class="containerx px-5 mx-5">


            <section class="table-container">
                <h2 class="py-2"><i class="bi bi-person"></i> Add/Edit User</h2>
                <button class="btn btn-success  add-newuser-btn" role="button"><strong>+</strong></button>

                <table class="table  my-5">
                    <thead>
                        <tr class="text-center bg-dark text-white">
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Display Name</th>
                            <th scope="col">Emp Code</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Mac</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Role</th>
                            <th scope="col">Active</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody class="users-table-body">
                        <?php
                        // Fetch All Users Data
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
                        $query = 'SELECT * FROM `users`';
                        print $query;
                        $result = mysqli_query($conn, $query);
                        // var_dump($result);
                        while ($row = mysqli_fetch_assoc($result)) :
                            var_dump($row); ?>
                            <tr class="add-user-row">
                                <th scope="row">1</th>
                                <td>
                                    <input class="form-control bg-dark  text-white " value="<?= $row['Username'] ?>" type="text" placeholder="<?= $row['Username'] ?>" aria-label="<?= $row['Username'] ?>" disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark  text-white " value="<?= $row['DisplayName'] ?>" type="text" placeholder="<?= $row['DisplayName'] ?>" aria-label="<?= $row['DisplayName'] ?>" disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark  text-white  empCode" value="<?= $row['EmployeeID'] ?>" type="text" placeholder="<?= $row['EmployeeID'] ?>" aria-label="<?= $row['EmployeeID'] ?>" disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" value="<?= $row['Email'] ?>" type="email" type="text" placeholder="<?= $row['Email'] ?>" aria-label="<?= $row['Email'] ?>" disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" value="1223445" type="password" type="text" placeholder="password" aria-label="password " disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" value="as12515asw" type="text" placeholder="mac" aria-label="mac" disabled>
                                </td>
                                <td>
                                    <div class="form-check form-switch d-flex justify-content-center">
                                        <input class="form-check-input" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?= $row['isAdmin'] == 1
                                                                                                                                                ? 'checked'
                                                                                                                                                : 'null' ?> disabled>
                                    </div>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" disabled>
                                        <option selected>Open toselect</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="form-check form-switch d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?= $row['IsActive'] == 1
                                                                                                                                        ? 'checked'
                                                                                                                                        : 'null' ?> disabled>
                                    </div>
                                </td>
                                <td class="d-flex user-row-options">
                                    <button class="btn btn-warning btn-block me-3 edite-user-row ">Edite</button>
                                    <button class="btn btn-danger btn-block delete-row-btn " onclick="deleteRow(this)">Delete</button>
                                </td>
                            </tr>
                        <?php
                        endwhile;
                        ?>
                        <!--  -->
                        <tr>
                            <form method="POST" action="adduser.php" enctype="multipart/form-data">
                                <th scope="row">2</th>
                                <td>
                                    <input class="form-control bg-dark  text-white " type="text" placeholder="user name" aria-label="user name" name="Username" id="Username" placeholder="Username" value="<?= isset(
                                                                                                                                                                                                                $_POST['Username']
                                                                                                                                                                                                            )
                                                                                                                                                                                                                ? $_POST['Username']
                                                                                                                                                                                                                : '' ?>">
                                </td>
                                <td>
                                    <input class="form-control bg-dark  text-white " type="text" placeholder="Display Name" aria-label="Display Name" name="DisplayName" id="DisplayName" placeholder="Display Name" value="<?= isset(
                                                                                                                                                                                                                                $_POST['DisplayName']
                                                                                                                                                                                                                            )
                                                                                                                                                                                                                                ? $_POST['DisplayName']
                                                                                                                                                                                                                                : '' ?>">
                                </td>
                                <td>
                                    <input class="form-control bg-dark  text-white " type="text" placeholder="EmployeeID" aria-label="EmployeeID" name="EmployeeID" id="EmployeeID">
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" type="email" type="text" placeholder="email" aria-label="email" name="email" id="email" placeholder="enter your email" value="<?= isset(
                                                                                                                                                                                                                        $_POST['email']
                                                                                                                                                                                                                    )
                                                                                                                                                                                                                        ? $_POST['email']
                                                                                                                                                                                                                        : '' ?>">
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" type="password" type="text" placeholder="password" aria-label="password " name="password" id="password" placeholder="enter your password" value="<?= isset(
                                                                                                                                                                                                                                        $_POST['password']
                                                                                                                                                                                                                                    )
                                                                                                                                                                                                                                        ? $_POST['password']
                                                                                                                                                                                                                                        : '' ?>">
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" type="text" placeholder="mac" aria-label="mac">
                                </td>
                                <td>
                                    <div class="form-check form-switch d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="isAdmin">
                                    </div>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="form-check form-switch d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="isActive" id="isActive">
                                    </div>
                                </td>


                                <td class="d-flex  justify-content-between ">
                                    <button class="btn btn-success btn-block w-100 me-3" type="submit" name="submit" value="Add">save</button>
                                    <button class="btn btn-secondary btn-block delete-row-btn" onclick="deleteRow(this)">Cancel</button>
                                </td>
                            </form>
                        </tr>


                    </tbody>
                </table>
            </section>


        </div>


    </main>



</body>
<script src="src/js/chart.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/bootstrap.bundle.min.js"></script>
<script src="src/js/ajax.js"></script>
<script src="src/js/main.js"></script>

</html>