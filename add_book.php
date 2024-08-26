<?php
	session_start();
	
	error_reporting(0);

	include('connection.php');

	if(isset($_POST['add']))
	{
		$bookname=$_POST['bookname'];
		$category=$_POST['category'];
		$author=$_POST['author'];
		$isbn=$_POST['isbn'];
		
		$result = mysqli_query($conn,"SELECT * FROM book;");
		
		$row = mysqli_fetch_assoc($result);
		
		$getISBN=$row['ISBN'];
		
		if($isbn==$getISBN)
		{
			echo "<script>alert('Book already exist!')</script>";
		}
		else
		{
			$sql="INSERT INTO `book` (`bID`, `bName`, `bCategory`, `bAuthor`, `ISBN`, `RegDate`) VALUES (NULL, '$bookname', '$category', '$author', '$isbn', current_timestamp())";
		
			$run=mysqli_query($conn,$sql); 
	
			echo '<script>alert("Book successfully added")</script>';
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
                <h4 class="header-line text-center">Add Book</h4>
            </div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3""> <div class="panel panel-info">
				<div class="panel-heading">Book Information</div>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Book Name<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="bookname" autocomplete="off"  required>
						</div>
						<div class="form-group">
							<label> Category<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="category" autocomplete="off"  required>	
						</div>
						<div class="form-group">
							<label> Author<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="author" autocomplete="off"  required>
						</div>
						<div class="form-group">
							<label>ISBN Number<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="isbn" autocomplete="off" required>			
						</div>
						<button type="submit" name="add" class="btn btn-info">Add </button>
					</form>
                </div>
			</div>
        </div>
    </div>
</div>
</body>
</html>
