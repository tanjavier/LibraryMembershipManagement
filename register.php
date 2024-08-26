<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="css/u-register.css" rel="stylesheet">  
<?php
	
	include("connection.php");  
	  
	if(isset($_POST['register']))  
	{  
		$fname=$_POST["fname"];
		$uname=$_POST["uname"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$membership=$_POST["membership"];
		
		$result = mysqli_query($conn,"SELECT * FROM user WHERE uEmail='$email'");
		
		$run = mysqli_num_rows($result);
		
		if ($run) 
		{
			echo "<script>alert('Email already exists!')</script>";
		}
		else
		{	
			$sql = "INSERT INTO register (`rID`, `rName`, `rUsername`, `rPassword`, `rEmail`, `rMembership`, `rCreatedDate`) VALUES (NULL, '$fname', '$uname', '$password', '$email', '$membership', current_timestamp());";

			if (mysqli_query($conn, $sql)) 
			{
				echo '<script>alert("Thank you for registering, your account is now pending for approval!");
				window.location.href="index.php";</script>';
			}
			else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	}
?>
<body>
	<div class="container">
    	<br>
		<form method="post">
			<div class="form-input">
				<input type="text" style="text-align:center" name="fname" placeholder="Full name" autocomplete="off" required>	
			</div>
			<div class="form-input">
				<input type="text" style="text-align:center" name="uname" placeholder="Username" autocomplete="off" required>
			</div>
			<div class="form-input">
				<input type="email" style="text-align:center" name="email" placeholder="Email Address" autocomplete="off" required>
			</div>
            <div class="form-input">
				<input type="password" style="text-align:center" name="password" placeholder="Password" required>
			</div>
            <div class="form-input">
            	<select name="membership" required>
            	<option disabled selected value="">Membership Option</option>
      			<option value="1 Month">1 Month - 5.00</option>
      			<option value="6 Month">6 Month - 20.00</option>
                <option value="1 Year">1 Year - 30.00</option></select>
            </div>
            <div class="form-input">
            	<select name="payment" required>
            	<option disabled selected value="">Payment Option</option>
      			<option value="vs">Visa</option>
      			<option value="mc">MasterCard</option></select>
            </div>
            <div class="form-input">
				<input type="text" style="text-align:center" name="cnumber" placeholder="Card Number" autocomplete="off" required>
			</div>
            <div class="form-input">
				<input type="text" style="text-align:center" name="cname" placeholder="Card Name" autocomplete="off" required>
			</div>
            <div class="form-input">
				<input type="text" style="text-align:center" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Card Expire Date" required>
			</div>
            <div class="form-input">
				<input type="text" style="text-align:center" name="cvc" placeholder="Card CVC" autocomplete="off" required>
			</div>
            <input type="submit" name="register" value="REGISTER" class="btn-login">
		</form>
        <h4 style="color:white">Already have an acount?<br><a href="index.php"><u>Login Here</u></a></h4>
	</div>
</body>
</html>