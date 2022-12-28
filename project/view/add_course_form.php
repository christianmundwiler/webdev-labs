<?php include '../view/header.php'; ?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="../main.css?v=<?php echo time(); ?>" />
<!-- body section -->
<body>
        <div id="page">
            <div id="main">
                <h1>Add Course</h1>
                <form action="." method="post" id="add_course_form">
                    <input type="hidden" name="action" value="add_course">

                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['ID']; ?>" />

                    <label>Course Title:</label>
                    <input type="input" name="course_title" />
                    <br />

                    <label>Professor Name:</label>
                    <input type="input" name="professor" />
                    <br />

                    <label>Semester:</label>
                    <select name="semester" id="semester_time">
                    <option value="<?php echo "Winter"; ?>"><?php echo "Winter"; ?></option>
                    <option value="<?php echo "Summer"; ?>"><?php echo "Summer"; ?></option>
                    <option value="<?php echo "Fall"; ?>"><?php echo "Fall"; ?></option>
                    </select>
                    <br />

                    <label>Year:</label>
                    <input type="input" name="year_completed" />
                    <br />

                    <label>Grade:</label>
                    <input type="input" name="grade" />
                    <br />

                    <label>&nbsp;</label>
                    <input type="submit" value = "Add Course" />
                    <br />
                    <p class="pt-2"> Back to <a href="../view/user_history.php">history</a></p>
                </form>
            </div>
            <!-- end main -->
        </div>
    <!-- end page -->
    <?php include "footer.php"; ?>
</body>
</html>
