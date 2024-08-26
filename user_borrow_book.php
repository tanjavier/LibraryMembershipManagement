<?php
	session_start();
	error_reporting(0);
	
	include('connection.php');
	
	$email=$_SESSION['email'];
	
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
<?php include('navbar-u.php')?>
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line text-center">Borrow Books</h4>
			</div>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">Borrow Books Listing</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th>#</th>
												<th>Book Name</th>
												<th>ISBN</th>
												<th>Borrow Date</th>
												<th>Return Date</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$email=$_SESSION['email'];
												
												$total_pages="SELECT COUNT(*) FROM borrow WHERE uEmail='$email'";
												
												$result = mysqli_query($conn,$total_pages);
												
												$total_rows = mysqli_fetch_array($result)[0];
												
												$total_pages = ceil($total_rows / $no_records);
												
												$cnt=1;
												
												$sql = "SELECT `bName`, `ISBN`, `borrowDate`, `returnDate`, `status` FROM `borrow` WHERE `uEmail`='$email' LIMIT $offset, $no_records";
												
												$run = mysqli_query($conn,$sql);
												
												while($row=mysqli_fetch_array($run)) 
												{  
													$bookname=$row[0];  
													$isbn=$row[1];  
													$borrowdate=$row[2];
													$returndate=$row[3];
													$sta=$row[4];
											?>                                      
											<tr>
												<td class="center"><?php echo htmlentities($cnt);?></td>
												<td class="center"><?php echo htmlentities($bookname);?></td>
												<td class="center"><?php echo htmlentities($isbn);?></td>
												<td class="center"><?php echo htmlentities($borrowdate);?></td>
												<td class="center"><?php echo htmlentities($returndate);?></td>
												<td class="center">
													<?php 
														if($sta==0)
														{
															echo '<div class="label label-danger">Borrowed</div>';
														} 
														else 
														{
															echo '<div class="label label-success">Returned</div>';
														}
													?>
												</td>
											</tr>
											<?php $cnt=$cnt+1; } ?>                                      
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
