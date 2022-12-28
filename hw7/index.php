<?php
if (!isset ($city_name)) {$city_name = '';}
?>
<!DOCTYPE html>
<html>
    <title>Weather App</title>
    <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>" />
</head>
<!-- body section -->
<body>
    <main>
        <h1>Weather Application</h1>
        <form action="display_result.php" method="post">

            <p>Enter your city below and click "Submit".</p>
            
            <div id="data">
                <!-- display data -->
                <label>City:</label>
                <input type="text" name="city_name"
                        value="<?php echo ($city_name); ?>"><br>
            </div> 

            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Submit"><br>
            </div>
        </form>
    </div>
</body>
</html>