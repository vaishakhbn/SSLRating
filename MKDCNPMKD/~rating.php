<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="Vinay And Vaishakh" />

	<title>V's RVCE SSL Web Server Rating Guide</title>
</head>

<body>
<form action="x.php" method= "post">
<?php
$newFile=fopen("E:\cn-project\db.txt",'r');
$i=0;
while(!feof($newFile)){
$theData[$i] = fgets($newFile);
$i++;
}

?>
<table>
<tr> 
<td><label>Signature Algorithm is </label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[0] ?>" readonly=""/></td>
</tr>
<tr> 
<td><label>Certificate Valid </label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[1] ?>"readonly = ""/></td>
</tr>
<tr> 
<td><label>Certificate Valid </label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[2] ?>"readonly = ""/></td>
</tr>

<tr> 
<td><label>Public Key Type</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[3] ?>"readonly = ""/></td>
</tr>
<tr> 
<td><label>Server Public Key length is </label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[4] ?>"readonly = ""/></td>
</tr>
<tr> 
<td><label>Secure Renegotiation is</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[5] ?>"readonly = ""/></td>
</tr>
<tr> 
<td><label>Signature Algorithm is </label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[0] ?>"readonly = ""/></td>
</tr>
<tr> 
<td><label>Name Of the Issuer</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[0] ?>"readonly = ""/></td>
</tr>
<tr> 
<td><label>Chain Length</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[0] ?>"readonly = ""/></td>
</tr>
<tr> 
<td><label>Trusted</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[0] ?>"readonly = ""/></td>
</tr>
<tr> 
<td><label>Test Date</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[0] ?>"readonly = ""/></td>
</tr>
<tr> 
<td><label>Test Duration</label>
</td><td><input type ="text" name= "P" value="<?php echo $theData[0] ?>"readonly = ""/></td>
</tr>
</table>
<table>
<tr>

<input type = "submit" name=" View Graph " value ="View Graph" onmouseover="View Graph " align="right" />
</tr>
</table>

</form>









</form>
$certificate[] = {"Verisign Inc", "Google" }; //more to be added

$cipher[] = {" sha1WithRSAEncryption"}; //more to be added


</body>
</html>