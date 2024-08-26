<?php
	include('connection.php');
	$output = '';
	if(isset($_POST["query"]))
	{
		$search = mysqli_real_escape_string($conn, $_POST["query"]);
		
		$query = "SELECT * FROM book WHERE bName LIKE '%".$search."%' OR bCategory LIKE '%".$search."%' OR bAuthor LIKE '%".$search."%' OR ISBN LIKE '%".$search."%' OR RegDate LIKE '%".$search."%'";
	}
	else
	{
		$query = "SELECT * FROM book ORDER BY bID";
	}
	$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result))
	{
		$output .= '<div class="table-responsive">
						<table class="table table bordered">
							<tr>
								<th>Name</th>
								<th>Category</th>
								<th>Author</th>
								<th>ISBN</th>
								<th>Registered Date</th>
							</tr>';
		while($row = mysqli_fetch_array($result))
		{
			$output .= '
				<tr>
					<td>'.$row["bName"].'</td>
					<td>'.$row["bCategory"].'</td>
					<td>'.$row["bAuthor"].'</td>
					<td>'.$row["ISBN"].'</td>
					<td>'.$row["RegDate"].'</td>
				</tr>
			';
		}
		echo $output;
	}
	else
	{
		echo 'Book Does Not Exist';
	}
?>