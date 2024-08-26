<?php
	session_start();
	error_reporting(0);
	
	include('connection.php');
	
	if(isset($_GET['del']))
	{
		$bookName=$_GET['del'];
		$sql = "DELETE FROM `book` WHERE `book`.`bName` = '$bookName'";
		$run=mysqli_query($conn,$sql); 
		header('location:admin_book.php');
	}
	
	if (isset($_GET['pageno'])) 
	{
		$pageno = $_GET['pageno'];
    } 
	else 
	{
        $pageno = 1;
    }
    
	$no_records = 7;
    $offset = ($pageno-1) * $no_records;
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
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line text-center">Manage Books</h4>
			</div>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Books Listing</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th>ID</th>
												<th>Book Name</th>
												<th>Category</th>
												<th>Author</th>
												<th>ISBN</th>
												<th>Registered Date</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$total_pages="SELECT COUNT(*) FROM book";
												
												$result = mysqli_query($conn,$total_pages);
												
												$total_rows = mysqli_fetch_array($result)[0];
												
												$total_pages = ceil($total_rows / $no_records);

												$sql = "SELECT `bID`, `bName`, `bCategory`, `bAuthor`, `ISBN`, `RegDate` FROM `book` LIMIT $offset, $no_records";
												
												$run = mysqli_query($conn,$sql);
												
												while($row=mysqli_fetch_array($run)) 
												{  
													$ID=$row[0];
													$bookName=$row[1];  
													$bookCategory=$row[2];  
													$bookAuthor=$row[3];  
													$bookISBN=$row[4];
													$bookRegDate=$row[5];
											?>                                      
											<tr>
												<td class="center"><?php echo htmlentities($ID);?></td>
												<td class="center"><?php echo htmlentities($bookName);?></td>
												<td class="center"><?php echo htmlentities($bookCategory);?></td>
												<td class="center"><?php echo htmlentities($bookAuthor);?></td>
												<td class="center"><?php echo htmlentities($bookISBN);?></td>
												<td class="center"><?php echo htmlentities($bookRegDate);?></td>
												<td class="center">
													<a href="admin_edit-b.php?bookName=<?php echo htmlentities($bookName);?>"><button class="btn btn-primary"> Edit</button> 
													<a href="admin_book.php?del=<?php echo htmlentities($bookName);?>" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"> Delete</button>
												</td>
											</tr>
											<?php } ?>                                      
										</tbody>
									</table>
									<ul class="pagination">
										<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
											<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
										</li>
										<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
											<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
										</li>	
									</ul>
								</div> 
							</div>
					</div>
				</div>
            </div>
    </div>      
</div>
</body>
</html>
