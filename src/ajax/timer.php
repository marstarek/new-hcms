<?php
include_once('../../db.php');
session_start();
var_dump($_SESSION['transId']);
if (isset($_POST["check"])) {
$usercode =intval( $_POST['userID']);
echo $usercode;
$query = "SELECT *  FROM `trans` WHERE code =$usercode";
$result = mysqli_query($conn, $query);
  $timeout = date('Y-m-d h:i:sa');

if ($result->num_rows == 1) {
     $editQuery = " UPDATE `trans` SET `timeout`='$timeout' WHERE code = $usercode";
     $result = mysqli_query($conn, $editQuery);
     print_r(json_encode([
          'status' => 200,
          'message' => 'User updated Successfully !'
     ]));
     
session_start();
 
$_SESSION = array();
 
 

session_destroy();
// header("Refresh:0,url=../../../../login.php");
exit;}
else {
     print_r(json_encode(['status' => 404, 'message' => 'User ID Not Found']));
}
     
}else if (isset($_POST["break"])) {
$usercode =intval( $_POST['userID']);
$query = "SELECT *  FROM `trans` WHERE code =$usercode";
$result = mysqli_query($conn, $query);
  $break = date('Y-m-d h:i:sa');

if ($result->num_rows == 1) {
     $editQuery = " UPDATE `trans` SET `break`='$break' WHERE code = $usercode";
     $result = mysqli_query($conn, $editQuery);
     print_r(json_encode([
          'status' => 200,
          'message' => 'User updated Successfully !'
     ]));}
else {
     print_r(json_encode(['status' => 404, 'message' => 'User ID Not Found']));
}}else if (isset($_POST["stop"])) {
$usercode =intval( $_POST['userID']);
$query = "SELECT *  FROM `trans` WHERE code =$usercode";
$result = mysqli_query($conn, $query);
  $endbreak = date('Y-m-d h:i:sa');

if ($result->num_rows == 1) {
     $editQuery = " UPDATE `trans` SET `endbreak`='$endbreak' WHERE code = $usercode";
     $result = mysqli_query($conn, $editQuery);
     print_r(json_encode([
          'status' => 200,
          'message' => 'User updated Successfully !'
     ]));}
else {
     print_r(json_encode(['status' => 404, 'message' => 'User ID Not Found']));
}}
?>