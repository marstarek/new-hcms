 <?php

include_once('../../db.php');
session_start();
if (isset($_POST["addtask"])) {

    $leaderaname=$_SESSION["leadername"];
    echo $leaderaname;
	$userTo	=$_POST["userTo"];
    // $userIdTo=$_POST["userIdTo"];
    // $leaderaName=$_POST["leaderaName"];	
    $leaderaID	=$_SESSION["EmployeeID"];
    $taskContent=$_POST["taskContent"];
    $taskTitle=$_POST["taskTitle"];
    // $createdAt=$_POST["createdAt"];
    $startIn=$_POST["startIn"];
    $deadLine=$_POST["deadLine"];

$queryx = "SELECT *  FROM `users` WHERE EmployeeID = '300'";
$response = mysqli_query($conn, $queryx);
if($response->num_rows == 1)
{ $query =
        "INSERT INTO `tasks` (`userTo`,`leaderaName`,`leaderaID`,`taskContent`,`taskTitle`,`createdAt`,`startIn`,`deadLine`,`status`,`userIdTo`) VALUES ('" .
        $userTo ."' , '" .$leaderaname . "','" .$leaderaID ."','" .$taskContent ."','" .$taskTitle ."' ,SYSDATE(),'" . $startIn ."',
        '" .
        $deadLine .
        "','" .
        '0' .
        "','" .
        '0' .
        "'
        )";
    var_dump($query);
    mysqli_query($conn, $query);

     print_r(json_encode([
          'status' => 200,
          'message' => 'User updated Successfully !'
     ]));}else {
       print_r(json_encode(['status' => 404, 'message' => 'User ID Not Found']));
}
    
    
    
    }

    ?>