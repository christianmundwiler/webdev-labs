
<?php
$dsn = 'mysql:dbname=academics;host=localhost';
$user = 'manager';
$password = 'pa55word';

try
{
	$db = new PDO($dsn,$user,$password);
}
catch(PDOException $e)
{
	echo "PDO error".$e->getMessage();
	exit();
}
?>

