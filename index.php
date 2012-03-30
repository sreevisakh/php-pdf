<?php
session_start();
if(isset($_SESSION['userid']))
{
	header("location:home.php");
	
}

?>
<html>
<head>
<title>
Login
</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
$(function(){
	$('.signupbutton').click(function(){
			
			$('#leftpane1').hide();
			$('#leftpane2').fadeIn();
		
		});

	$('#email1').click(function(){$('#status_email').removeClass('wrong');
	$('#error').fadeOut();
	
	});
	$('#password1').click(function(){$('#status_password1').removeClass('wrong');
		$('#error').fadeOut();});
	$('#password2').click(function(){$('#status_password2').removeClass('wrong');
		$('#error').fadeOut();});
	
		$('#email2').click(function(){$('#status_email2').removeClass('wrong');
		$('#error').fadeOut();});
			$('#password3').click(function(){$('#status_password3').removeClass('wrong');
		$('#error').fadeOut();});
	});
function validateLogin()
{
	if(document.getElementById('email2').value=="")
	{
		$('#status_email2').addClass('wrong');
		return false;
	}
/*	else if(validateEmail(document.getElementById('email2').value)==false)
	{
		$('#status_email2').addClass('wrong');
		return false;
	}*/
	else if(document.getElementById('password3').value=="")
	{
		$('#status_password3').addClass('wrong');
		return false;
	}
	else
	{
		ajaxLogin();
		
	}
	
	
	
}
function ajaxSignup()
{
var xmlhttp;
var emailvalue = document.getElementById('email1').value;
var passwordvalue = document.getElementById('password1').value;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    if(xmlhttp.responseText=="email")
	{
		$('#error').html("Email already Exists").fadeIn();
		return false;
	}
	else if(xmlhttp.responseText=="error")
	{
		$('#error').html("Registration failed").fadeIn();
		return false;
	}
	else
	{
		$('#b4confirm').hide();
		document.getElementById("confirm").innerHTML=xmlhttp.responseText;
		
		$('#confirm').fadeIn();
    }
  }
  }
xmlhttp.open("GET","signup.php?email="+emailvalue+"&&pw="+passwordvalue,true);
xmlhttp.send();
}
function ajaxLogin()
{
var xmlhttp;
var emailvalue = document.getElementById('email2').value;
var passwordvalue = document.getElementById('password3').value;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
	  
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
//alert(xmlhttp.responseText);    
if(xmlhttp.responseText=="error")
	{
		
		$('#error1').html("Invalid username or password").fadeIn();
		return false;
	}
	else if(xmlhttp.responseText=="success")
	{
		
		window.location="home.php";
	}
	else
	{
		
		//alert(xmlhttp.responseText);
		$('#error1').html(xmlhttp.responseText).fadeIn();
		return false;
	}
 }
  }
xmlhttp.open("GET","login.php?email="+emailvalue+"&&pw="+passwordvalue,true);
xmlhttp.send();
}

function validateSignup()
{
	
	
	if(document.getElementById('email1').value=="")
	{
		$('#status_email').addClass('wrong');
		return false;
	}
/*	else if(validateEmail(document.getElementById('email1').value)==false)
	{
		$('#status_email').addClass('wrong');
		return false;
	}*/
	else if(document.getElementById('password1').value=="")
	{

		$('#status_password1').addClass('wrong');
		return false;
	}
/*	else if(document.getElementById('password1').value.length<6)
	{
		$('#error').html("Password must contain atleast 6 characters").fadeIn();
		
		$('#status_password1').addClass('wrong');
		return false;
	}*/
	else if(document.getElementById('password2').value=="")
	{
	
		$('#status_password2').addClass('wrong');
		return false;
	}
		else if(document.getElementById('password2').value!=document.getElementById('password1').value)
	{
		$('#error').html("Password doesn't match").fadeIn();
		$('#status_password2').addClass('wrong');
		return false;
	}
	else
	{
		ajaxSignup();
	}
	
}
function validateEmail(email) {
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = email
   if(reg.test(address) == false) {
      
      return false;
   }
   else
   {
	   return true;
   }
}
</script>
<style>
.main
{
	width:100%;
	
}
.innerbox
{
	margin-left:auto;
	margin-right:auto;
	background:url(images/boxbg.png) no-repeat;
	width:882px;
	height:382px;
	margin-top:150px;
	
}
.boxhead
{
	background-image:url(images/boxhead.png);
	width:855px;
	height:67px;
	margin-left:14px;
	
}
.logo
{
	font:Helvetica;
	color:#FFF;
	font-size:40px;
	margin:10px 0 0 20px;
	padding-top:10px;
	font-weight:bold;
	
}
.boxbody
{
	width:855px;
	margin-left:14px;
	height:290px;

	
}
.leftpane
{
	
	width:428px;
	float:left;
	height:172px;
	
}
.middlepane
{
	background-image:url(images/seperator.png);
	width:1px;
	height:239px;
	float:left;
	margin-top:30px;
}
.rightpane
{
	
	height:290px;
	width:375px;
	float:left;
	margin-top:10px;
	padding-left:50px;
}
.signupbutton
{
	background-image:url(images/signupbutton.png);
	background-repeat:no-repeat;
	width:157px;
	height:73px;
	margin-left:auto;
	margin-right:auto;
	text-align:center;
	padding-top:21px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:20px;
	font-weight:bold;
	color:white;
	cursor:pointer;
}
.login
{
	background-image:url(images/loginbutton.png);
	width:131px;
	height:39px;
	background-repeat:no-repeat;
	padding-top:10px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:16px;
	color:#FFF;
	margin-left:auto;
	margin-right:auto;
	font-weight:300;
	cursor:pointer;
	
}
.logoimage
{
	background-image:url(images/logo.png);
	width:251px;
	height:41px;
}
.boxsubhead
{
	margin-top:25px;
	text-align:center;
	font-family:Arial, Helvetica, sans-serif;
	font-size:16px;
	color:#a06bab;
	margin-bottom:25px;
	font-weight:bold;
	margin-left:-50px;
}
.loginform
{
	width:90%;
	height:200px;
}
.logintext
{
	background-image:url(images/textbox.png);
	width:202px;
	height:33px;
	border:none;
	padding-left:5px;
	font-size:14px;
	color:#8e5a98;
	
}
.about
{
	font-size:16px;
	font-family:Tahoma, Geneva, sans-serif;
	color:#666;
	text-align:right;
	width:800px;
	margin-left:auto;
	margin-right:auto;
}
.wrong
{
	background-image:url(images/cross_icon.png);
	width:16px;
	height:16px;
	background-repeat:no-repeat;
	margin-top:5px;
	
}
.error
{
	font-family:Arial, Helvetica, sans-serif;
	color:	#F00;
	font-style:italic;
	font-size:12px;
	text-align:center;
	width:325px;
	
}
#share
{
float: right;
width: 178px;
height: 44px;

margin-right: 16px;
margin-top: -39px;
}
#twitter
{
	background-image:url(images/button-twitter.png);
	width:43px;
	height:42px;
	float:left;
	margin-right:5px;
	cursor:pointer;
}
#fb
{
	background-image:url(images/button-facebook.png);
	width:43px;
	height:42px;
	float:left;
		margin-right:5px;
	cursor:pointer;
}
#rss
{
	background-image:url(images/button-rss.png);
	width:42px;
	height:42px;
	float:left;
	cursor:pointer;
}
.confirm
{
	text-align:center;
	font-size:16px;
	font-family:Tahoma, Geneva, sans-serif;
	padding-top:50px;
	color:#8e5a98;
	height:25px;
	margin-top:auto;
	margin-bottom:auto;
	width:353px;
	padding-left:35px;
}


</style>
</head>
<body>
<div class="main">
    <div class="innerbox">
        <div class="boxhead">
            <div class="logo">
     <div class="logoimage"></div>
            </div>
            <div id="share">
            <div id="twitter"></div>
            <div id="fb"></div>
            <div id="rss"></div>
            </div>
        </div>
        <div class="boxbody">
        	<div class="leftpane" id="leftpane1" style="padding-top:120px;">
    		<div class="signupbutton">Sign Up</div>
            </div>
            <div class="leftpane" id="leftpane2" style="display:none;">
            <div id="b4confirm">
    		            <div class="boxsubhead">Signup</div>
            <div class="fields" style="margin-left:50px; height:204px;">
            
            <table class="signupform" height="100%">
  
            
            <tr>
           	<td style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#a06bab; width:110px;">Email :</td><td>
            <input type="text" id="email1" name="email1" class="logintext"/></td><td><div id="status_email"></div></td>
            </tr>
            
            <tr><td style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#a06bab; width:110px;">Password :</td><td>
            <input type="password" id="password1" name="password1"  class="logintext"/></td><td><div id="status_password1"></div></td></tr>
              <tr><td style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#a06bab; width:110px;"> Confirm Password :</td><td>
              <input type="password" id="password2" name="password2"  class="logintext"/></td><td><div id="status_password2"></div></td></tr>
            <tr><td colspan="2" style="text-align:center;">
            <div class="login" onClick="validateSignup();">Signup</div>
            </td>
            </tr>
            </table>
            <div style="height:10px;" class="error" id="error"></div>
            </div></div>
            <div class="confirm" id="confirm" style="display:none;">
            A confirmation email has been sent to the email address you provided. Check it to activate your account
            </div>
            </div>
            <div class="middlepane"></div>
        	<div class="rightpane">
            <div class="boxsubhead">Login</div>
            <div class="fields" style="height:213px;">
            
            <table class="loginform">
            <tr>
           	<td style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#a06bab; width:110px;">Email :</td><td><input type="text" name="email2" id="email2" class="logintext"/></td><td><div id="status_email2"></div></td>
            </tr>
            <tr><td style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#a06bab; width:110px;">Password :</td><td><input type="password" name="password3" id="password3"  class="logintext"/></td><td style="width:16px;"><div id="status_password3"></div></td></tr>
            <tr><td colspan="2" style="text-align:center;">
            <div class="login" onClick="validateLogin();">Login</div>
            </td>
            </tr>
            </table>
            <div id="error1" class="error" style="margin-top:-1px"></div>
            </div>
            
            
            </div>
        
        </div>
    </div>
    <div class="about"><span>Maintained By Sreevisakh</span></div>
</div>

</body>
</html>