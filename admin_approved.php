<?php    
include("connection.php");   
  
$delete=$_GET['del'];  

$acc="select * from register where rUsername='$delete'";

$result= mysqli_query($conn,$acc);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		$name=$row["rName"];
        $username=$row["rUsername"];
        $password=$row["rPassword"];
        $email=$row["rEmail"];
        $membership=$row["rMembership"];
		 
		$acc = "INSERT INTO `user` (`uID`, `uName`, `uUsername`, `uPassword`, `uEmail`, `uMembership`, `uCreatedDate`) VALUES (NULL, '$name', '$username', '$password', '$email', '$membership', current_timestamp());";
		$acc .= "delete from register WHERE rUsername='$username';" ;
		 
		if (mysqli_multi_query($conn, $acc)) 
		{
			echo '<script>alert("Account Approved!");
            window.location.href="admin_approve.php";</script>';
        } 
		else 
		{
			echo "Error: " . $acc . "<br>" . mysqli_error($conn);    
		}	 
	}
}
?>