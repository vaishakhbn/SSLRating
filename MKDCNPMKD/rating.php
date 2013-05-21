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
					<li class="current_page_item"></li> 
					<li><a href="http://en.wikipedia.org/wiki/Transport_Layer_Security">SSL Layer</a></li>
					<li><a href="#">Server Rating Guide</a></li>
                    <li><a href="http://localhost/MKDCNP/register.php">Register</a></li>
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
		 
		  
			<h3 class="title"><a href="#">Rating of Web Server</a></h3>
				<form action="compare.php" method= "get">
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
/* $certfile = fopen("C:\OpenSSL-Win64\bin\certificate.txt",'w');
exec("c:\xampp\htdocs\Xampp-MKD\MKDCNP\cmd.bat");
$fh1= fopen("C:\OpenSSL-Win64\bin\google.cert",'r');
while(!feof($fh1)){
$theData = fgets($fh1);
echo $theData;
}
echo "------------------------------------------------------------------------------------------------------------------------------------------------------------------";
//exec("c:\xampp\htdocs\Xampp-MKD\MKDCNP\cmd1.bat");

$fh2= fopen("C:\OpenSSL-Win64\bin\certificate.txt",'r');
while(!feof($fh2)){
$theData = fgets($fh2);
echo $theData;
}
echo "Hi2";
//fclose($certfile);
*/
//echo $_POST['address'];
$inh=fopen("input.txt","w");
$cat=$_GET['address'].":443 >certificate.txt";
echo "Processing.............................".$cat;
fputs($inh,$cat);
fputs($inh,"\n");
$inh=fopen("input1.txt","w");
$cat1 = $_GET['address'].":443 >check2.txt";
fputs($inh,$cat1);
fputs($inh,"\n");
?>
<br />
<?php 
echo "Processing.............................".$cat1;
shell_exec('./final');
shell_exec('./last');
sleep(10);
fclose($inh);
$myFile = "check.txt";

$fh = fopen($myFile, 'r');
$newFile=fopen("db.txt",'w');
$b="\n";
while(!feof($fh)){
$theData = fgets($fh);
if (preg_match("/Signature Algorithm/i", $theData)) {
   $chars = preg_split('/:/', $theData, -1, PREG_SPLIT_OFFSET_CAPTURE);
       //echo $chars[1][0];
    $a=$chars[1][0];
    fwrite($newFile,$a);
    }
    if (preg_match("/Not Before/i", $theData)) {
   $chars = preg_split('/GMT/', $theData, -1, PREG_SPLIT_OFFSET_CAPTURE);
       //echo $chars[0][0];
    $a=$chars[0][0];
    fwrite($newFile,$a."\n");
    //fputs($newFile,$b,1); echo "<br>";
        }
    
     if (preg_match("/Not After/i", $theData)) {
   $chars = preg_split('/GMT/', $theData, -1, PREG_SPLIT_OFFSET_CAPTURE);
       //echo $chars[0][0];
    $a=$chars[0][0];
    fwrite($newFile,$a."\n");
     //fputs($newFile,$b,1);    echo "<br>";
    }
    }
    fclose($fh);
	//fclose($newFile);
    //fclose($myFile);
    $myFile1 = "check2.txt";

$fh = fopen($myFile1, 'r');
//$newFile=fopen("C:\OpenSSL-Win64\bin\db.txt",'w');
while(!feof($fh)){
$theData = fgets($fh);
 if (preg_match("/Server public key /i", $theData)) {
   $chars = preg_split('/is/', $theData, -1, PREG_SPLIT_OFFSET_CAPTURE);
       //echo $chars;
    $a=$chars[1][0];
    // Writing Server Publi key in line no 4
    fwrite($newFile,$a);
         }
      if (preg_match("/Secure Renegotiation /i", $theData)) {
   $chars = preg_split('/is/', $theData, -1, PREG_SPLIT_OFFSET_CAPTURE);
       //echo $chars;
    $a=$chars[0][0];
    // Writing Server Public key in line no 4
    fwrite($newFile,$a);
         }    

     
if (preg_match("/Cipher    /i", $theData)) {
   $chars = preg_split('/is/', $theData, -1, PREG_SPLIT_OFFSET_CAPTURE);
       //echo $chars;
    $a=$chars[0][0];
    // Writing Server Public key in line no 4
    fwrite($newFile,$a."\n");
         }      //fputs($newFile,$b,1);    echo "<br>";
 if (preg_match("/issuer=/", $theData)) {
   $chars = preg_split('/,/', $theData, -1, PREG_SPLIT_OFFSET_CAPTURE);
       //echo $chars;
    $a=$chars[0][0];
    // Writing Server Public key in line no 4
    fwrite($newFile,$a."\n");
         }      //fputs($newFile,$b,1);    echo "<br>";
  if (preg_match("/Protocol  : /i", $theData)) {
   $chars = preg_split('/ Ci/', $theData, -1, PREG_SPLIT_OFFSET_CAPTURE);
       //echo $chars;
    $a=$chars[0][0];
    // Writing Server Public key in line no 4
    fwrite($newFile,$a."\n");
         }      //fputs($newFile,$b,1);    echo "<br>";
  
    }
    fclose($fh);
	fclose($newFile);
    //fclose($myFile);

    

//exec("openssl s_client -connect '".$_POST['address']."' :443 -cert db.txt");
$newFile=fopen("db.txt",'r');
$i=0;
while(!feof($newFile)){
$theData[$i] = fgets($newFile);
$i++;
}
if(strpos($theData[5],"0")==true)
{
	
	
	
	
	$theData[10]=$theData[9];
	$theData[9]=$theData[8];
	$theData[8]=$theData[7];
	$theData[7]=$theData[6];
	$theData[6]=$theData[5];
}




?>

      <?php
     

/**
 * @authors Vaishakh And Kolli
 */

$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, "http://api.ipinfodb.com/v3/ip-city/?key=eeae72981b71c69fd7dd141403ac77852d1b176dfc0c12eb2b0ac7155a324238&ip=74.125.45.100
//");
$websiteName = $_GET['address'];
curl_setopt($ch, CURLOPT_URL, "http://smart-ip.net/geoip-xml/".$websiteName."/auto");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, "cid=xxxxxx&etcetcetc");
$xml = curl_exec($ch);
$response= new SimpleXMLElement($xml);


       // if($_GLOBALS['message'])
        /*{
         echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }*/
      ?>
      
      

                <form name="stdwelcome" action="stdwelcome.php" method="post">
                    <ul id="menu">
                        <?php if(isset($_SESSION['stdname'])){ ?>
                        <li><input type="submit" value="LogOut" name="logout" class="subbtn" title="Log Out"/></li>
                        <?php } ?>
                    </ul>
                </form>
           

<table><tr><td>
<table>
<tr> 
<td><label>Signature Algorithm is </label>
</td><td><a href='www.yahoo.co.in'><input type ="text" name= "P" value="<?php echo $theData[0] ?>" size="50"readonly=""/></a></td>
</tr><tr></tr>
<tr> 
<td><label>Certificate Valid </label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[1] ?>"size="50"readonly = ""/></td>
</tr><tr></tr>
<tr> 
<td><label>Certificate Valid </label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[2] ?>"size="50"readonly = ""/></td>
</tr>
<br /><br /><br />
<tr> 
<td><label>Public Key Type</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[3] ?>" size="50"readonly = ""/></td>
</tr>
<tr> 
<td><label>Name Of the Issuer</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[4] ?>"size="50"readonly = ""/></td>
</tr>
<tr> 
<td><label>Server Public Key length is </label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[6] ?>"size="50"readonly = ""/></td>
</tr>
<tr> 
<td><label>Secure Renegotiation is</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[7] ?>"size="50"readonly = ""/></td>
</tr>
<tr> 
<td><label>Protocol is</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[8] ?>"size="50"readonly = ""/></td>
</tr>
<tr> 
<td><label>Cipher is</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[10] ?>"size="50"readonly = ""/></td>
</tr></table></td><td></td>
<td>
 
<?php
// echo $response->getName() . "<br />";

foreach($response->children() as $child)
  {
  
  echo $child->getName() . ": " . $child . "<br />";
  if ($child->getName()=="latitude"){
    $latitude = $child;
    }
    if ($child->getName()=="longitude"){
    $longitude = $child;
    }
  
  }
?>
</td>
</tr>


 
<!--<td><label>Chain Length</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[8] ?>"readonly = ""/></td>
</tr>
<tr> 
<td><label>Trusted</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[9] ?>"readonly = ""/></td>
</tr>
<tr> 
<td><label>Test Date</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[10] ?>"readonly = ""/></td>
</tr>
<tr> 
<td><label>Test Duration</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[11] ?>"readonly = ""/></td>
</tr>-->


<tr>
<td align="right">
				<form action="compare.php" method= "get"><input class="subbtn" type = "submit" name="ViewRatings" size="200"value ="<?php echo 'view ratings of '.substr($_GET['address'],4,-4); ?>" onmouseover="View Ratings " align="left" /></form></td><td></td>
<td> <form method="get" id="getting" name="gett" action="test.php" >
  <input type="text" value="<?php echo $_GET['address']?>" name="url"/>
  <input class="subbtn" type="submit" name="<?php echo $_GET['address']?>" size="200"value="<?php echo 'where is '.substr($_GET['address'],4,-4);?>"/>
  </form></td></tr>
</table>
<br />
</form>
<center><form action="stdwelcome.php">
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
