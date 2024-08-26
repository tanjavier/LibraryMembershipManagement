<?php
	session_start();
	error_reporting(0);
	
	include('connection.php');
	
	$bookName = $_GET['bookName'];
	
	if(isset($_POST['return']))
	{
		$Date=$_POST['date'];

		$sql = "update borrow set status='1', returnDate='$Date' where bName='$bookName'";
		
		$run=mysqli_query($conn,$sql);

		echo '<script>alert("Book successfully returned"); window.location.href="admin_borrow_book.php";</script>';	
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
				<h4 class="header-line text-center">Return Book</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1""> <div class="panel panel-info">
				<div class="panel-heading">Return Book Details</div>
					<div class="panel-body">
						<form method="post">
							<?php 
								$sql = "SELECT `uUsername`, `bName`, `isbn`, `borrowDate`, `returnDate` FROM `borrow` WHERE `bName`='$bookName'";
												
								$run=mysqli_query($conn,$sql); 
												
								while($row=mysqli_fetch_array($run)) 
								{  
									$username=$row[0];  
									$bookname=$row[1];
									$isbn=$row[2];
									$borrowdate=$row[3];   
							?>         
							<div class="form-group">
								<label>Username :</label>
								<?php echo htmlentities($username);?>
							</div>
							<div class="form-group">
								<label>Book Name :</label>
								<?php echo htmlentities($bookname);?>
							</div>
							<div class="form-group">
								<label>ISBN :</label>
								<?php echo htmlentities($isbn);?>
							</div>
							<div class="form-group">
								<label>Book Borrow Date :</label>
								<?php echo htmlentities($borrowdate);?>
							</div>
							<input type="hidden" name="date" value=<?=$date=date("Y-m-d H:i:s");?> required>
							<button type="submit" name="return" id="submit" class="btn btn-info" onclick="return confirm('Are you sure the book is returned?');"">Return Book </button>
							<?php } ?>
                        </form>
                    </div>
            </div>
        </div>
    </div>   
</div>
</body>
</html>
