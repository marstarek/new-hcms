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
    // Code	EnName	ArName	DOB	SSN	Address	GenderID	MilitaryStatusID	NationalityID	StatusID	JobID	Phone	Email	IsDeleted	CreatedBy	CreatedDate	UpdatedBy	UpdatedDate

    $Code = mysqli_escape_string($conn, $_POST['Code']);
    $EnName = mysqli_escape_string($conn, $_POST['EnName']);
    // $ArName = mysqli_escape_string($conn, $_POST['ArName']);
    $DOB = mysqli_escape_string($conn, $_POST['DOB']);
    $SSN = mysqli_escape_string($conn, $_POST['SSN']);
    $Address = mysqli_escape_string($conn, $_POST['Address']);
    $GenderID = mysqli_escape_string($conn, $_POST['GenderID']);
    // $MilitaryStatusID = mysqli_escape_string($conn, $_POST['MilitaryStatusID']);
    $NationalityID = mysqli_escape_string($conn, $_POST['NationalityID']);
    // $StatusID = mysqli_escape_string($conn, $_POST['StatusID']);
    $JobID = mysqli_escape_string($conn, $_POST['JobID']);
    $Phone = mysqli_escape_string($conn, $_POST['Phone']);
    $Email = mysqli_escape_string($conn, $_POST['Email']);
    $NationalityID =  mysqli_escape_string($conn, $_POST['NationalityID']);
    $IsDeleted =isset($_POST['IsDeleted']) && $_POST['IsDeleted'] == 'on' ? 1 : 0;

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
        var_dump($_SESSION['ID']);


    $query =
        "INSERT INTO `employee` (`Code`,`EnName`,`DOB`,`SSN`,`Address`,GenderID,NationalityID,CreatedBy,JobID,Phone,Email,IsDeleted) VALUES ('" .
        $Code .
        "' , '" .
        $EnName .
        "' , '" .
        $DOB .
        "','" .
        $SSN .
        "',
        '" .
        $Address .
        "',
        '" .
        $GenderID .
        "',
        '" .
        $NationalityID .
        "',
        '" .
        $_SESSION['ID'] .
        "','" .
        $JobID .
        "',
        '" .
        $Phone .
        "',
        '" .
        $Email .
        "',
        '" .
        $IsDeleted .
        "'
        
        
        
        )";
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
    <title>addEmployee</title>

    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="src/js/jquery-3.6.0.min.js"></script>

</head>

<body>
    <?php include_once 'includes/header.php'; ?>
    <main>
        <div class="containerx px-5 mx-5">


            <section class="table-container">
                <h2 class="py-2"><i class="bi bi-person"></i> Add/Edit Employee</h2>
                <button class="btn btn-success  add-newuser-btn" role="button"><strong>+</strong></button>

                <table class="table  my-5">
                    <thead>
                        <tr class="text-center bg-dark text-white">
                            <th scope="col">#</th>
                            <th scope="col">Code
                            </th>
                            <th scope="col">EnName

                            </th>
                            <th scope="col">DOB

                            </th>
                            <th scope="col">SSN

                            </th>
                            <th scope="col">Address

                            </th>
                            <th scope="col">GenderID

                            </th>
                            <th scope="col">NationalityID

                            </th>
                            <th scope="col">CreatedBy

                            </th>
                            <th scope="col">JobID

                            </th>
                            <th scope="col">Phone

                            </th>
                            <th scope="col">Email

                            </th>
                           
                            <th scope="col">IsDeleted


                            </th>
                            <th scope="col">options


                            </th>
                        </tr>
                    </thead>
                    <tbody class="employee-table-body">
                        <?php
                        // Fetch All employee Data
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
                        $query = 'SELECT * FROM `employee`';
                        print $query;
                        $result = mysqli_query($conn, $query);
                        // var_dump($result);
                        while ($row = mysqli_fetch_assoc($result)) :
                            var_dump($row); ?>
                            <tr class="add-user-row">
                                <th scope="row">1</th>
                                <td>
                                    <input class="form-control bg-dark  text-white " value="<?= $row['Code'] ?>" type="text" placeholder="<?= $row['Code'] ?>" aria-label="<?= $row['Code'] ?>" disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark  text-white " value="<?= $row['EnName'] ?>" type="text" placeholder="<?= $row['EnName'] ?>" aria-label="<?= $row['EnName'] ?>" disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark  text-white  empCode" value="<?= $row['DOB'] ?>" type="text" placeholder="<?= $row['DOB'] ?>" aria-label="<?= $row['DOB'] ?>" disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" value="<?= $row['SSN'] ?>" type="SSN" type="text" placeholder="<?= $row['SSN'] ?>" aria-label="<?= $row['SSN'] ?>" disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" value="<?= $row['Address'] ?>" type="Address" type="text" placeholder="<?= $row['Address'] ?>" aria-label="<?= $row['Address'] ?>" disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" value="<?= $row['GenderID'] ?>" type="GenderID" type="text" placeholder="<?= $row['GenderID'] ?>" aria-label="<?= $row['GenderID'] ?>" disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" value="<?= $row['NationalityID'] ?>" type="NationalityID" type="text" placeholder="<?= $row['NationalityID'] ?>" aria-label="<?= $row['NationalityID'] ?>" disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" value="<?= $row['CreatedBy'] ?>" type="CreatedBy" type="text" placeholder="<?= $row['CreatedBy'] ?>" aria-label="<?= $row['CreatedBy'] ?>" disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" value="<?= $row['JobID'] ?>" type="JobID" type="text" placeholder="<?= $row['JobID'] ?>" aria-label="<?= $row['JobID'] ?>" disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" value="<?= $row['Phone'] ?>" type="Phone" type="text" placeholder="<?= $row['Phone'] ?>" aria-label="<?= $row['Phone'] ?>" disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" value="<?= $row['Email'] ?>" type="Email" type="text" placeholder="<?= $row['Email'] ?>" aria-label="<?= $row['Email'] ?>" disabled>
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" value="<?= $row['IsDeleted'] ?>" type="IsDeleted" type="text" placeholder="<?= $row['IsDeleted'] ?>" aria-label="<?= $row['IsDeleted'] ?>" disabled>
                                </td>
                             
                               
                               
                                <!-- <td>
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
                                </td> -->
                        
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
                            <form method="POST" action="addEmployee.php" enctype="multipart/form-data">
                                <th scope="row">2</th>
                                <td>
                                    <input class="form-control bg-dark  text-white " type="text" placeholder="Code" aria-label="Code" name="Code" id="Code" placeholder="Code" value="<?= isset(
                                                                                                                                                                                                                $_POST['Code']
                                                                                                                                                                                                            )
                                                                                                                                                                                                                ? $_POST['Code']
                                                                                                                                                                                                                : '' ?>">
                                </td>
                                <td>
                                    <input class="form-control bg-dark  text-white " type="text" placeholder="EnName" aria-label="EnName" name="EnName" id="EnName" placeholder="EnName" value="<?= isset(
                                                                                                                                                                                                                                $_POST['EnName']
                                                                                                                                                                                                                            )
                                                                                                                                                                                                                                ? $_POST['EnName']
                                                                                                                                                                                                                                : '' ?>">
                                </td>
                                <td>
                                    <input class="form-control bg-dark  text-white " type="text" placeholder="DOB" aria-label="DOB" name="DOB" id="DOB">
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" type="SSN" type="text" placeholder="SSN" aria-label="SSN" name="SSN" id="SSN" placeholder="enter your SSN" value="<?= isset(
                                                                                                                                                                                                                        $_POST['SSN']
                                                                                                                                                                                                                    )
                                                                                                                                                                                                                        ? $_POST['SSN']
                                                                                                                                                                                                                        : '' ?>">
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" type="Address" type="text" placeholder="Address" aria-label="Address " name="Address" id="Address" placeholder="enter your Address" value="<?= isset(
                                                                                                                                                                                                                                        $_POST['Address']
                                                                                                                                                                                                                                    )
                                                                                                                                                                                                                                        ? $_POST['Address']
                                                                                                                                                                                                                                        : '' ?>">
                                </td>
                            
                                <td>
                                    <input class="form-control bg-dark text-white" type="GenderID" type="text" placeholder="GenderID" aria-label="GenderID " name="GenderID" id="GenderID" placeholder="enter your GenderID" value="<?= isset(
                                                                                                                                                                                                                                        $_POST['GenderID']
                                                                                                                                                                                                                                    )
                                                                                                                                                                                                                                        ? $_POST['GenderID']
                                                                                                                                                                                                                                        : '' ?>">
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" type="NationalityID" type="text" placeholder="NationalityID" aria-label="NationalityID " name="NationalityID" id="NationalityID" placeholder="enter your NationalityID" value="<?= isset(
                                                                                                                                                                                                                                        $_POST['NationalityID']
                                                                                                                                                                                                                                    )
                                                                                                                                                                                                                                        ? $_POST['NationalityID']
                                                                                                                                                                                                                                        : '' ?>">
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" type="CreatedBy" type="text" placeholder="CreatedBy" aria-label="CreatedBy " name="CreatedBy" id="CreatedBy" placeholder="enter your CreatedBy" value="<?= isset(
                                                                                                                                                                                                                                        $_POST['CreatedBy']
                                                                                                                                                                                                                                    )
                                                                                                                                                                                                                                        ? $_POST['CreatedBy']
                                                                                                                                                                                                                                        : '' ?>">
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" type="JobID" type="text" placeholder="JobID" aria-label="JobID " name="JobID" id="JobID" placeholder="enter your JobID" value="<?= isset(
                                                                                                                                                                                                                                        $_POST['JobID']
                                                                                                                                                                                                                                    )
                                                                                                                                                                                                                                        ? $_POST['JobID']
                                                                                                                                                                                                                                        : '' ?>">
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" type="Phone" type="text" placeholder="Phone" aria-label="Phone " name="Phone" id="Phone" placeholder="enter your Phone" value="<?= isset(
                                                                                                                                                                                                                                        $_POST['Phone']
                                                                                                                                                                                                                                    )
                                                                                                                                                                                                                                        ? $_POST['Phone']
                                                                                                                                                                                                                                        : '' ?>">
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" type="Email" type="text" placeholder="Email" aria-label="Email " name="Email" id="Email" placeholder="enter your Email" value="<?= isset(
                                                                                                                                                                                                                                        $_POST['Email']
                                                                                                                                                                                                                                    )
                                                                                                                                                                                                                                        ? $_POST['Email']
                                                                                                                                                                                                                                        : '' ?>">
                                </td>
                                <td>
                                    <input class="form-control bg-dark text-white" type="IsDeleted" type="text" placeholder="IsDeleted" aria-label="IsDeleted " name="IsDeleted" id="IsDeleted" placeholder="enter your IsDeleted" value="<?= isset(
                                                                                                                                                                                                                                        $_POST['IsDeleted']
                                                                                                                                                                                                                                    )
                                                                                                                                                                                                                                        ? $_POST['IsDeleted']
                                                                                                                                                                                                                                        : '' ?>">
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