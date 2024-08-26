<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="css/login.css" rel="stylesheet">  
<?php
	session_start();
	
	include("connection.php");  
	  
	if(isset($_POST['ursubmit']))  
	{  
		$email=$_POST['email'];  
		$password=$_POST['password'];  
	  
		$test="select * from register WHERE rEmail='$email'AND rPassword='$password'";  
		$test1="select * from user WHERE uEmail='$email'AND uPassword='$password'";  
	  
		$run=mysqli_query($conn,$test);  
		$run1=mysqli_query($conn,$test1);  
	  
		if(mysqli_num_rows($run))  
		{  
			echo '<script>alert("Your account is still being processed, please wait for approval from admins!");
			window.location.href="index.php";</script>'; 
		}  
		
		if(mysqli_num_rows($run1))  
		{ 
			echo "<script>alert('Login successful')</script>";
			$_SESSION['email']=$email;		
			echo "<script>window.open('user_profile.php','_self')</script>";
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
			<input type="submit" name="ursubmit" value="LOGIN" class="btn-login">
		</form>
        <h4 style="color:white"><a href="forgot_password.php"><u>Forgot Password?</u></a></h4>
        <span class="separate-text" style="color:white">or</span>
        <h4 style="color:white">Do not have an acount?<br><a href="register.php"><u>Register Here</u></a></h4>
	</div>
</body>
</html>