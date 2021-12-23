<?php
$username=filter_input(INPUT_POST,'username');
$password=filter_input(INPUT_POST,'password');
//echo $username."".$password;

if(!empty($username)|| !empty($password))
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
			//echo "success";
			$sql = "select * from account where username = '$username' and password = '$password'";
			$result=mysqli_query($conn,$sql);
			$num=mysqli_num_rows($result);
			//echo $num;
			if($num==1)
			{	
				echo "<h4>"."<b>" . "Username : "."</b>" . "</h4>";
				echo "<h2>" .$username. "</h2>";
				readfile("items.html");
				exit();
			}
			else
			{
				echo "Login unsuccessful";
				exit();
			}
		}
	}
else
{
	echo "ALL FIELDS ARE REQUIRED";
	die();
	
}

?>