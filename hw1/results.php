<?php
    // get the data from the form
    $name = $_POST['name']; 
    $hourly_pay = $_POST['hourly_pay']; 
    $hours_worked = $_POST['hours_worked'];

    // // validate name entry 
    // if ( empty($name) ) {
    //     $error_message = 'Name is a required field.'; 
    // } else if ( is_numeric($name) ) {
    //     $error_message = 'Name cannot be a number.'; 
    // }
    // // validate hourly pay entry
    // else if ( empty($hourly_pay) ) {
    //     $error_message = 'Hourly Pay is a required field.'; 
    // } else if ( !is_numeric($hourly_pay) ) {
    //     $error_message = 'Hourly Pay must be a valid number.'; 
    // } else if ( $hourly_pay <= 0 ) {
    //     $error_message = 'Hourly Pay must be greater than zero.';
    // }
    //     // validate hours worked entry
    // else if ( empty($hours_worked) ) {
    //     $error_message = 'Hours Worked is a required field.';
    // } else if ( !is_numeric($hours_worked) ) {
    //     $error_message = 'Hours Worked must be a valid number.';
    // } else if ( $hours_worked <= 0 ) {
    //     $error_message = 'Hours Worked must be greater than zero.';
    // }
    // // set error message to empty string if no invalid entries
    // else {
    //     $error_message = '';
    // }

    // // if an error message exists, go to the index page
    // if ($error_message != '') {
    //     include('index.php'); 
    //      exit(); }

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
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/> 
</head>
<body>
    <div id="content">
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