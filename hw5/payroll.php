<?php
    $dsn = 'mysql:host=localhost;dbname=payroll';
    $user_name = 'employee_manager';
    $password = 'pa55word';

    // use try catch block to pick up errors when connecting to database
    try {
        $db = new PDO($dsn, $user_name, $password);
    } catch (PDOException $e) {
        $error_message1 = $e->getMessage();
        echo '<p>An error occured while connecting to the database:</p>', $error_message1;
    }
?>