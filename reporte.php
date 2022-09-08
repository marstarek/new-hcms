<?php 

include_once 'db.php'; 
 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
// Excel file name for download 
$fileName = "users_" . date('Y-m-d') . ".xls"; 
// Column names 
$fields = array('ID', 'Username', 'DisplayName', 'Email', 'Password', 'IsDeleted', 'isAdmin', 'IsActive', 'CreatedDate', 'EmployeeID', 'IsLeader'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$query = $conn->query("SELECT * FROM users "); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['ID'], $row['Username'], $row['DisplayName'], $row['Email'], $row['Password'], $row['IsDeleted'], $row['isAdmin'],$row['IsActive']
    , $row['CreatedDate'], $row['EmployeeID'], $row['IsLeader']
    
    
    ); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;
?>