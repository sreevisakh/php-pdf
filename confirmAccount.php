<?php
include("connect.php");
if(isset($_GET['code']))
{
	$code = $_GET['code'];
	$email = $_GET['email'];
	$q = "SELECT * FROM Accounts WHERE email='$email'";
	$r = mysql_query($q);
	if(mysql_num_rows($r)>0)
	{
		while($onerow=mysql_fetch_array($r))
		{
			$password= $onerow['password'];
			$ccode=generateCode($email,$password);
			if($code==$ccode)
			{
				$q = "UPDATE Accounts SET confirmed='1' where email='$email'";
				//echo $q;
				$r = mysql_query($q);
				if($r>0)
				{
					echo "Your Account Confirmed. Login Now";
					exit();
				}
				else
				{
					echo "Error confirming account. Try again";
					exit();
				}
			}
			else
			{
				echo "Error Confirming account. Try signing Up again";
				exit();
			}
					
			
		}
		
	}
	
}
else
{
	header("location:index.php");
	exit();
}
function generateCode($email,$password)
{
	return "abcd";
}
?>