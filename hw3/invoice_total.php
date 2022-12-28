<?php
/*
 * Description - This program prompts user inputs for Customer Type & Invoice Subtotal and parses that input to
 * determine the discount. If the user inputs an incorrect Customer Type and/or Invoice Subtotal, an error 
 * message is displayed.
 * Author - Christian Mundwiler
 * Version - 2022.09.15
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice Total Calculator</title>
    <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>">
</head>
<body>
    <main>
        <h1>Invoice Total Calculator</h1>
        <p>Enter the values below and click "Calculate".</p>
        <form action="." method="post">
        <div id="data" >
            <label>Customer Type:</label>
            <input type="text" name="type" 
                   value="<?php echo htmlspecialchars($customer_type); ?>"><br>

            <?php if (!empty ($error_message_customer)) { ?>
            <p class="error">
            <?php echo $error_message_customer; ?>
            </p>
            <?php } ?>

            <label>Invoice Subtotal:</label>
            <input type="text" name="subtotal"
                   value="<?php echo htmlspecialchars($invoice_subtotal); ?>"><br>

            <?php if (!empty ($error_message_subtotal)) { ?>
            <p class="error">
            <?php echo $error_message_subtotal; ?>
            </p>
            <?php } ?>

            <label>Discount Percent:</label>
            <input type="text" disabled
                   value="<?php echo $percent; ?>"><span>%</span><br>

            <label>Discount Amount:</label>
            <input type="text" disabled
                   value="<?php echo $discount; ?>"><br>

            <label>Invoice Total:</label>
            <input type="text" disabled
                   value="<?php echo $total; ?>"><br>
        </div>
        <div id="buttons" >
            <label>&nbsp;</label>
            <input type="submit" value="Calculate" id="calculate_button"><br>
        </div>
        </form>

    </main>
</body>
</html>