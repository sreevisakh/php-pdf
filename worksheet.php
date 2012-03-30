<?php
if(isset($_POST))
{
	$field1 = $_POST['field1'];
		$field2 = $_POST['field2'];
			$field3 = $_POST['field3'];	
			$field4 = $_POST['field4'];
			$field5 = $_POST['field5'];
			$field6 = $_POST['field6'];
			$field7 = $_POST['field7'];
			$field8 = $_POST['field8'];
			$field9 = $_POST['field9'];
			$field10 = $_POST['field10'];
			$field11 = $_POST['field11'];
			$field12 = $_POST['field12'];
			$field13 = $_POST['field13'];
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="print.css" media="print" />
<title></title>
<style>
.form
{
	width:21cm;
	height:29cm;
	border:#000 thin solid;
}
.fieldelabel
{
	width:35%;
	padding-left:25px;
	font:Arial, Helvetica, sans-serif;
	font-size:13;
}
input [type=text]
{
	width:400px;
	height:35px;
}
.colon
{
text-align:center;	
}
</style>
</head>
<body>
<form>
<table class="form">
<tr>
<td colspan="3"><div align="center">
  <h1>WORKING SHEET</h1>
</div></td></tr>
<tr>
<td width="35%" class="fieldelabel">
1)	Name of the applicant and 	
Account No.	 </td>
<td width="7%" class="colon">:</td>
<td width="58%"><?php echo $field1;?> </td></tr>
<tr>
<td class="fieldelabel">
2)	Balance at credit slip 
	for the year 95-96	 </td>
<td class="colon">:</td>
<td><?php echo $field2;?></td></tr>
<tr>
<td class="fieldelabel">
3)	Further deposits as on	 	
</td>
<td class="colon">:</td>
<td><?php echo $field3;?></td></tr>
<tr>
<td class="fieldelabel">		
4)	D. A. arrears as per G O. (P) No	 
</td>
<td class="colon">:</td>
<td><?php echo $field4;?></td></tr>
<tr>
<td class="fieldelabel">
Total	 
</td>
<td class="colon">:</td>
<td><?php echo $field5;?></td></tr>
<tr>
<td class="fieldelabel">
5)	Advance taken during the period	 
</td>
<td class="colon">:</td>
<td><?php echo $field6;?></td></tr>
<tr>
<td class="fieldelabel">
6)	Balance credit	 
</td>
<td class="colon">:</td>
<td><?php echo $field7;?></td></tr>
<tr>
<td class="fieldelabel">
7)	Balance at previous advance pending 
Recovery	 
</td>
<td class="colon">:</td>
<td><?php echo $field8;?></td></tr>
<tr>
<td class="fieldelabel">

8)	Advance admissible  3a – b 4	 
</td>
<td class="colon">:</td>
<td><?php echo $field9;?></td></tr>
<tr>
<td class="fieldelabel">
9)	a) 65% of not balance at credit	 
</td>
<td class="colon">:</td>
<td><?php echo $field10;?></td></tr>
<tr>
<td class="fieldelabel">
9)   Advance applied for	 
</td>
<td class="colon">:</td>
<td><?php echo $field11;?></td></tr>
<tr>
<td class="fieldelabel">
10)	Amount of consolidated advance	 
</td>
<td class="colon">:</td>
<td><?php echo $field12;?></td></tr>
<tr>
<td class="fieldelabel">
11)	Amount of each such Installment	 
</td>
<td class="colon">:</td>
<td><?php echo $field13;?></td></tr>

<tr><td colspan="3" style="text-align:right; padding-top:40px;">
Signature of the sanctioning Authority with Designation
</td>
</tr>
<tr>
<td colspan="3" style="text-align:center;">
(Office Seal)
</td>
</tr>
</table></form>
<input type="button" id="but" value="Print" onclick="window.print();">