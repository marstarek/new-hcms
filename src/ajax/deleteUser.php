

<?php
include_once('../../db.php');
if (isset($_POST['deleteUser'])) {
     $userID = $_POST['userID'];
     $query = "SELECT *  FROM `users` WHERE EmployeeID = $userID";
     $result = mysqli_query($conn, $query);
     if ($result->num_rows == 1) {
          //     $deleteQuery = "DELETE FROM `users` WHERE EmployeeID = $userID";
          $deleteQuery = "UPDATE `users` SET IsDeleted = 1 WHERE EmployeeID = $userID";
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
} else if (isset($_POST['editRow'])) {
     $userID = $_POST['userID'];
     $empCode = $_POST['empCode'];
     $Username = isset($_POST['Username']) ? mysqli_escape_string($conn, $_POST['Username']) : "Error";
     $email = isset($_POST['email']) ? mysqli_escape_string($conn, $_POST['email']) : "Error";
     $userpassword = isset($_POST['password']) ? mysqli_escape_string($conn, md5($_POST['password'])) : "Error";
     $mac = isset($_POST['mac']) ? mysqli_escape_string($conn, $_POST['mac']) : "Error";
     $DisplayName = isset($_POST['DisplayName']) ? mysqli_escape_string($conn, $_POST['DisplayName']) : "Error";
     // $isAdmin = $_POST['isAdmin'];
     // echo $Username;
     // $isActive = $_POST['isActive'];

     $query = "SELECT *  FROM `users` WHERE ID = $userID";
     $result = mysqli_query($conn, $query);
     if ($result->num_rows == 1) {
          $editQuery = " UPDATE `users` SET DisplayName='$DisplayName',Username='$Username' ,Email='$email',	Password='$userpassword' WHERE ID = $userID";
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
