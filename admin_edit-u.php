<?php
	session_start();
	
	error_reporting(0);
	
	$userName=$_GET["userName"];
	
	include('connection.php');
	
	$sql = "select * from user where uUsername='$userName';";
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			$name=$row["uName"];
			$username=$row["uUsername"];
			$password=$row["uPassword"];
			$email=$row["uEmail"];
			$membership=$row['uMembership'];
		}
	}
	
	if(isset($_POST['update']))
	{
		$Name=$_POST['name'];
		$Username=$_POST['username'];
		$Password=$_POST['password'];
		$Email=$_POST['email'];
		$Membership=$_POST['membership'];
		
		$sql="update user set uName='$Name', uUsername='$Username', uPassword='$Password', uEmail='$Email', uMembership='$Membership' where uUsername='$userName'";
		
		$run=mysqli_query($conn,$sql);
		
		echo '<script>alert("User successfully edited"); window.location.href="admin_user.php";</script>';	
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
<?php include('navbar.php');?>
<div class="content-wra <div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line text-center">Edit User</h4>    
            </div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3""> <div class="panel panel-info">
				<div class="panel-heading">User Information</div>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Fullname<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="name" autocomplete="off" value="<?=$name?>" required>
						</div>
						<div class="form-group">
							<label> Username<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="username" autocomplete="off" value="<?= $username ?>" required>	
						</div>
						<div class="form-group">
							<label> Password<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="password" autocomplete="off" value="<?= $password ?>" required>
						</div>
						<div class="form-group">
							<label>Email<span style="color:red;">*</span></label>
							<input class="form-control" type="email" name="email" autocomplete="off" value="<?= $email ?>" required>			
						</div>
						<div class="form-group">
							<label>Membership Option<span style="color:red;">*</span></label>
							<select class="form-control" name="membership" required>
								<option value="">Select Membership</option>
								<option value="1 Month" <?php if($membership=="1 Month"){echo "selected";}?>>1 Month</option>
								<option value="6 Month" <?php if($membership=="6 Month"){echo "selected";}?>>6 Month</option>
								<option value="1 Year" <?php if($membership=="1 Year"){echo "selected";}?>>1 Year</option>
							</select>
						</div>
						<button type="submit" name="update" class="btn btn-info">Update </button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

