<?php
	session_start();
	
	error_reporting(0);

	include('connection.php');

	if(isset($_POST['add']))
	{
		$name=$_POST['name'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$email=$_POST['email'];
		$membership=$_POST['membership'];
		
		$result = mysqli_query($conn,"SELECT * FROM user;");
		
		$row = mysqli_fetch_assoc($result);
		
		$getEmail=$row['uEmail'];
		$getUsername=$row['uUsername'];
		
		if($username==$getUsername || $email==$getEmail )
		{
			echo "<script>alert('Username or email already exist!')</script>";
		}
		else
		{
			$sql="INSERT INTO `user` (`uID`, `uName`, `uUsername`, `uPassword`, `uEmail`, `uMembership`, `uCreatedDate`) VALUES (NULL, '$name', '$username', '$password', '$email', '$membership', current_timestamp())";
		
			$run=mysqli_query($conn,$sql); 
	
			echo '<script>alert("User successfully added")</script>';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('navbar.php')?>
<div class="content-wra <div class="content-wrapper">
    <div class="container">
		<div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line text-center">Add User</h4>
            </div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3""> <div class="panel panel-info">
				<div class="panel-heading">User Information</div>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Fullname<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="name" autocomplete="off"  required>
						</div>
						<div class="form-group">
							<label>Username<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="username" autocomplete="off"  required>	
						</div>
						<div class="form-group">
							<label>Password<span style="color:red;">*</span></label>
							<input class="form-control" type="password" name="password" autocomplete="off"  required>
						</div>
						<div class="form-group">
							<label>Email<span style="color:red;">*</span></label>
							<input class="form-control" type="email" name="email" autocomplete="off" required>			
						</div>
						<div class="form-group">
							<label>Membership Option<span style="color:red;">*</span></label>
							<select class="form-control" name="membership" required>
								<option value="">Select Membership</option>
								<option value="1 Month">1 Month</option>
								<option value="6 Month">6 Month</option>
								<option value="1 Year">1 Year</option>
							</select>
						</div>
						<button type="submit" name="add" class="btn btn-info">Add</button>
					</form>
                </div>
			</div>
        </div>
    </div>
</div>
</body>
</html>
