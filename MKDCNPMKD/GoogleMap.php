<script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCY2lDAYrjpBdGunwa_Qm_Y6NHjonxRbdg&sensor=true">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script>
    function initialize() {
        var latitude= $_REQUEST['lati'];
        var longitude=$_REQUEST['longi'];
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
<div id="map_canvas" style="width:100%; height:100%"></div>
