<html><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<link rel="stylesheet" type="text/css" href="home.css">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Forms</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script type="text/javascript" src="js/jquery.js"></script>
<script>
$(function(){
	
	$('.shadow1').css('height',$('.content').css('height'));
	$('.shadow2').css('height',$('.content').css('height'));
	
	});
</script>
<style>

</style>
<!-- InstanceEndEditable -->
</head>
<body>
<div class="page">
	<div class="main">

        <div class="middlepart">
            	<div class="leftshadow">

        	<div class="ls_middle"></div>

        </div>
        <div class="newdiv">
            <div class="topbar">
            	<div class="logoutbutton"><a href="#">Logout</a></div>
            </div>
            <div class="header">
            	<div class="Logo"></div>
                <div class="searchbar">
                	<div class="searchicon"></div>
                    <input type="text" name="search" class="searchtext">
                </div>
            </div>
            <div class="menu">
	            <!-- InstanceBeginEditable name="menu" --><div class="menuitems"><a href="home.php" tabindex="1" accesskey="1" target="_self">Home</a> | <a href="create.php">Create</a> | <a href="request.php">Request</a> | <a href="aboutus.php">Aboutus</a> | <a href="help.php">Help</a> </div><!-- InstanceEndEditable -->
  
              
                <div class="menushadow"></div>
            </div>
            <div class="content_outer">
            <div class="shadow1"></div>
            <div class="content"><!-- InstanceBeginEditable name="content" -->
			<div class="subheading"><a href="categories.php" title="View all Categories">Categories</a></div>
            <div class="subdata" style="min-height:250px;">
            <ul class="ul_cat">
            <?php
			include("connect.php");
			$q = "SELECT * FROM categories";
			$r = mysql_query($q);
			if(mysql_num_rows($r)>0)
			{
				while($onerow=mysql_fetch_array($r))
				{
				echo "<a href='category.php?name=hi' title='View all forms under ".$onerow['catname']." Category'><li class='li_cat'>".$onerow['catname']."</li></a>";	
				}
				
			}
					else
			{
				echo "No Categories are available";
			}
			?>
            </ul>
			</div>
            			<div class="subheading" ><a href="tags.php">Tags</a></div>
            <div class="subdata" style="min-height:250px;">
            <ul class="ul_cat">
            <?php
			include("connect.php");
			$q = "SELECT * FROM Tags";
			$r = mysql_query($q);
			if(mysql_num_rows($r)>0)
			{
				while($onerow=mysql_fetch_array($r))
				{
				echo "<a href='tags.php?tag=hi'><li class='li_cat'>".$onerow['tagname']."</li></a>";	
				}
			}
			else
			{
				echo "No tags are available";
			}
			?>
            </ul></div>
			
			
			
			<!-- InstanceEndEditable --></div>
            <div class="shadow2"></div>
            </div>
            <div class="bottombar_outer">
            	<div class="bottomshadow1"></div>
                <div class="bottombar"><!-- InstanceBeginEditable name="Footer" --><!-- InstanceEndEditable --></div>
                <div class="bottomshadow2"></div>
            </div>
            </div>
            <div class="rightshadow">
 
                <div class="rs_middle"></div>
     
       		</div>
        </div>

    </div>
</div>
</body>
<!-- InstanceEnd --></html>