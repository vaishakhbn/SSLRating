 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>MKD WebServer Rating Application</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
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
		 <div>
<?php
error_reporting(0);
session_start();
include_once 'oesdb.php';

if(isset($_REQUEST['stdsubmit']))
{
 /***************************** Step 1 : Case 1 ****************************/
 //Add the new user information in the database
     $result=executeQuery("select max(stdid) as std from student");
     $r=mysql_fetch_array($result);
     if(is_null($r['std']))
     $newstd=1;
     else
     $newstd=$r['std']+1;

     $result=executeQuery("select stdname as std from student where stdname='".htmlspecialchars($_REQUEST['cname'],ENT_QUOTES)."';");

    // $_GLOBALS['message']=$newstd;
    if(empty($_REQUEST['cname'])||empty ($_REQUEST['password'])||empty ($_REQUEST['email']))
    {
         $_GLOBALS['message']="Some of the required Fields are Empty";
    }else if(mysql_num_rows($result)>0)
    {
        $_GLOBALS['message']="Sorry the User Name is Not Available Try with Some Other name.";
    }
    else
    {
     $query="insert into student values('".htmlspecialchars($_REQUEST['cname'],ENT_QUOTES)."','".htmlspecialchars($_REQUEST['password'],ENT_QUOTES)."',$newstd,'".htmlspecialchars($_REQUEST['email'],ENT_QUOTES)."','".htmlspecialchars($_REQUEST['contactno'],ENT_QUOTES)."','".htmlspecialchars($_REQUEST['address'],ENT_QUOTES)."','".htmlspecialchars($_REQUEST['city'],ENT_QUOTES)."','".htmlspecialchars($_REQUEST['pin'],ENT_QUOTES)."')";
     if(!@executeQuery($query))
                $_GLOBALS['message']=mysql_error();
     else
     {
        $success=true;
        $_GLOBALS['message']="Successfully Your Account is Created.Click <a href=\"index.php\">Here</a> to LogIn";
       // header('Location: index.php');
     }
    }
    closedb();
}
?>


       <?php

        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
        ?>
     
                
              <?php if(!$success): ?>

              <h2 style="text-align:center;color:black;">New User Registration</h2>
              <?php endif; ?>
             
          
          <?php
          if($success)
          {
                echo "<h2 style=\"text-align:center;color:#0000ff;\">Thank You For Registering with MKD SSL Web Server Rating System<br/><a href=\"index.php\">Login Now</a></h2>";
          }
          else
          {
           /***************************** Step 2 ****************************/
          ?>
          <form id="admloginform"  action="register.php" method="post" onsubmit="return validateform('admloginform');">
                   <table cellpadding="20" cellspacing="20" style="text-align:left;margin-left:15em" >
              <tr>
                  <td>User Name</td>
                  <td><input type="text" name="cname" value="" size="16" onkeyup="isalphanum(this)"/></td>

              </tr>

                      <tr>
                  <td>Password</td>
                  <td><input type="password" name="password" value="" size="16" onkeyup="isalphanum(this)" /></td>

              </tr>
                      <tr>
                  <td>Re-type Password</td>
                  <td><input type="password" name="repass" value="" size="16" onkeyup="isalphanum(this)" /></td>

              </tr>
              <tr>
                  <td>E-mail ID</td>
                  <td><input type="text" name="email" value="" size="16" /></td>
              </tr>
                       <tr>
                  <td>Contact No</td>
                  <td><input type="text" name="contactno" value="" size="16" onkeyup="isnum(this)"/></td>
              </tr>

                  <tr>
                  <td>Address</td>
                  <td><textarea name="address" cols="20" rows="3"></textarea></td>
              </tr>
                       <tr>
                  <td>City</td>
                  <td><input type="text" name="city" value="" size="16" onkeyup="isalpha(this)"/></td>
              </tr>
                       <tr>
                  <td>PIN Code</td>
                  <td><input type="text" name="pin" value="" size="16" onkeyup="isnum(this)" /></td>
              </tr>
                       <tr>
                           <td style="text-align:right;"><input type="submit" name="stdsubmit" value="Register" class="subbtn" /></td>
                  <td><input type="reset" name="reset" value="Reset" class="subbtn"/></td>
              </tr>
            </table>
        </form>
       <?php } ?>
       </div></div>
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

      

