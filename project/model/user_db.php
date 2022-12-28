<!-- functions -->
<?php
function get_course($userID) {
    global $db;
    $statement = "SELECT * FROM Course WHERE USER_ID = ? ORDER BY YEAR_COMPLETED, SEMESTER DESC";
    $query = $db->prepare($statement);
    $query->execute([$userID]);
    $results = $query->fetchAll();
    return $results;
}

function get_counts($user_id) {
    global $db;
    $statement = "SELECT COUNT(*) FROM Course WHERE USER_ID = ?";
    $query = $db->prepare($statement);
    $query->execute([$user_id]);
    $result = $query->fetch();
    return $result;
}

function  add_course($user_id, $course_title, $professor, $semester, $year_completed, $grade) {
    global $db;
    $sql = "INSERT INTO Course (USER_ID, TITLE, PROFESSOR, SEMESTER, YEAR_COMPLETED, GRADE) values(:uid, :title, :prof, :semest, :year_comp, :grade)";
    try{
        $handle = $db->prepare($sql);
        $params = [
            ':uid'=>$user_id,
            ':title'=>$course_title,
            ':prof'=>$professor,
            ':semest'=>$semester,
            ':year_comp'=>$year_completed,
            ':grade'=>$grade,
        ];

        $handle->execute($params);
        $success = 'Course has been created successfully. Login to access website.';
        return $success;
    }

    catch(PDOException $e){
        $errors = $e->getMessage();
        echo $errors;
        exit();
    }
}

function update_course($course_id, $title, $professor, $sem, $year, $grade) {
    global $db;
    $query = "UPDATE Course
              SET TITLE          = '$title',
                  PROFESSOR      = '$professor',
                  SEMESTER       = '$sem',
                  YEAR_COMPLETED = '$year',
                  GRADE          = '$grade'
              WHERE COURSE_ID    = '$course_id'";
        $db->exec($query);
}

function delete_course($course_id) {
    global $db;
    $query = "DELETE FROM Course
          WHERE COURSE_ID = :course_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();
    $statement->closeCursor();
}
?>