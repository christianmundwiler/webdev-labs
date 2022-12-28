<?php
// get IDs
$employee_id = $_POST['employee_id'];

// delete employee from database
require_once('payroll.php');
$query = "DELETE FROM Employee
          WHERE EMP_NUM = '$employee_id'";
$db->exec($query);

include('index.php');
?>