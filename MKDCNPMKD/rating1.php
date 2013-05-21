<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="Vinay And Vaishakh" />
<!--added-->
<script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCY2lDAYrjpBdGunwa_Qm_Y6NHjonxRbdg&sensor=true">
      <?php

/**
 * @authors Vaishakh And Kolli
 */

$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, "http://api.ipinfodb.com/v3/ip-city/?key=eeae72981b71c69fd7dd141403ac77852d1b176dfc0c12eb2b0ac7155a324238&ip=74.125.45.100
//");
$websiteName = "www.sabre-holdings.com";
curl_setopt($ch, CURLOPT_URL, "http://smart-ip.net/geoip-xml/".$websiteName."/auto");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, "cid=xxxxxx&etcetcetc");
$xml = curl_exec($ch);
$response= new SimpleXMLElement($xml);
echo $response->getName() . "<br />";

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

    </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script>
    function initialize() {
        var latitude= document.getElementById("lati").value;
        var longitude=document.getElementById("longi").value;
      var myLatlng = new google.maps.LatLng(latitude, longitude);
      var myOptions = {
        zoom: 8,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    }

    function loadScript() {
      var script = document.createElement("script");
      script.type = "text/javascript";
      script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
      document.body.appendChild(script);
    }

    window.onload = loadScript;


</script>
   <!-- <script type="text/javascript">
      function initialize() {
       
           center: new google.maps.LatLng(40,50),            
        var mapOptions = {
        
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
         }
    </script>-->
  </head>
  <form id="getting" name="gett" onclick="initialize();" >
  <input type="text" id="lati" name="lati" value="<?php echo $latitude ?>"/>
  <input type="text" id="longi" name="longi" value="<?php echo $longitude?>"/>
  
  <input type="submit" value="click" onclick="initialize();" />
  </form>	
<title>V's RVCE SSL Web Server Rating Guide</title>
</head>

<body>
<form action="compare.php" method= "post">
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
$cat=$_POST['address'].":443 >certificate.txt";
echo "Processing.............................".$cat;
fputs($inh,$cat);
fputs($inh,"\n");
$inh=fopen("input1.txt","w");
$cat1 = $_POST['address'].":443 >check2.txt";
fputs($inh,$cat1);
fputs($inh,"\n");
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
    <title>V's SSL Web Server Rating</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="oes.css"/>
  </head>
  <body>
      <?php

       // if($_GLOBALS['message'])
        /*{
         echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }*/
      ?>
      
      <div id="container">
            
                <div class="header">
                <img style="margin:10px 2px 2px 10px;float:left;" height="200" width="200" src="images/logo.gif" alt="V's SSL Web Server Rating"/><h3 class="headtext"> &nbsp;V's SSL Web Server Rating</h3>
            </div>
<div class="menubar">

                <form name="stdwelcome" action="stdwelcome.php" method="post">
                    <ul id="menu">
                        <?php if(isset($_SESSION['stdname'])){ ?>
                        <li><input type="submit" value="LogOut" name="logout" class="subbtn" title="Log Out"/></li>
                        <?php } ?>
                    </ul>
                </form>
            </div>
<div id="map_canvas" style="width:100%; height:100%"></div>
<div> <table><tr style="font-size: large;" style="animation: !important;">Network Security Details of the Requested Web-Server </tr></table></div>
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
</tr>
<tr> 
 
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
</table>
<br />
<br />
<br />
<table>
<tr>
<td></td><td>
<input type = "submit" name=" View Ratings " size="100"value ="View Ratings" onmouseover="View Ratings " align="left" /></td>
</tr>
</table>
<br />
</form>
    <div id="footer">
          <p style="font-size:70%;color:#25afff;"> Developed By-<b>Vinaykumar M Kolli and Vaishakh B N</b><br/> </p><p></p>
      </div>
      </div>
  </body>
</html>









</form>


</body>
</html>
