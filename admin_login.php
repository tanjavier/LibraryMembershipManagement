<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="css/admin.css" rel="stylesheet">  
<?php
session_start();

include("connection.php");  
	if(isset($_POST['adsubmit']))  
	{  
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);	  
		
		$test="select * from admin where aEmail='$email' AND aPassword='$password'";

		$run = mysqli_query($conn, $test);
		
		if(mysqli_num_rows($run))  
		{	
			$_SESSION['email']=$email;	
			echo "<script>alert('Login successful')</script>";  
			echo "<script>window.open('admin_user.php','_self')</script>";	
		}  
		else  
		{  
			echo "<script>alert('Email or password is incorrect!')</script>";  
		} 
	}
?>
<body>
	<div class="container">
	<img src="image/icon.png">
		<form method="post">
			<div class="form-input">
				<input type="email" style="text-align:center" name="email" placeholder="Email address" autocomplete="off" required>	
			</div>
			<div class="form-input">
				<input type="password" style="text-align:center" name="password" placeholder="Password" required>
			</div>
			<input type="submit" name="adsubmit" value="LOGIN" class="btn-login">
		</form>
	</div>
</body>
</html>