<!-- functions -->

<?php
function get_employees() {
    global $db;
    $query = "SELECT * FROM Employee
            INNER JOIN Job
            ON Employee.JOB_CODE = Job.JOB_CODE
            ORDER BY EMP_NUM";
    $results = $db->query($query);
    return $results;
}

function add_employee($employee_id, $first_name, $last_name, $emp_initial, $hire_date, $job_code) {
    global $db;
    $query = 'INSERT INTO Employee
                 (EMP_NUM, EMP_LNAME, EMP_FNAME, EMP_INITIAL, EMP_HIREDATE, JOB_CODE)
              VALUES
                 (:employee_id, :first_name, :last_name, :emp_initial, :hire_date, :job_code)';
    $statement = $db->prepare($query);
    $statement->bindValue(':employee_id', $employee_id);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':emp_initial', $emp_initial);
    $statement->bindValue(':hire_date', $hire_date);
    $statement->bindValue(':job_code', $job_code);
    $statement->execute();
    $statement->closeCursor();
}

function update_employee($employee_id, $first_name, $last_name, $emp_initial, $hire_date, $job_code) {
    global $db;
    $query = "UPDATE Employee
              SET EMP_FNAME    = '$first_name',
                  EMP_INITIAL  = '$emp_initial',
                  EMP_LNAME    = '$last_name',
                  EMP_HIREDATE = '$hire_date',
                  JOB_CODE     = '$job_code'
              WHERE EMP_NUM = '$employee_id'";
        $db->exec($query);
}

function delete_employee($employee_id) {
    global $db;
    $query = "DELETE FROM Employee
          WHERE EMP_NUM = :employee_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':employee_id', $employee_id);
    $statement->execute();
    $statement->closeCursor();
}
?>