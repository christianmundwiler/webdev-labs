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
        // add employee to database
        require_once('payroll.php');
        $query = "INSERT INTO Employee
                     (EMP_NUM, EMP_LNAME, EMP_FNAME, EMP_INITIAL, EMP_HIREDATE, JOB_CODE)
                  VALUES
                     ('$employee_id', '$last_name', '$first_name', '$emp_initial', '$hire_date', '$job_code')";
        $db->exec($query);
        include('index.php');
    }
?>