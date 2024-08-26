<?php
	include('connection.php');
	$output = '';
	if(isset($_POST["query"]))
	{
		$search = mysqli_real_escape_string($conn, $_POST["query"]);
		
		$query = "SELECT * FROM borrow WHERE uUsername LIKE '%".$search."%' OR uEmail LIKE '%".$search."%' OR bName LIKE '%".$search."%' OR ISBN LIKE '%".$search."%' OR borrowDate LIKE '%".$search."%' OR returnDate LIKE '%".$search."%'";
	}
	else
	{
		$query = "SELECT * FROM borrow ORDER BY brID";
	}
	$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result))
	{
		$output .= '<div class="table-responsive">
						<table class="table table bordered">
							<tr>
								<th>Username</th>
								<th>Email</th>
								<th>Book Name</th>
								<th>ISBN</th>
								<th>Borrow Date</th>
								<th>Return Date</th>
							</tr>';
		while($row = mysqli_fetch_array($result))
		{
			$output .= '
				<tr>
					<td>'.$row["uUsername"].'</td>
					<td>'.$row["uEmail"].'</td>
					<td>'.$row["bName"].'</td>
					<td>'.$row["ISBN"].'</td>
					<td>'.$row["borrowDate"].'</td>
					<td>'.$row["returnDate"].'</td>
				</tr>
			';
		}
		echo $output;
	}
	else
	{
		echo 'Borrowed Book Does Not Exist';
	}
?>