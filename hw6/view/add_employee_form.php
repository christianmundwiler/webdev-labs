<!-- form to add employee -->

<?php include '../view/header.php'; ?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="../mainHW6.css?v=<?php echo time(); ?>" />
</head>
<!-- body section -->
<body>
    <div id="page">
        <div id="main">
            <h1>Add Employee</h1>
            <form action="." method="post" id="add_employee_form">
                <input type="hidden" name="action" value="add_employee">

                <label>Employee ID:</label>
                <input type="input" name="employee_id" />
                <br />

                <label>First Name:</label>
                <input type="input" name="first_name" />
                <br />

                <label>Last Name:</label>
                <input type="input" name="last_name" />
                <br />

                <label>Initial:</label>
                <input type="input" name="emp_initial" />
                <br />

                <label>Hire Date:</label>
                <input type="date" name="hire_date" />
                <br />

                <label>Job Code:</label>
                <input type="input" name="job_code" />
                <br />

                <label>&nbsp;</label>
                <input type="submit" value = "Add Employee" />
                <br />
            </form>
        </div>
        <!-- end main -->
    </div>
    <!-- end page -->
</body>
</html>
<?php include '../view/footer.php'; ?>