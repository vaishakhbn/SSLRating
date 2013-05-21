

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>MKD SSL WebServer Rating Application</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" >
//current progress
var currProgress = 0;
//is the task complete
var done = false;
//total progress amount
var total = 100;

//function to update progress
function startProgress() {
//get the progress element
var prBar = document.getElementById("prog");
//get the start button
var startButt = document.getElementById("startBtn");
//get the textual element
var val = document.getElementById("numValue");
//disable the button while the task is unfolding
startButt.disabled=true;
//update the progress level
prBar.value = currProgress;
//update the textual indicator
val.innerHTML = Math.round((currProgress/total)*100)+"%";
//increment the progress level each time this function executes
currProgress=currProgress+0.40;
//check whether we are done yet
if(currProgress>100) done=true;
//check whether we are done yet
if(!done)
	setTimeout("startProgress()", 100);
//task done, enable the button and reset variables
else
{
	document.getElementById("startBtn").disabled = false;
	done = false;
	currProgress = 0;
}
}

</script>
</head>
<body>
<div id="wrapper">
  <div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h2><img src="images/img02.jpg" width="150" height="150" alt="" /><a href="#">V's SSL Web Server Rating Application</a></h2>
		  </div>
			<div id="menu">
				<ul>
					<li class="current_page_item"></li> 
					<li><a href="http://en.wikipedia.org/wiki/Transport_Layer_Security">SSL Layer</a></li>
					<li><a href="#">Server Rating Guide</a></li>
                    <li><a href="http://localhost/MKDCNPMKD/register.php">Register</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</div>
		</div>
		<div id="banner">
			<div class="content"><img src="images/img02new1.jpg" width="1000" height="250" alt="" /></div>
		</div>
	</div>
	<!-- end #header -->
	
	<div id="page">
		<div id="content">
<?php


error_reporting(0);
session_start();
        if(!isset($_SESSION['stdname'])){
            $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
        }
        else if(isset($_REQUEST['logout'])){
                unset($_SESSION['stdname']);
            $_GLOBALS['message']="You are Loggged Out Successfully.";
            header('Location: index.php');
        }
        
?>

        <?php
      
        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
        ?>
       
                <form name="stdwelcome" action="stdwelcome.php" method="post">
                    <ul id="menu">
                        <?php if(isset($_SESSION['stdname'])){ ?>
                        <li><input type="submit" value="LogOut" name="logout" class="subbtn" title="Log Out"/></li>
                        <?php } ?>
                    </ul>
                </form>
           
                      
                <form id="stdloginform" action="rating.php" method="gets">
      
                         
              <table cellpadding="30" cellspacing="10" >
              <tr>
                  <td>Enter Web Address</td>
                  <td><input type="text" tabindex="1" name="address" value="" size="16" /></td>
                  <?php 
                  /* $fh=fopen("input.txt","w");
                   //$cat=strcat($_REQUEST['address'],":443 >test.cert");
                   $cat=$_REQUEST['address'].":443 >test.cert";
                   echo $cat;
                   fputs($fh,$cat);
                   echo $_REQUEST['address']; 
                   fclose($fh);*/?>


                  <td><right><input   name="submit11"id="startBtn"type="submit" value="Click here to View Ratings" size="100" onclick="startProgress()"></right></td></tr><tr><td></td><td>
                 <?php ?> <p><h3>Task progress:</p>
<progress id="prog" value="0" max="100"></progress>
<div id="numValue">0%</div></h3> 
                                       </td>
		</tr>
         
		      


             </form>


                 <form id="stdloginform" action="compare.php" method="get">
      
                         
              <!--<table cellpadding="30" cellspacing="10">-->
              
		<tr>
                  <td></td><td></td><td><input type="submit" value="Click here to View previous ratings"></td>
                                       
		</tr>
         
		      </table>


             </form>


                   
               
<center><form action="index.php">
<input class="subbtn"type="submit" value="back" />
</form></center>
           </div>
           <div id="sidebar">
			<ul>
				<li>
					<h2>have a look at </h2>
					<ul>
						<li><a href="">SSL Server Rating Gide</a></li>
						<li> <a href="http://localhost/keyboard/SSL_TLS_Deployment_Best_Practices_1.0.pdf">SSL /TLS Deployment Best Practices</a></li>
						<li><a href="http://blog.ivanristic.com/2010/07/ssl-server-survey-what-data-are-we-collecting.html">Internet SSL Server Survey</a></li>
						<li><a href="http://en.wikipedia.org/wiki/Transport_Layer_Security">Wiki page on SSL Layer</a></li>
						
				  </ul>
				</li>
				<li>
					<h2>Blogroll</h2>
					<ul>
						<li><a href="#">Vinaykumar M Kolli</a></li>
						<li><a href="#">Vaishakh B N</a></li>
						
					</ul>
				</li>
				<li>
					<h2>Memories</h2>
					<ul>
						<li><a href="#">Runner-ups of TCS Tech Bytes Bangalore Region 2012</a></li>
						<li><a href="#">Organised 8th Mile TantraGnyana Quiz</a></li>
						
					</ul>
				</li>
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;"></div>
  </div>
	<!-- end #page --> 
</div>
<div id="footer">
	<p>Copyright (c) 2012 mkdsslrating.com. All rights reserved. Design by Vinaykumar M Kolli & Vaishakh B N.</p>
</div>
<!-- end #footer -->
</body>
</html>
