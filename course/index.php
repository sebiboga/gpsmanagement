<?php 
require_once("../api/dbconnect.php");

$sql = "SELECT *  FROM viatransilvanica";
$result = $con -> query($sql);

?>

<!DOCTYPE html>
<html>
<head>
<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAstapprUlnq4MZGSaGt-S9EXtE1W85iLU&sensor=false">
</script>


<script>

function sendGPStoDB(lat,lng) {
     
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","../api/addgpspoint/?"+"&lat="+lat+"&lng="+lng,true);
        xmlhttp.send();
		
    
}

var map;
var myCenter=new google.maps.LatLng(47.774297,25.704964000000018);


function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:17,
 // mapTypeId:google.maps.MapTypeId.SATELLITE
  mapTypeId: google.maps.MapTypeId.HYBRID
  };


var markers = 
<?php 
   $markers = array();
   
  while ($rws=$result->fetch_assoc()){
  $x=new StdClass();
   $x->coords = new StdClass();
     $x->coords->lat = $rws["lat"];
     $x->coords->lng = $rws["lng"];
  $markers[] = $x;
  }
$markers = json_encode($markers);
  echo str_replace('"','',$markers);
?>;


		

               
  map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
  
 for (var i=0;i < markers.length; i++) {
	  putMarker(markers[i]);
	}
  

 google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(event.latLng);
  });
  
  
}




function putMarker(props) {
  var marker = new google.maps.Marker({
    position: props.coords,
    map: map
  });
  
   if(props.iconImage) {
   marker.setIcon(props.iconImage);
                  }


                     
  
  }

function placeMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map,
  });
   
  
  var lat=location.lat();
  var lng =location.lng();
  
  var hole="";
  
  var text = '';
  text+=''+location.lat();
   text+='<br>';
   text+=location.lng();
   text+='<br>';
   text+='<br>';
 
  text+='<button onclick="sendGPStoDB('+lat+','+lng+')">ADD</button>';
  
   
  var infowindow = new google.maps.InfoWindow({
    content: text
	
  });
  
  infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
<div id="googleMap" style="width:1900px;height:900px;float:left;"></div>


</body>
</html>


