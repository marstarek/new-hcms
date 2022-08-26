<?php
include_once('../../db.php');
if (isset($_POST['deleteUser'])) {
     $userID = $_POST['userID'];
    $query = "SELECT *  FROM `users` WHERE EmployeeID = $userID";
    $result = mysqli_query($conn, $query);
    if($result->num_rows == 1) {
    $deleteQuery = "DELETE FROM `users` WHERE EmployeeID = $userID";
    $result = mysqli_query($conn, $deleteQuery);
    echo json_encode([
     'status' => 200,
     'message' => 'User Deleted Successfully !'
]);
// echo $query;
    } else {
     echo json_encode([
          'status' => 404,
          'message' => 'User ID Not Found'
     ]);
    }
//     echo $query;
}

?>

<?php
include_once('../../db.php');
if (isset($_POST['deleteUser'])) {
     $userID = $_POST['userID'];
    $query = "SELECT *  FROM `users` WHERE EmployeeID = $userID";
    $result = mysqli_query($conn, $query);
    if($result->num_rows == 1) {
    $deleteQuery = "DELETE FROM `users` WHERE EmployeeID = $userID";
    $result = mysqli_query($conn, $deleteQuery);
    echo json_encode([
     'status' => 200,
     'message' => 'User Deleted Successfully !'
]);
// echo $query;
    } else {
     echo json_encode([
          'status' => 404,
          'message' => 'User ID Not Found'
     ]);
    }
//     echo $query;
}
else if (isset($_POST['editRow'])) {
     $userID = $_POST['userID'];
     $Username =mysqli_escape_string($conn,$_POST['Username']);
     $DisplayName = mysqli_escape_string($conn,$_POST['DisplayName']);
     $EmployeeID =mysqli_escape_string($conn,$_POST['EmployeeID']) ;
     $email =mysqli_escape_string($conn,$_POST['email']) ;
     $userpassword =md5( $_POST['password']);
     $mac =mysqli_escape_string($conn,$_POST['mac']) ;
     $isAdmin = $_POST['isAdmin'];
     echo $Username;
     // $isActive = $_POST['isActive'];
 
    $query = "SELECT *  FROM `users` WHERE EmployeeID = $userID";
    $result = mysqli_query($conn, $query);
    if($result->num_rows == 1) {
$editQuery = " UPDATE `users` SET DisplayName='$DisplayName',Username='$Username' ,Email='$email',	Password='$userpassword' WHERE EmployeeID = $userID";
    $result = mysqli_query($conn, $editQuery);
    echo json_encode([
     'status' => 200,
     'message' => 'User updated Successfully !'
]);
// echo $query;
    } else {
     echo json_encode([
          'status' => 404,
          'message' => 'User ID Not Found'
     ]);
    }
//     echo $query;
}

?>
