<?php
	session_start();
	
	error_reporting(0);
	
	$bookName=$_GET["bookName"];
	
	include('connection.php');
	
	$sql = "select * from book where bName='$bookName';";
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			$bookname=$row["bName"];
			$category=$row["bCategory"];
			$author=$row["bAuthor"];
			$isbn=$row["ISBN"];
		}
	}
	
	if(isset($_POST['update']))
	{
		$bookname=$_POST['bookname'];
		$category=$_POST['category'];
		$author=$_POST['author'];
		$isbn=$_POST['isbn'];
		
		$sql="update book set bName='$bookname', bCategory='$category', bAuthor='$author', ISBN='$isbn' where bName='$bookName'";
		
		$run=mysqli_query($conn,$sql);
		
		echo '<script>alert("Book successfully edited"); window.location.href="admin_book.php";</script>';	
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
                <h4 class="header-line text-center">Edit Book</h4>    
            </div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3""> <div class="panel panel-info">
				<div class="panel-heading">Book Information</div>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Book Name<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="bookname" autocomplete="off" value="<?=$bookname?>" required>
						</div>
						<div class="form-group">
							<label> Category<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="category" autocomplete="off" value="<?= $category ?>" required>	
						</div>
						<div class="form-group">
							<label> Author<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="author" autocomplete="off" value="<?= $author ?>" required>
						</div>
						<div class="form-group">
							<label>ISBN Number<span style="color:red;">*</span></label>
							<input class="form-control" type="text" name="isbn" autocomplete="off" value="<?= $isbn ?>" required>			
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

