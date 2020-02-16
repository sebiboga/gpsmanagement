<?php
require_once("api/dbconnect.php");

 $sql="SELECT * FROM viatransilvanica  ORDER by ord";
 $result = $con -> query($sql);
 
 
?>

<html>
<body>
 <form >
   <button type="button">ADD GPS point</button>
   
   <?php
   echo "<br/>";
   
   if ($result->num_rows==0){
	   
   }    else {
   while ($rws=$result->fetch_assoc()){
	   $url="https://www.google.com/maps/dir//";  
	     $url.= $rws["lat"];
		 $url.= ",";
		 $url.= $rws["lng"];
	   echo $rws["lat"].','.$rws["lng"];
	   echo "<a href=$url target=_blank><img src='assets/pin.png' width=25></a>";
	   ?>
	   <button type="button">EDIT</button>
	   <button type="button">DELETE</button>
	   <?php
	   echo "<br/>";
	   
	   
	   
   }}
   
   ?>
   
 </form>
 </body>
</html>