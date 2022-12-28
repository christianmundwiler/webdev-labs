<?php
/* Class - CSCI 3800
 * Decription - This program allows authorized users to add, update, and delete employees from a database.
 * Author - Christian Mundwiler
 * Version - 2022.10.6
 */
?>


<?php
    require_once('payroll.php');

    // get employee ids
    $employee_id = $_GET['employee_id'];
    if (!isset($category_id)) {
        $category_id = 1;
    }

    try {
        $query = "SELECT EMP_NUM, EMP_LNAME, EMP_FNAME, EMP_INITIAL, EMP_HIREDATE, JOB_DESCRIPTION, JOB_CHARGE_HOUR
                FROM Employee
                INNER JOIN Job
                ON Employee.JOB_CODE = Job.JOB_CODE
                ORDER BY EMP_NUM";
        $result = $db->query($query);
    } catch (Exception $e) {
        $error_message2 = $e->getMessage();
        echo '<p>An error occured while selecting data from the database:</p>', $error_message2;
    }
?>

<!DOCTYPE html>
<html>
<head>
   <title>Payroll</title>
   <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>" />
</head>
<!-- the body section -->
<body>
    <div id = "page">
        <div id="header">
            <h1>Employee Manager</h1>
        </div>
        <div id="content">
            <!-- display table of employess -->
            <table>
                <tr>
                    <th>Emp ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Initial</th>
                    <th>Hire Date</th>
                    <th>Job Description</th>
                    <th>Charge per Hour</th>
                    <th class = "left">Action</th>
                </tr>
                <?php foreach ($result as $row) : ?>
                <tr>
                    <td><?php echo $row['EMP_NUM']; ?></td>
                    <td><?php echo $row['EMP_LNAME']; ?></td>
                    <td><?php echo $row['EMP_FNAME']; ?></td>
                    <td><?php echo $row['EMP_INITIAL']; ?></td>
                    <td><?php echo $row['EMP_HIREDATE']; ?></td>
                    <td><?php echo $row['JOB_DESCRIPTION']; ?></td>
                    <td><?php echo $row['JOB_CHARGE_HOUR']; ?></td>
                    <td><form action="update_employee_form.php" method="post"
                                id="update_employee_form">
                        <input type="hidden" name="employee_id"
                            value="<?php echo $row['EMP_NUM']; ?>" />
                        <input type="submit" value="Update" />
                        </form>
                        <form action="delete_employee.php" method="post"
                                id="delete_product_form">
                        <input type="hidden" name="employee_id"
                            value="<?php echo $row['EMP_NUM']; ?>" />
                        <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
                <p><a href="add_employee_form.php">Add New Employee</a></p>
        </div>
    </div>
</body>
</html>
