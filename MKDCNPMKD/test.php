
<html>
  <head>
  <title>MKD SSL WebServer Rating Application</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
    </style>
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCY2lDAYrjpBdGunwa_Qm_Y6NHjonxRbdg&sensor=true">
      <?php

/**
 * @authors Vaishakh And Kolli
 */

$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, "http://api.ipinfodb.com/v3/ip-city/?key=eeae72981b71c69fd7dd141403ac77852d1b176dfc0c12eb2b0ac7155a324238&ip=74.125.45.100
//");
$websiteName = $_REQUEST['url'];
echo "The Location of ".$_REQUEST['url'];
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
  <input type="text" id="lati" name="lati" value="<?php echo $latitude ?>"readonly="true"/>
  <input type="text" id="longi" name="longi" value="<?php echo $longitude?>" readonly="true";/>
  

  </form>
  <body>
    <div id="map_canvas" style="width:100%; height:100%"></div>
 <center>
 <h2><a href= "<?php echo 'http://localhost/MKDCNPMKD/rating.php?address='.$_REQUEST['url']; ?>" >Click here to GO back</a></h2>
<!--<form action="<?php echo 'rating.php?address='.$_REQUEST['url'];?>">
<input class="subbtn" type="submit" value="back" />
</form>--></center>  
  </body>
</html> 

