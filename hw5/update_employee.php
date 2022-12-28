<?php 
    // get data from user input
    $employee_id = $_POST['employee_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $emp_initial = $_POST['emp_initial'];
    $hire_date = $_POST['hire_date'];
    $job_code = $_POST['job_code'];

    // check inputs
    if (empty($employee_id) || empty($first_name) || empty($last_name) || empty($emp_initial) || empty($hire_date) || empty($job_code)) {
        $error = "Invalid empoyee data. Validly fill all fields and try again.";
        include('error.php');
    }
    else {
        // update employee
        require_once('payroll.php');
        $query = "UPDATE Employee
                  SET EMP_FNAME    = '$first_name',
                      EMP_INITIAL  = '$emp_initial',
                      EMP_LNAME    = '$last_name',
                      EMP_HIREDATE = '$hire_date',
                      JOB_CODE     = '$job_code'
                  WHERE EMP_NUM = '$employee_id'";
        $db->exec($query);
        include('index.php');
    }
?>