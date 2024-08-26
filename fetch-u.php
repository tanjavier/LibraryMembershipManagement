<?php
	include('connection.php');
	$output = '';
	if(isset($_POST["query"]))
	{
		$search = mysqli_real_escape_string($conn, $_POST["query"]);
		
		$query = "SELECT * FROM user WHERE uName LIKE '%".$search."%' OR uUsername LIKE '%".$search."%' OR uEmail LIKE '%".$search."%' OR uMembership LIKE '%".$search."%' OR uCreatedDate LIKE '%".$search."%'";
	}
	else
	{
		$query = "SELECT * FROM user ORDER BY uID";
	}
	$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result))
	{
		$output .= '<div class="table-responsive">
						<table class="table table bordered">
							<tr>
								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Membership</th>
								<th>Created Date</th>
							</tr>';
		while($row = mysqli_fetch_array($result))
		{
			$output .= '
				<tr>
					<td>'.$row["uName"].'</td>
					<td>'.$row["uUsername"].'</td>
					<td>'.$row["uEmail"].'</td>
					<td>'.$row["uMembership"].'</td>
					<td>'.$row["uCreatedDate"].'</td>
				</tr>
			';
		}
		echo $output;
	}
	else
	{
		echo 'User Does Not Exist';
	}
?>