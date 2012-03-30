<?php
include("connect.php");
if(isset($_GET))
{
	$email = $_GET['email'];
	$password = $_GET['pw'];
	if(emailExists($email)==false)
	{
		if(getConfirmStatus($email)==0)
		{
			$ccode = generateCode($email,$password);
			email($email,$ccode);
			echo "Email is already registered but its not activated. So i sent a Confirmation mail to your email address. Use it to activate your account";
			exit();
			
		}
		else
		{
			echo "email";
			exit();
		}
	}
	else
	{
		$ccode = generateCode($email,$password);
		$q = "INSERT INTO accounts (userid,email,password,confirmcode,confirmed,status) value('','$email','$password','$ccode','0','1')";
		$r = mysql_query($q);
		if($r>0)
		{
		 if(email($email,$ccode)==true)
		 {
			 echo "<div style='padding-top:25px;'>A confirmation email has been sent to your email address. Check it to activate your account</div>";
			 exit();
		 }
		}
	}
	
}
function emailExists($email)
{
	$q = "SELECT * FROM accounts WHERE email = '".$email."'";
	$r  = mysql_query($q);
	if(mysql_num_rows($r)>0)
	{
		return false;
		
	}
	else
	{
		return true;
	}
}
function generateCode($email,$password)
{
	return "abcd";
}
function email($email,$ccode)
{
	return true;
}
function getConfirmStatus($email)
{
	return 0;	
}




 ?>