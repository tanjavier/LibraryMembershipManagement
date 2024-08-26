<?php 
	session_start();
	error_reporting(0);
	
	include('connection.php');
	 
	$email=$_SESSION['email'];

	$sql = "select * from user where uEmail='$email';";
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{		
			$username=$row["uUsername"];
			$membership=$row['uMembership'];
			$newDate=$row['uNewDate'];
			$cdate=$row['uCreatedDate'];
		}
	}
	
	if(empty($newDate))
	{
		if($membership=="1 Month")
		{
			$time=strtotime($cdate);
			$final=date("Y-m-d H:i:s", strtotime("+1 month", $time));
		}
		elseif($membership=="6 Month")
		{				
			$time=strtotime($cdate);
			$final=date("Y-m-d H:i:s", strtotime("+6 month", $time));
		}
		else
		{
			$time=strtotime($cdate);
			$final=date("Y-m-d H:i:s", strtotime("+1 year", $time));
		}
	}
	else
	{
		if($membership=="1 Month")
		{
			$time=strtotime($newDate);
			$final=date("Y-m-d H:i:s", strtotime("+1 month", $time));
		}
		elseif($membership=="6 Month")
		{
			$time=strtotime($newDate);
			$final=date("Y-m-d H:i:s", strtotime("+6 month", $time));
		}
		else
		{
			$time=strtotime($newDate);
			$final=date("Y-m-d H:i:s", strtotime("+1 year", $time));
		}
	}
	
	if(isset($_POST['renew']))
	{
		$Membership=$_POST['membership'];
		
		if($final>date("Y-m-d H:i:s")||$cdate>date("Y-m-d H:i:s"))
		{
			echo '<script>alert("Membership is not expired!");
			window.location.href="renewal.php";</script>'; 
		}
		elseif($final<=date("Y-m-d H:i:s")||$cdate<=date("Y-m-d H:i:s"))
		{
			$sql1="update user set uMembership='$Membership', uNewDate='$final' where uUsername='$username'";
		
			$run1=mysqli_query($conn,$sql1);
		
			echo '<script>alert("Payment has been received"); window.location.href="renewal.php";</script>';
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
<?php include('navbar-u.php');?>
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line text-center">Renew Membership</h4>
            </div>
        </div>
        <div class="row">        
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3""> <div class="panel panel-success">
                <div class="panel-heading">Renewal Details</div>
					<div class="panel-body">
                        <form method="post">
							<?php
								$email=$_SESSION['email'];
									
								$sql2 = "SELECT `uUsername`, `uMembership`, `uCreatedDate`, `uNewDate` FROM `user` WHERE `uEmail`='$email';";
													
								$run2=mysqli_query($conn,$sql2); 
													
								while($row=mysqli_fetch_array($run2)) 
								{
									$username=$row[0];
									$Membership=$row[1];
									$Cdate=$row[2];
									$Ndate=$row[3];
							?>         
							<div class="form-group">
								<label>Curent Expire Date : </label>
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
								<label>Previous Membership Option : </label>
								<?php echo htmlentities($Membership);?>
							</div>
							<div class="form-group">
								<label>Card Number<span style="color:red;">*</span></label>
								<input class="form-control" type="text" name="cNumber" autocomplete="off" required>
							</div>
							<div class="form-group">
								<label>Card Name<span style="color:red;">*</span></label>
								<input class="form-control" type="text" name="cName" autocomplete="off" required>
							</div>
							<div class="form-group">
								<label>Card Expire Date<span style="color:red;">*</span></label>
								<input class="form-control" type="text" name="cDate" onfocus="(this.type='date')" onblur="(this.type='text')" required>
							</div>
							<div class="form-group">
								<label>Card CVC<span style="color:red;">*</span></label>
								<input class="form-control" type="text" name="cvc" autocomplete="off" required>
							</div>
							<div class="form-group">
								<label>New Membership Option<span style="color:red;">*</span></label>
								<select class="form-control" name="membership" required>
									<option value="">Select Membership</option>
									<option value="1 Month">1 Month - 5.00</option>
									<option value="6 Month">6 Month - 20.00</option>
									<option value="1 Year">1 Year - 30.00</option>
								</select>
							</div>
							<button type="submit" name="renew" class="btn btn-success" id="submit" onclick="return confirm('Proceed with renewal?');"">Renew Membership</button>
							<?php }?>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>