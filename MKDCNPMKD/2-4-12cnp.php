<?php

/**
 * @author Vaishakh and Vinay
 * @copyright 2012
 */
 $myFile = "certificate.txt";

$fh = fopen($myFile, 'r');
$newFile=fopen("db.txt",'w');
$b="\n";
while(!feof($fh)){
$theData = fgets($fh);
if (preg_match("/Signature Algorithm/i", $theData)) {
   $chars = preg_split('/:/', $theData, -1, PREG_SPLIT_OFFSET_CAPTURE);
       echo $chars[1][0];
    $a=$chars[1][0];
    fwrite($newFile,$a);
    }
    if (preg_match("/Not Before/i", $theData)) {
   $chars = preg_split('/GMT/', $theData, -1, PREG_SPLIT_OFFSET_CAPTURE);
       echo $chars[0][0];
    $a=$chars[0][0];
    fwrite($newFile,$a."\n");
    //fputs($newFile,$b,1); echo "<br>";
        }
    
     if (preg_match("/Not After/i", $theData)) {
   $chars = preg_split('/GMT/', $theData, -1, PREG_SPLIT_OFFSET_CAPTURE);
       echo $chars[0][0];
    $a=$chars[0][0];
    fwrite($newFile,$a."\n");
     //fputs($newFile,$b,1);    echo "<br>";
    }
    }
    fclose($fh);

   //fwrite($newFile,$a);
   
$myFile = "hdfc.txt";

$fh = fopen($myFile, 'r');
$newFile=fopen("db.txt",'a');
$b="\n";
while(!feof($fh)){
$theData = fgets($fh);
            if (preg_match("/Server public key /i", $theData)) {
   $chars = preg_split('/is/', $theData, -1, PREG_SPLIT_OFFSET_CAPTURE);
       echo $chars;
    $a=$chars[1][0];
    // Writing Server Publi key in line no 4
    fwrite($newFile,$a."\n");
         }
      if (preg_match("/Secure Renegotiation /i", $theData)) {
   $chars = preg_split('/is/', $theData, -1, PREG_SPLIT_OFFSET_CAPTURE);
       echo $chars;
    $a=$chars[0][0];
    // Writing Server Public key in line no 4
    fwrite($newFile,$a."\n");
         }    

     
if (preg_match("/Cipher    /i", $theData)) {
   $chars = preg_split('/:/', $theData, -1, PREG_SPLIT_OFFSET_CAPTURE);
       echo $chars;
    $a=$chars[0][0];
    // Writing Server Public key in line no 4
    fwrite($newFile,$a."\n");
         }    
     
}
fclose($fh);
?>