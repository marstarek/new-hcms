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
     $Username = $_POST['Username'];
     $DisplayName = $_POST['DisplayName'];
     $EmployeeID = $_POST['EmployeeID'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $mac = $_POST['mac'];
     echo $EmployeeID;
     // $isAdmin = $_POST['isAdmin'];
     // $isActive = $_POST['isActive'];
 
    $query = "SELECT *  FROM `users` WHERE EmployeeID = $userID";
    $result = mysqli_query($conn, $query);
    if($result->num_rows == 1) {
$editQuery = " UPDATE `users` SET DisplayName='$DisplayName',Username='$Username' WHERE EmployeeID = $userID";
    $result = mysqli_query($conn, $editQuery);
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
