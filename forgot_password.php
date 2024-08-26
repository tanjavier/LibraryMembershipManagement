<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="css/f-password.css" rel="stylesheet">  
<?php
	include "connection.php";

	error_reporting(0);

	if(isset($_POST['change']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		
		$result = mysqli_query($conn,"SELECT * FROM user where uEmail='$email';");
		
		$row = mysqli_fetch_assoc($result);
		
		$getEmail=$row['uEmail'];
		$getPassword=$row['uPassword'];
		
		
		if($password!=$cpassword)
		{
			echo "<script>alert('New Password and Confirm Password does not match!')</script>";
		}
		elseif($cpassword==$getPassword)
		{
			echo "<script>alert('Password already exist!')</script>";
		}
		elseif($email==$getEmail && $password==$cpassword) 
		{
			$sql="update user set uPassword='$password' where uEmail='$email'";
		
			$run=mysqli_query($conn,$sql);
		
			echo '<script>alert("Password successfully changed"); window.location.href="index.php";</script>';	
		}
		else
		{
			echo "<script>alert('Unknown email!')</script>";
		}
	}
?>
<body>
	<div class="container">
    	<br>
		<form method="post">
			<div class="form-input">
				<input type="email" style="text-align:center" name="email" placeholder="Email Address" required autocomplete="off">
			</div>
			<div class="form-input">
				<input type="password" style="text-align:center" name="password" placeholder="New Password" required autocomplete="off">
			</div>
			<div class="form-input">
				<input type="password" style="text-align:center" name="cpassword" placeholder="Confirm Password" required autocomplete="off">
			</div>
            <input type="submit" name="change" value="CHANGE PASSWORD" class="btn-login">
			<h4 style="color:white"><a href="index.php"><u>Login Here</u></a></h4>
		</form>
	</div>
</body>
</html>