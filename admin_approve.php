<?php
	session_start();
	error_reporting(0);
	
	include('connection.php');
	
	if(isset($_GET['del']))
	{
		$Username=$_GET['del'];
		$sql = "DELETE FROM `register` WHERE `register`.`rUsername` = '$Username'";
		$run=mysqli_query($conn,$sql); 
		header('location:admin_approve.php');
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
                <h4 class="header-line text-center">Approve Users</h4>
			</div>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Users Listing</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
												<th>Username</th>
												<th>Email</th>
												<th>Membership</th>
												<th>Created Date</th>												
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$total_pages="SELECT COUNT(*) FROM register";
												
												$result = mysqli_query($conn,$total_pages);
												
												$total_rows = mysqli_fetch_array($result)[0];
												
												$total_pages = ceil($total_rows / $no_records);

												$sql = "SELECT `rID`, `rName`, `rUsername`, `rEmail`, `rMembership`, `rCreatedDate` FROM `register` LIMIT $offset, $no_records";
												
												$run = mysqli_query($conn,$sql);
												
												while($row=mysqli_fetch_array($run)) 
												{  
													$ID=$row[0];
													$Name=$row[1];  
													$Username=$row[2];  
													$Email=$row[3];  
													$Membership=$row[4];
													$CDate=$row[5];     													
											?>                                      
											<tr>
												<td class="center"><?php echo htmlentities($ID);?></td>
												<td class="center"><?php echo htmlentities($Name);?></td>
												<td class="center"><?php echo htmlentities($Username);?></td>
												<td class="center"><?php echo htmlentities($Email);?></td>
												<td class="center"><?php echo htmlentities($Membership);?></td>
												<td class="center"><?php echo htmlentities($CDate);?></td>
												<td class="center">
													<a href="admin_approved.php?del=<?php echo htmlentities($Username);?>"><button class="btn btn-primary"> Approve</button> 
													<a href="admin_approve.php?del=<?php echo htmlentities($Username);?>" onclick="return confirm('Are you sure you want to reject?');"" >  <button class="btn btn-danger"> Reject</button>
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
