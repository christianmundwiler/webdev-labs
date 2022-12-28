<?php
/*
* Description - This file takes Name, Hourly Pay, and Hours Worked information
* from the index.php file, and calculates the gross pay, deduction, and net pay,
* and then displays all of the information. 
* Author - Christian Mundwiler
* Version - 2022.09.08
*/
    // get the data from the form
    $name = $_POST['name']; 
    $hourly_pay = $_POST['hourly_pay']; 
    $hours_worked = $_POST['hours_worked'];

    // calculate pay
    $gross_pay = $hourly_pay * $hours_worked;
    $deduction = $gross_pay * 0.1;
    $net_pay = $gross_pay - $deduction;

    // apply formatting
    $hourly_pay_f = '$'.number_format($hourly_pay, 2); 
    $hours_worked_f = number_format($hours_worked, 0);
    $net_pay_f = '$'.number_format($net_pay, 2);
    $deduction_f = '$'.number_format($deduction, 2);
    $gross_pay_f = '$'.number_format($gross_pay, 2);
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Wage Calculator</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/> 
</head>
<body>
    <div id="content">
        <!-- display name and wage info -->
        <label>Name:</label>
        <span><?php echo $name; ?></span><br />
        <label>Hourly Pay:</label>
        <span><?php echo $hourly_pay_f; ?></span><br /> 
        <label>Hours Worked:</label>
        <span><?php echo $hours_worked_f; ?></span><br /> 
        <label>Gross Pay:</label>
        <span><?php echo $gross_pay_f; ?></span><br /> 
        <label>Deduction:</label>
        <span><?php echo $deduction_f; ?></span><br />
        <label>Net Pay:</label>
        <span><?php echo $net_pay_f; ?></span><br />
    </div> 
</body>
</html>