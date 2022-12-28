<?php
session_start();
require_once('../model/database.php');
include "../view/login_header.php";

if(isset($_POST['submit']))
{
	if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']))
	{
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$sql = "SELECT * FROM Users WHERE email = :email ";
			$handle = $db->prepare($sql);
			$params = ['email'=>$email];
			$handle->execute($params);
			if($handle->rowCount() > 0)
			{
				$getRow = $handle->fetch(PDO::FETCH_ASSOC);
				if(password_verify($password, $getRow['PASSWORD']))
				{
					unset($getRow['PASSWORD']);
					$_SESSION = $getRow;
					header('location:../view/user_history.php');
					exit();
				}
				else
				{$errors[] = "Wrong Email or Password.";}
			}
			else
			{$errors[] = "Wrong Email or Password.";}
		}
		else
		{$errors[] = "Email address format is not valid.";}
	}
	else
	{$errors[] = "Email and Password are required.";}
}
?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="../main.css?v=<?php echo time(); ?>" />
<!-- body section -->
<body>
	<div id="page">
		<div id="main">
				<h3>Login</h3>
				<?php 
					if(isset($errors) && count($errors) > 0)
					{
						foreach($errors as $error_msg)
						{
							echo '<div class="alert alert-danger">'.$error_msg.'</div>';
						}
					}
				?>
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<div class="form-group">
						<label>&nbsp;</label>
						<label for="email">Email:</label>
						<input type="text" name="email" placeholder="Enter Email" class="form-control" size="32">
					</div>
					<div class="form-group">
						<label>&nbsp;</label>
						<label for="email">Password:</label>
						<input type="password" name="password" placeholder="Enter Password" class="form-control" size="32">
					</div>
					<label>&nbsp;</label>
					<label>&nbsp;</label>

						<div class="vertical-center">
							<label>&nbsp;</label>
							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							<button onclick="location.href='../view/register.php'" type="button"> Register</button>
						</div>

				</form>
		</div>
	</div>
</body>
</html>

<?php include '../view/footer.php'; ?>