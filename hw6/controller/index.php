<?php
/* Class - CSCI 3800
 * Decription - This program allows authorized users to add, update, and delete employees from a database. It is 
 *              structured in a MVC format.
 * Author - Christian Mundwiler
 * Version - 2022.10.27
 */
?>

<?php
require('../model/database.php');
require('../model/emp_db.php');

// filter inputs
$action = filter_input (INPUT_POST, 'action');
if ($action == NULL) {
	$action = filter_input (INPUT_GET, 'action');
	if ($action == NULL) {
		$action = 'list_employees';
	}
}

if ($action == 'list_employees') {
    $results = get_employees();
    include('../view/emp_list.php');
}

else if ($action == 'show_add_employee') {
    include('../view/add_employee_form.php');
}

else if ($action == 'show_update_employee') {
    include('../view/update_employee_form.php');
}

else if ($action == 'add_employee') {
    $employee_id = filter_input(INPUT_POST, 'employee_id', FILTER_VALIDATE_INT);
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $emp_initial = filter_input(INPUT_POST, 'emp_initial');
    $hire_date = filter_input(INPUT_POST, 'hire_date');
    $job_code = filter_input(INPUT_POST, 'job_code');

    if (empty($employee_id) || empty($first_name) || empty($last_name) || empty($emp_initial) || empty($hire_date) || empty($job_code)) {
        $error = "Invalid empoyee data. Validly fill all fields and try again.";
        include('../view/error.php');
    }
    else {
        add_employee($employee_id, $first_name, $last_name, $emp_initial, $hire_date, $job_code);
        header("Location: .");
    }
}

else if ($action == 'delete_employee') {
    $employee_id = filter_input(INPUT_POST, 'employee_id', FILTER_VALIDATE_INT);
    delete_employee($employee_id);
    header("Location: .");
}

else if ($action == 'update_employee') {
    $employee_id = filter_input(INPUT_POST, 'employee_id', FILTER_VALIDATE_INT);
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $emp_initial = filter_input(INPUT_POST, 'emp_initial');
    $hire_date = filter_input(INPUT_POST, 'hire_date');
    $job_code = filter_input(INPUT_POST, 'job_code');

    print"stop.";

    if (empty($employee_id) || empty($first_name) || empty($last_name) || empty($emp_initial) || empty($hire_date) || empty($job_code)) {
        $error = "Invalid empoyee data. Validly fill all fields and try again.";
        include('../view/error.php');
    }
    else {
        update_employee($employee_id, $first_name, $last_name, $emp_initial, $hire_date, $job_code);
        header("Location: .");
    }
}
?>