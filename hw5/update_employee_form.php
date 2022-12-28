<?php
    // get data using primary key
    require_once('payroll.php');
    $employee_id = $_POST['employee_id'];

    try {
        $query = "SELECT * FROM Employee
                WHERE EMP_NUM = '$employee_id'";
        $sth = $db->query($query);
        $employee = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error_message = $e->getMessage();
        echo '<p>An error occured while selecting data from the database:</p>', $error_message;
    }
?>


<!DOCTYPE html>
<html>
    <title>Payroll</title>
    <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>" />
</head>
<!-- body section -->
<body>
    <div id="page">
        <div id="header">
            <h1>Employee Manager</h1>
        </div>

        <div id="main">
            <h1>Update Employee</h1>
            <form action="update_employee.php" method="post"
                  id="update_employee_form">

                <!-- display data -->
                <label>Employee ID:</label>
                <label><?php echo $employee['EMP_NUM']; ?></label>
                <input type="hidden" name="employee_id"
                            value="<?php echo $employee['EMP_NUM']; ?>" />
                <br />

                <label>First Name:</label>
                <input type="input" name="first_name"
                       value="<?php echo $employee['EMP_FNAME']; ?>" />
                <br />

                <label>Initial:</label>
                <input type="input" name="emp_initial"
                    value="<?php echo $employee['EMP_INITIAL']; ?>" />
                <br />

                <label>Last Name:</label>
                <input type="input" name="last_name"
                       value="<?php echo $employee['EMP_LNAME']; ?>" />
                <br />

                <label>Hire Date:</label>
                <input type="date" name="hire_date"
                       value="<?php echo $employee['EMP_HIREDATE']; ?>" />
                <br />

                <label>Job Code:</label>
                <input type="input" name="job_code"
                       value="<?php echo $employee['JOB_CODE']; ?>" />
                <br />

                <label>&nbsp;</label>
                <input type="submit" value = "Update Employee" />
                <br />
            </form>
        </div>
        <!-- end main -->
    </div>
    <!-- end page -->
</body>
</html>