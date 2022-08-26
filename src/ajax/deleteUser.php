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
