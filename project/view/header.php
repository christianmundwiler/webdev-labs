<?php 
    session_start();
    if(!$_SESSION['ID']){
        header('location:../view/login.php');
    }
?>

<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Academic History</title>
    <link rel="stylesheet" href="../new.css?v=<?php echo time(); ?>">
</head>

<!-- the body section -->
<body>
    <div id="page">
        <header>
            <h1 align="left"><?php echo ucfirst($_SESSION['FIRST_NAME']); ?>'s Academic History</h1>
                <a href="../view/logout.php?logout=true">Logout</a></div>
        </header>
    </div>
</body>



