<?php
    // get data using primary key
    require_once('../model/database.php');
    $course_id = $_POST['course_id'];

    try {
        $query = "SELECT * FROM Course
                WHERE COURSE_ID = '$course_id'";
        $sth = $db->query($query);
        $course = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error_message = $e->getMessage();
            echo '<p>An error occured while selecting data from the database:</p>', $error_message;
    }
?>

<?php include '../view/header.php'; ?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="../main.css?v=<?php echo time(); ?>" />
</head>
<!-- body section -->
<body>
    <div id="page">
        <div id="main">
            <h1>Update Course</h1>
            <form action="." method="post" id="update_course_form">
                <input type="hidden" name="action" value="update_course">
                <!-- display data -->
                <input type="hidden" name="course_id"
                            value="<?php echo $course['COURSE_ID']; ?>" />
                <br />

                <label>Title:</label>
                <input type="input" name="title"
                       value="<?php echo $course['TITLE']; ?>" />
                <br />

                <label>Professor:</label>
                <input type="input" name="professor"
                    value="<?php echo $course['PROFESSOR']; ?>" />
                <br />

                <label>Semester:</label>
                <select name="semester_time" id="semester_time">
                <option value="<?php echo "Winter"; ?>"><?php echo "Winter"; ?></option>
                <option value="<?php echo "Summer"; ?>"><?php echo "Summer"; ?></option>
                <option value="<?php echo "Fall"; ?>"><?php echo "Fall"; ?></option>
                </select>
                <br />

                <label>Year:</label>
                <input type="input" name="yr"
                       value="<?php echo $course['YEAR_COMPLETED']; ?>" />
                <br />

                <label>Grade:</label>
                <input type="input" name="grade"
                       value="<?php echo $course['GRADE']; ?>" />
                <br />

                <label>&nbsp;</label>
                <input type="submit" value = "Update Course" />
                <br />
            </form>
        </div>
        <!-- end main -->
    </div>
    <!-- end page -->
</body>
</html>
<?php include '../view/footer.php'; ?>