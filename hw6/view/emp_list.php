<!-- list employees -->
<?php include '../view/header.php'; ?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="../mainHW6.css?v=<?php echo time(); ?>" />
</head>
<!-- the body section -->
<body>
    <div id = "page">
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
                <?php foreach ($results as $row) : ?>
                <tr>
                    <td><?php echo $row['EMP_NUM']; ?></td>
                    <td><?php echo $row['EMP_LNAME']; ?></td>
                    <td><?php echo $row['EMP_FNAME']; ?></td>
                    <td><?php echo $row['EMP_INITIAL']; ?></td>
                    <td><?php echo $row['EMP_HIREDATE']; ?></td>
                    <td><?php echo $row['JOB_DESCRIPTION']; ?></td>
                    <td class="right"><?php echo $row['JOB_CHARGE_HOUR']; ?></td>
                    <td><form action="." method="post">
                        <input type="hidden" name="action"
                                value="show_update_employee">
                        <input type="hidden" name="employee_id"
                            value="<?php echo $row['EMP_NUM']; ?>" />
                        <input type="submit" value="Update" />
                        </form>
                        <form action="." method="post">
                        <input type="hidden" name="action"
                                value="delete_employee">
                        <input type="hidden" name="employee_id"
                                value="<?php echo $row['EMP_NUM']; ?>" />
                        <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
                <p><a href="index.php?action=show_add_employee">Add New Employee</a></p>
        </div>
    </div>
</body>
</html>
<?php include '../view/footer.php'; ?>