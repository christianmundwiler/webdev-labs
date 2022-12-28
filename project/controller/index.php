<?php
/* Class - CSCI 3800
 * Decription - This program allows users to register an account registered users to add, update, and delete courses from a database. It is 
 *              structured in a MVC format.
 * Author - Christian Mundwiler
 * Version - 2022.12.06
 */
?>

<?php
require('../model/database.php');
require('../model/user_db.php');

// filter inputs
$action = filter_input (INPUT_POST, 'action');
if ($action == NULL) {
	$action = filter_input (INPUT_GET, 'action');
	if ($action == NULL) {
		$action = 'login_page';
	}
}

if ($action == 'login_page') {
    include('../view/login.php');
}

else if ($action == 'user_history') {
    include('../view/user_history.php');
}

else if ($action == 'show_add_course') {
    include('../view/add_course_form.php');
}

else if ($action == "show_update_course") {
    include('../view/update_course_form.php');
}

else if ($action == 'add_course') {
    $user_id = filter_input(INPUT_POST, 'user_id');
    $course_title = filter_input(INPUT_POST, 'course_title');
    $professor = filter_input(INPUT_POST, 'professor');
    $semester = filter_input(INPUT_POST, 'semester');
    $year_completed = filter_input(INPUT_POST, 'year_completed');
    $grade = filter_input(INPUT_POST, 'grade');

    if (empty($user_id) || empty($course_title) || empty($professor) || empty($semester) || empty($year_completed) || empty($grade)) {
        $error = "Invalid course data. Validly fill all fields and try again.";
        include('../view/error.php');
    }
    else {
        $message = add_course($user_id, $course_title, $professor, $semester, $year_completed, $grade);
        header("Location: ../view/user_history.php");
    }
}

else if ($action == 'update_course') {
    $course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title');
    $professor = filter_input(INPUT_POST, 'professor');
    $sem = filter_input(INPUT_POST, 'semester_time');
    $year = filter_input(INPUT_POST, 'yr');
    $grade = filter_input(INPUT_POST, 'grade');

    if (empty($course_id) || empty($title) || empty($professor) || empty($sem) || empty($year) || empty($grade)) {
        $error = "Invalid course data. Validly fill all fields and try again.";
        include('../view/error.php');
    }
    else {
        update_course($course_id, $title, $professor, $sem, $year, $grade);
        header("Location: ../view/user_history.php");
    }
}

else if ($action == 'delete_course') {
    $course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT);
    delete_course($course_id);
    header("Location: ../view/user_history.php");
}
?>