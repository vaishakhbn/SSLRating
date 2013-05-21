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
					<!--<li class="current_page_item"></li> -->
					<li><a href="http://en.wikipedia.org/wiki/Transport_Layer_Security">SSL Layer</a></li>
					<li><a href="#">Server Rating Guide</a></li>
                    <li><a href="http://localhost/MKDCNPMKD/register.php">Register</a></li>
					<li><a href="http://localhost/MKDCNPMKD/contact.php">About</a></li>
					<li><a href="http://localhost/MKDCNPMKD/contact.php">Contact</a></li>
				</ul>
			</div>
		</div>
		<br/>
		<div id="banner">
			<div class="content"><img src="images/img02new1.jpg" width="1000" height="250" alt="" /></div>
		</div>
	</div>
	<!-- end #header -->
	
	<div id="page">
		<div id="content">
		  <div class="post">
				<h3 class="title"><a href="#">Welcome to the Application</a></h3>
				
				<div style="clear: both;">&nbsp;</div>
				<div class="entry">
					<p>It has long been assumed that as long as  a website or service is protected using the Secure Sockets Layer (SSL),it is  secure. However, we now know that this is not true and now more than ever, it  is critically important to recognize that SSL is by no means a panacea. <br />
            Security  researchers have long shown that the strength of any cryptographic approach is  dependent on the algorithms and key lengths used by the underlying primitives. Consequently,  the security of an SSL protected service is strongly correlated to the cipher  suite in use as part of the protocol.</p>
                    <p>The Secure Sockets Layer protocol was  developed by Netscape Communications to provide secure HTTP connections. SSL  operates on top of a reliable stream service such as TCP and provides a secure  connection for applications such as HTTPS as well as FTP, Telnet and others.<br />
                      SSL is widely used in web applications that involve electronic ordering  and payments and other online business websites.<br />
                    </p>
                </div>
			</div>
			<?php

 
      error_reporting(0);
      session_start();
      include_once 'oesdb.php';
      if(isset($_REQUEST['register']))
      {
            header('Location: register.php');
      }
      else if($_REQUEST['stdsubmit'])
      {
          $result=executeQuery("select * from student where stdname='".$_REQUEST['name']."' and stdpassword='".$_REQUEST['password']."'");
          if(mysql_num_rows($result)>0)
          {

              //$r=mysql_fetch_array($result);
              //if(strcmp($r['std'],$_REQUEST['password'])==0)
              //{
                  $_SESSION['stdname']=htmlspecialchars_decode($r['stdname'],ENT_QUOTES);
                  $_SESSION['stdid']=$r['stdid'];
                  unset($_GLOBALS['message']);
                  header('Location: stdwelcome.php');
              }else
          {
              $_GLOBALS['message']="Check Your user name and Password.";
          }
				closedb();
          }
          else
          {
              $_GLOBALS['message']="Check Your user name and Password.";
          }
          
      
 ?>

      <?php

        if($_GLOBALS['message'])
        {
         echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
      ?>
    
     
               
     <form id="stdloginform" action="index.php" method="post">
      
                    <?php if(isset($_SESSION['stdname'])){
                          header('Location: stdwelcome.php');}else{  
                                                 ?>

                      <!--  <li><input type="submit" value="Register" name="register" class="subbtn" title="Register"/></li>-->
           <li><div ><a href="register.php" title="Click here  to Register">Register</a></div></li>
                        <?php } ?>
                    </ul>

      
      <div >
              
              <table cellpadding="30" cellspacing="10">
              <tr>
                  <td>User Name</td>
                  <td><input type="text" tabindex="1" name="name" value="" size="16" /></td>

              </tr>
              <tr>
                  <td>Password</td>
                  <td><input type="password" tabindex="2" name="password" value="" size="16" /></td>
              </tr>

              <tr>
                  <td colspan="2">
                      <input type="submit" tabindex="3" value="Log In" name="stdsubmit" class="subbtn" />
                  </td><td></td>
              </tr>
            </table>


 </div> </div>
           <?php //if($_REQUEST['name']==="vinay" && $_REQUEST['password']==="vinay") header('location: stdwelcome.php');?> 
		<!-- end #content -->
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
