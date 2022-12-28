<?php
/* Class - CSCI 3800
 * Decription - This program obtains data from two tables and joins them, and then prints the data
 *              in a table using php and html.
 * Author - Christian Mundwiler
 * Version - 2022.09.27
 */
?>

<?php
    // get PDO arguments
    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
    $user_name = 'mgs_user';
    $password = 'pa55word';

    // use try catch block to pick up errors when connecting to database
    try {
        $db = new PDO($dsn, $user_name, $password);
    } catch (PDOException $e) {
        $error_message1 = $e->getMessage();
        echo '<p>An error occured while connecting to the database:</p>', $error_message1;
    }

    // join product ID, category, product name, list price columns
    // use try catch block for error catching
    try {
        $query = "SELECT productID, categoryName, productName, listPrice
                FROM categories
                INNER JOIN products
                ON categories.categoryID = products.categoryID
                ORDER BY listPrice";
        $result = $db->query($query);
    } catch (Exception $e) {
        $error_message2 = $e->getMessage();
        echo '<p>An error occured while selecting data from the database:</p>', $error_message2;
    }
?>

<!DOCTYPE html>
<html>
<head>
   <title>My Guitar Shop</title>
   <link rel="stylesheet" href="main.css" />
</head>

<!-- the body section -->
<body>
    <main>
        <h1>Product List</h1>
        <div id ="body">
            <table>
                <tr> 
                    <!-- set table column titles -->
                    <th>Product ID</th>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th class="right">Price</th> 
                </tr> 
                <!-- loop through joined table, populating table -->
                <?php foreach ($result as $row): ?> 
                    <tr>
                        <td><?php echo $row['productID']; ?></td>
                        <td><?php echo $row['categoryName']; ?></td>
                        <td><?php echo $row['productName']; ?></td>
                        <td class="right"><?php echo $row['listPrice']; ?></td>
                    </tr>
                <?php endforeach; ?> 
            </table>
        </div>
    </main> 
</body>
</html>