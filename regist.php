<?php
$username=filter_input(INPUT_POST,'username');
$password=filter_input(INPUT_POST,'password');
$fname=filter_input(INPUT_POST,'fname');
$phone=filter_input(INPUT_POST,'phone');

//echo $username."".$password;

if(!empty($username)|| !empty($password)|| !empty($FullName)|| !empty($Phnumber))
{
		$host="localhost";
		$dbusername="root";
		$dbpassword="";
		$dbname="eats";
		
		$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
	
		if(mysqli_connect_error())
		{
			die('connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
		
		}
	
		else
		{
		
			$sql = ("INSERT INTO account(username, password, fname,phone)
				VALUES ('$username','$password','$fname' , '$phone')");
				if (mysqli_query($conn, $sql))  
				{
					//echo "New record created successfully";
					readfile("login.html");
				} 
				else 
				{
					echo "Error: " . $sql . "<br>" . $conn->error;
				}

			
			
		}
	}
else
{
	echo "ALL FIELDS ARE REQUIRED";
	die();
	
}

?>