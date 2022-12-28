<!-- main landing page for academic history -->
<?php 
include '../view/header.php';
require '../model/database.php';
require '../model/user_db.php';
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>" />
</head>
<!-- the body section -->
<body>
    <div id = "page">
        <div id="content">
            <!-- display table of employess -->
            <?php
                global $db;
                $user_id = $_SESSION['ID'];
                $results = get_course($user_id);
                $result = get_counts($user_id);
                if($result[0] > 0) {
                    ?>
                    <table>
                    <tr>
                    <th class="center">Title</th>
                    <th class="center">Professor</th>
                    <th class="center">Semester</th>
                    <th class="center">Grade</th>
                    <th class="center">Action</th>
                    </tr>
                    <tr>
                    <?php foreach ($results as $row) :  ?>
                    <td class="center" style="min-width: 120px"><?php echo $row['TITLE'];?></td>
                    <td class="center" style="min-width: 120px"><?php echo $row['PROFESSOR'];?></td>
                    <td class="center" style="min-width: 120px"><?php echo $row['SEMESTER'] . " " . $row['YEAR_COMPLETED'];?></td>
                    <td class="center"><?php echo $row['GRADE'];?></td>
                    <td><form action="../controller/index.php" method="post">
                        <input type="hidden" name="action" value="show_update_course">
                        <input type="hidden" name="course_id" value="<?php echo $row['COURSE_ID']; ?>" />
                        <input type="submit" value="Update" />
                        </form>
                        <form action="../controller/index.php" method="post">
                        <input type="hidden" name="action" value="delete_course">
                        <input type="hidden" name="course_id" value="<?php echo $row['COURSE_ID']; ?>" />
                        <input type="submit" value="Delete" />
                        </form>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                    </table>
                    <?php
                }
                ?>
                <p><a href="../controller/index.php?action=show_add_course">Add New Course</a></p>
        </div>
    </div>
</body>
</html>

<?php include '../view/footer.php'; ?>