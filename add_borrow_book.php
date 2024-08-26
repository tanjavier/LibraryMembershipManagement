<?php
	session_start();
	
	error_reporting(0);

	include('connection.php');
	
	if(isset($_POST['add']))
	{
		$username=$_POST['username'];
		$email=$_POST['email'];
		$bookname=$_POST['bookname'];
		$isbn=$_POST['isbn'];
		
		$result1 = mysqli_query($conn,"SELECT * FROM user WHERE uUsername='$username';");
		
		$row1 = mysqli_fetch_assoc($result1);
		
		$getEmail=$row1['uEmail'];
		$getUsername=$row1['uUsername'];
		
		$result2 = mysqli_query($conn,"SELECT * FROM book WHERE bName='$bookname';");
		
		$row2 = mysqli_fetch_assoc($result2);
		
		$getBook=$row2['bName'];
		$getISBN=$row2['ISBN'];
		
		if($username!=$getUsername || $email!=$getEmail )
		{
			echo "<script>alert('User Information is Incorrect!')</script>";
		}
		elseif($bookname!=$getBook || $isbn!=$getISBN)
		{
			echo "<script>alert('Book Information is Incorrect!')</script>";
		}
		else
		{
			$sql="INSERT INTO `borrow` (`brID`, `bName`, `uUsername`, `uEmail`, `isbn`, `borrowDate`, `returnDate`, `status`) VALUES (NULL, '$bookname', '$username', '$email' ,'$isbn', current_timestamp(), NULL, '0')";
			
			$run=mysqli_query($conn,$sql); 
		
			echo '<script>alert("Borrow book successfully added"); window.location.href="admin_borrow_book.php";</script>';
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
                <h4 class="header-line text-center">Add Borrow Book</h4>
            </div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3""> <div class="panel panel-info">
				<div class="panel-heading">Borrow Book Information</div>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Username<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="username" autocomplete="off"  required>
						</div>
						<div class="form-group">
							<label>Email<span style="color:red;">*</span></label>
							<input class="form-control" type="email" name="email" autocomplete="off"  required>
						</div>
						<div class="form-group">
							<label>Book Name<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="bookname" autocomplete="off"  required>	
						</div>
						<div class="form-group">
							<label>ISBN<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="isbn" autocomplete="off"  required>	
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
