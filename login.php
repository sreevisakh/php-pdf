<?php

session_start();
include("connect.php");
if(isset($_GET['email']))
{
	$email =mysql_escape_string($_GET['email']);
	$pw = mysql_escape_string($_GET['pw']);
	//$pw=  md5($pw);
	$q = "SELECT * FROM accounts where email ='$email' AND password = '$pw'";
	$r = mysql_query($q);
	if(mysql_num_rows($r)>0)
	{
		while($onerow=mysql_fetch_array($r))
		{
			$status = $onerow['status'];
			$confirm = $onerow['confirmed'];
			if($status=='0')
			{
				echo "Your account has been blocked. Please contact me.";
				exit();
			}
			else if($confirm =='0')
			{
					echo "Your account has not yet been confirmed";
				exit();
			}
			else
			{
				$_SESSION['userid']=$onerow['userid'];
				
				echo "success";
				exit();
			}
		}
		
	}
	else
	{
			echo "error";
				exit();
	}
	
	
}
else
{
	header("location:index.php");
}

?>