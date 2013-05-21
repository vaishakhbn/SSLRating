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
$certificate =array( "Verisign Inc", "Google"); //more to be added

$cipher[] = array(" sha1WithRSAEncryption"); //more to be added

$signature_algorith = array ("sha1WithRSAEncryption"); //more to come
$cert=0;
$chain_length = array("1024bit"); //more 
$j=0;
$i=1; 
echo $theData[0];
echo $cipher[0][0];
$data=$cipher[0][0];
if(strcmp($cipher[0][0],$theData[0])==0)
echo "hi";
/*while($i!=0)
{
	if((strcmp($cipher[0][$j],$theData[0]))==0)
{
$i=0;
switch($j)
{	
	case 0:
	$cert=100;
	break;
	case 1:
	$cert=90;
	break;
	case 2: 
	$cert=60;
	break;

}
echo $cert;
}
$j++;
}*/

?>
<table>
<tr><td><input type="text" value="The Certificate strength is " readonly="true"/></td>
    <td><input type="text" value="<?php echo $cert ?>"/></td>
    </tr>
    </table>
		


</body>
</html>