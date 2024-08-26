<?php 
	session_start();
	error_reporting(0);
	
	include('connection.php');
	 
	$email=$_SESSION['email'];

	if(isset($_POST['update']))
	{
		$Name=$_POST['name'];
		$Username=$_POST['username'];
		$Password=$_POST['password'];
		$Email=$_POST['email'];
		
		$sql1="update user set uName='$Name', uUsername='$Username', uPassword='$Password', uEmail='$Email' where uUsername='$Username'";
		
		$run1=mysqli_query($conn,$sql1);
		
		echo '<script>alert("User successfully updated"); window.location.href="user_profile.php";</script>';	
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
<?php include('navbar-u.php');?>
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line text-center">My Profile</h4>
            </div>
        </div>
        <div class="row">        
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3""> <div class="panel panel-primary">
                <div class="panel-heading">My Profile</div>
					<div class="panel-body">
                        <form method="post">
							<?php
								$email=$_SESSION['email'];
									
								$sql2 = "SELECT `uID`, `uName`, `uUsername`, `uPassword`, `uEmail`, `uMembership`, `uCreatedDate`, `uNewDate` FROM `user` WHERE `uEmail`='$email';";
													
								$run2=mysqli_query($conn,$sql2); 
													
								while($row=mysqli_fetch_array($run2)) 
								{  
									$Id=$row[0];  
									$Name=$row[1];
									$Username=$row[2];
									$Password=$row[3];
									$Email=$row[4]; 
									$Membership=$row[5];
									$Cdate=$row[6];
									$Ndate=$row[7];
							?>         
							<div class="form-group">
								<label>User ID : </label>
								<?php echo htmlentities($Id);?>
							</div>
							<div class="form-group">
								<label>Register Date : </label>
								<?php echo htmlentities($Cdate);?>
							</div>
							<div class="form-group">
								<label>Membership Option : </label>
								<?php echo htmlentities($Membership);?>
							</div>
							<div class="form-group">
								<label>Expire Date : </label>
								<?php
									if(empty($Ndate))
									{
										if($Membership=="1 Month")
										{
											$time=strtotime($Cdate);
											$final=date("Y-m-d H:i:s", strtotime("+1 month", $time));
										}
										elseif($Membership=="6 Month")
										{
											$time=strtotime($Cdate);
											$final=date("Y-m-d H:i:s", strtotime("+6 month", $time));
										}
										else
										{
											$time=strtotime($Cdate);
											$final=date("Y-m-d H:i:s", strtotime("+1 year", $time));
										}
										echo htmlentities($final);
									}
									else
									{
										if($Membership=="1 Month")
										{
											$time=strtotime($Ndate);
											$final=date("Y-m-d H:i:s", strtotime("+1 month", $time));
										}
										elseif($Membership=="6 Month")
										{
											$time=strtotime($Ndate);
											$final=date("Y-m-d H:i:s", strtotime("+6 month", $time));
										}
										else
										{
											$time=strtotime($Ndate);
											$final=date("Y-m-d H:i:s", strtotime("+1 year", $time));
										}
										echo htmlentities($final);
									}
								?>
							</div>
							<div class="form-group">
								<label>Fullname<span style="color:red;">*</span></label>
								<input class="form-control" type="text" name="name" autocomplete="off" value="<?=$Name?>" required>
							</div>
							<div class="form-group">
								<label> Username<span style="color:red;">*</span></label>
								<input class="form-control" type="text" name="username" autocomplete="off" value="<?= $Username ?>" required>	
							</div>
							<div class="form-group">
								<label> Password<span style="color:red;">*</span></label>
								<input class="form-control" type="text" name="password" autocomplete="off" value="<?= $Password ?>" required>
							</div>
							<div class="form-group">
								<label>Email<span style="color:red;">*</span></label>
								<input class="form-control" type="email" name="email" autocomplete="off" value="<?= $Email ?>" required>			
							</div>
							<button type="submit" name="update" class="btn btn-primary" id="submit">Update</button>
							<?php }?>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>