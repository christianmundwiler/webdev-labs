

<!DOCTYPE html>
<html> 
<head>
    <title>Wage Calculator</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/> 
</head>

<body>
    <div id="content">
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p> 
    <?php } ?>
    <form action="results.php" method="post">

        <div id="data">
            <label>Name:</label> 
            <input type="text" name="name"
                value="<?php echo $name; ?>"/><br />

            <label>Hourly Pay:</label> 
            <input type="text" name="hourly_pay"
                value="<?php echo $hourly_pay; ?>"/><br />

            <label>Hours Worked:</label> 
            <input type="text" name="hours_worked"
                value="<?php echo $hours_worked; ?>"/><br />
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"/><br />
        </div>
        
    </form>
    </div> 
</body>
</html>