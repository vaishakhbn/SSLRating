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
$newFile=fopen("db.txt",'r');
$i=0;
while(!feof($newFile)){
$theData[$i] = fgets($newFile); echo $i." ".$theData[$i];
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
$i=0;
//while($i!=10)
//{
    //echo "thedata ".$theData[9];
  //  $i++;
//}
$certificate =array("issuer=/C=US/O=VeriSign", "issuer=/C=US/O=Google"); //more to be added

$cipher = array("    Cipher    : AES128-SHA","    Cipher    : AES128-MD5","    Cipher    : ECDHE-RSA-RC4-SHA"); //more to be added
$signature_algorith = array (" sha1WithRSAEncryption"," sha1Withmd5RSAEncryption"); //more to come
$cert=0;
$ciph=0;
$sa=0;
$cl=0;
$re = 0;
$ps=0;
$chain_length = array(" 4096 bit"," 2048 bit"," 1024 bit"); //more 
$j=0;
$i=1; 
//$k=0;
//echo $theData[0];

//trim($theData[0]);
//echo $theData[0];
//echo $cipher[0];


//if($cipher[0][0]==$theData[0]))
//echo "hi";
//while($i!=0)
//{    
    //if((strncmp($signature_algorith[$j],$theData[0],strlen($signature_algorith[$j])))==0)
	/* if (preg_match("/sha1/i", $theData[0]))
		$sa = 80;
	else if(preg_match("/sha2/i", $theData[0]))
		$sa =100;		*/
//COMPARISON FOR sIGNATURE ALGORITHM
	if(strpos($theData[0],"sha2")==true)
		$sa = 100;
	else if(strpos($theData[0],"sha1")==true)
		$sa =  80;
	else
		$sa=50;
//COMAPRE FOR RENEGOTIATION
$pos = strpos($theData[7],"IS supported");
	if($pos==false)
		$re = 0;
	else $re =  100;
$ciph = 0;
//cOMPARE FOR PROTOCOL
	if(strpos($theData[8],"TLSv1.2")==true)
	//if($pos==true)
		$ps = 100;
	//else 
	//{
	else if(strpos($theData[8],"TLSv1.1")==true)
	//if($pos==true)
		$ps = 90;
	

	else if(strpos($theData[8],"TLSv1")==true)
		$ps = 80;
	else if(strpos($theData[8],"SSLv3")==true)
		$ps = 80;
	else
		$ps = 60;
//Chain length comparison
$i=0;
if(strpos($theData[6],"1024")==true)
$cl=70;
else if(strpos($theData[6],"2048")==true)
$cl=80;
else if(strpos($theData[6],"4096")==true)
$cl=100;
//COMPARE FOR CIPHER STrength
/*$newFile1=fopen("cipher",'r');
$i=0;
while(!feof($newFile1)){
$cipherst[$i] = fgets($newFile1); echo $i." ".$cipherst[$i];
$i++;
}
$g=0;
while($g<3)
{
if(strpos($theData[10],$cipherst[$g])==true)
    {
     switch($g)
	{
		case 0: $ciph=100;
			break;
          	
		case 1: $ciph=90;
			break;
		
		case 2: $ciph=70;
			break;
		default: $ciph=50;
			break;
 	}
   }
$g++;
}
echo "ciphst is ".$ciph;
*/
$ciph = 0;
 if(strpos($theData[10],"AES")==true)
$ciph = $ciph+50;
 
 if(strpos($theData[10],"DES")==true)
$ciph = $ciph+40;
if(strpos($theData[10],"RC4")==true)
$ciph = $ciph+20;

 if(strpos($theData[10],"SHA")==true)
$ciph = $ciph+50;
if(strpos($theData[10],"MD5")==true)
$ciph = $ciph+30;

//COMPARE FOR issuer
/*$newFile2=fopen("issuer",'r');
$i=0;
while(!feof($newFile2)){
$issuers[$i] = fgets($newFile2); echo $i." ".$issuers[$i];
$i++;
}
$cert1=0;
$g=0;
echo $theData[4];
while($g<3)
{
if(strpos($theData[4],$issuers[$g])==true)
    {
     switch($g)
	{
		case 0: $cert1=100;
			break;
          	
		case 1: $cert1=90;
			break;
		
		case 2: $cert1=70;
			break;
		default: $cert1=50;
			break;
 	}
   }
$g++;
}
echo "issuer is ".$cert1;*/

if(strpos($theData[4],"VeriSign")==true)
    $cert1=100;
else if(strpos($theData[4],"Google")==true)
    $cert1=100;
else if(strpos($theData[4],"Thawte")==true)
    $cert1=100;
else if(strpos($theData[4],"AddTrust AB")==true)
    $cert1=100;
else if(strpos($theData[4],"AffirmTrust")==true)
    $cert1=100;
else if(strpos($theData[4],"Microsoft Secure Server Authority")==true)
    $cert1=100;
else if(strpos($theData[4],"America Online Inc.")==true)
    $cert1=100;
else if(strpos($theData[4],"AS Sertifitseerimiskeskus")==true)
    $cert1=100;
else if(strpos($theData[4],"Baltimore")==true)
    $cert1=100;
else if(strpos($theData[4],"National Informatics Centre")==true)
    $cert1=100;
else if(strpos($theData[4],"Buypass")==true)
    $cert1=100;
else if(strpos($theData[4],"Certinomis")==true)
    $cert1=100;
else if(strpos($theData[4],"Chunghwa Telecom Co., Ltd")==true)
    $cert1=100;
else if(strpos($theData[4],"COMODO CA Limited")==true)
    $cert1=100;
else if(strpos($theData[4],"Digital Signature Trust")==true)
    $cert1=100;
else if(strpos($theData[4],"GeoTrust Inc.")==true)
    $cert1=100;
else if(strpos($theData[4],"GoDaddy.com, Inc.")==true)
    $cert1=100;
else if(strpos($theData[4],"SecureTrust Corporation")==true)
    $cert1=100;
else if(strpos($theData[4],"Thawte")==true)
    $cert1=100;
else if(strpos($theData[4],"VISA")==true)
    $cert1=100;
else if(strpos($theData[4],"VISA")==true)
    $cert1=100;
else if(strpos($theData[4],"MTNL")==true)
    $cert1=100;
else if(strpos($theData[4],"TCS")==true)
    $cert1=100;
else if(strpos($theData[4],"E-MadhuraCA")==true)
    $cert1=100;
else 
	$cert1=0;

      



/*while($i<3)
{
if(strpos($theData[6],$chain[2])==true)
    {
     switch($i)
	{
		case 0: $cl=100;
			break;
          	
		case 1: $cl=90;
			break;
		
		case 2: $cl=70;
			break;
		default: $cl=50;
			break;
 	}
   }
$i++;
}
echo $cl;
//{
$i=0;
//switch($j)
/*{	
	case 0:
	$sa=100;
	break;
	case 1:
	$sa=90;
	break;
	default :
	$sa=60;
	break;

}
//echo $cert;
}
$j++;
}*/

//compare for chainlength is
$j=0;
$i=1; 
//$k=0;
//echo $theData[0];
$k=0;
trim($theData[6]);
//echo $theData[7];
//echo $cipher[0];
//echo "hi".$theData[9];
$m=1;
//if($cipher[0][0]==$theData[0]))
//echo "hi";
//echo "hi".$theData[4];
/*while($m!=0)
{   //echo $k;
    if((strncmp($chain_length[$k],$theData[6],strlen($chain_length[$k])))==0)
{
$m=0;
switch($k)
{	
	case 0:
	$cl=100;
	break;
	case 1:
	$cl=90;
	break;
        case 2:
        $cl=80;
	default   : 
	$cl=60;
	break;

}
echo $cl;
}
$k++;
}*/
//compare for cipher
$j=0;
$i=1; 
//$k=0;
//echo $theData[9];
$k=0;
trim($theData[10]);
//echo "idu".$theData[9];
//echo $theData[7];
//echo $cipher[0];
//echo "hi".$theData[9];
$m=1;
//if($cipher[0][0]==$theData[0]))
//echo "hi";
//echo "hi".$theData[4];
/*while($m!=0)
{   //echo $k;
    if((strncmp($cipher[$k],$theData[10],strlen($cipher[$k])))==0)
{
$m=0;
switch($k)
{	
	case 0:
	$ciph=100;
	break;
	case 1:
	$ciph=90;
	break;
        case 2:
        $ciph=80;
	default: 
	$ciph=60;
	break;

}
//echo $cl;
}
$k++;
}
//compare for issuer
$j=0;
$i=1; 
//$k=0;
//echo $theData[9];
$k=0;
trim($theData[4]);
//echo "idu".$theData[9];
//echo $theData[7];
//echo $cipher[0];
//echo "hi".$theData[9];
$m=1;
//if($cipher[0][0]==$theData[0]))
//echo "hi";
//echo "hi".$theData[4];
/*while($m!=0)
{   //echo $k;
    if((strncmp($certificate[$k],$theData[4],strlen($certificate[$k])))==0)
{
$m=0;
switch($k)
{	
	case 0:
	$cert=100;
	break;
	case 1:
	$cert=90;
	break;
	default: 
	$cert=60;
	break;

}
//echo $cl;
}
$k++;


}*/




?>

      <?php

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
            
<br />
<br /><br /><table><tr><td>
<table>
<tr><td><input type="text" value="The Certificate Issuer Score "  size="50" style="alignment-adjust: central;"readonly="true"/></td>
    <td><input type="text" value="<?php echo $cert1 ?>"readonly="true"/></td>
    </tr></br>
    <tr><td><input type="text" value="The Cipher strength Score " size="50" style="alignment-adjust: central;"readonly="true"/></td>
    <td><input type="text" value="<?php echo $ciph?>"readonly="true"/></td>
    </tr>
    <tr><td><input type="text" value="The Signature Algorithm Score " size="50" style="alignment-adjust: central;"readonly="true"/></td>
    <td><input type="text" value="<?php echo $sa ?>"readonly="true"/></td>
    </tr>
    <tr><td><input type="text" value="Chain Length Score" size="50" style="alignment-adjust: central;"readonly="true"/></td>
    <td><input type="text" value="<?php echo $cl ?>"readonly="true"/></td>
    </tr>
	<tr><td><input type="text" value="Secure Renogiation Score " size="50" style="alignment-adjust: central;"readonly="true"/></td>
    <td><input type="text" value="<?php echo $re ?>"readonly="true"/></td>
    </tr>
<tr><td><input type="text" value="Protocol Score  " size="50" style="alignment-adjust: central;"readonly="true"/></td>
    <td><input type="text" value="<?php echo $ps ?>"readonly="true"/></td>
    </tr></table>
</td></tr><br/><br />
<!--graph part-->
<tr><td>
<?php 

require_once('phplot.php');
$Param=array("Certificate Issuer","Cipher Strength","Signature Algorithm","Chain Length","Secure Renegotiation","Protocol Strength");
$Score=array($cert1,$ciph,$sa,$cl,$re,$ps);
for($i=0;$i<6;$i++) { $j=0; $data_array[$i][$j]=$Param[$i]; $j++; $data_array[$i][$j]=$Score[$i]; }
$elem="legend";
$elem1="title";
$font="5";
$plot = new PHPlot(700, 400);
//$plot->SetPieAutoSize(True);
//$plot->SetXAxisPosition(200);
$plot->SetShading(5);//for 3d look
$plot->SetPrintImage(False);  // Do not output the image
$plot->SetPlotType('bars');
$plot->SetDataType('text-data');
$plot->SetFontGD($elem, $font);
$plot->SetFontGD('title',5);
//$plot->SetLegendPixels(1,50,true);
$plot->SetLabelScalePosition(0.5);
//$data_array=array();
//$row=array(array());

//$row=array("Director"=>'vinay' ,"nu"=>'20');
//$data_array[0][0]=$row['Director'];
//$data_array[0][1] = $row['nu']; 
//$row1=array("Director"=>'veeresh' ,"nu"=>'30');
//$data_array[1][0]=$row1['Director'];
//$data_array[1][1] = $row1['nu']; 


$plot->SetDataValues($data_array);
//$plot->SetLegendStyle('left','left');
//$plot->SetLegendPosition(0, 0, 'plot', 0, 0,0,0);
//$plot->SetPieAutoSize(True);
# Main plot title:
$plot->SetTitle(" Strength of WebServer Based on different Parameters");
foreach ($data_array as $row) //$plot->SetLegend($row[0]); // Copy labels to legend
# Place the legend in the upper left corner:
//$plot->SetLegendPixels(5, 5);
$plot->DrawGraph();
echo "<img src=\"" . $plot->EncodeImage() . "\">\n";

?>	</td></tr>	
    </table>
<?php $totalavg=($ciph+$sa+$cl+  $ps)/4;
if($cert1==0)
	$totalavg = $totalavg -5 ;
if($re==0)
	$totalavg = $totalavg -5 ;
 //echo $totalavg; ?>

<h3 align="centre" style="size: a4;" style="color: red;">                     The Final rating of the web server requested is <?php echo $totalavg."%"; ?> </h3>

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



