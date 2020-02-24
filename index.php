<?php
require_once("api/dbconnect.php");

 $sql="SELECT * FROM viatransilvanica ORDER by timestamp DESC";
 $result = $con -> query($sql);
 
 
?>

<html>
<style>
 .button {
    background-color: red;
    color: white;
    float: right;
    height: 4em;
    width: 60%;
    font-size: 1.2em;
}

.title {
    text-align: center;
    color: blue;
    font-size: 1.5em;
    margin-top: 20px;
}
</style>
<body>
<p class="title">
 KML generator</p>
    <br/>
	<br/>
	<a href="course/" target=_blank>Culege puncte pe harta</a>
	<br/><br/>
	
	
	<form method="post" action="api/download/" align="center">  
      <input type="submit" name="kml" value="Generate KML file" class="button" />  
    </form>
	
	<br/>
   <form  action='api/addgpspoint/' method="POST">
    <p>
	lat:<input type=text name=lat>

	lng:<input type=text name=lng>
   
	<input type="submit" value="ADD">
	 </p>
   </form> 
   
   <?php
   echo "<br/>";
   if ($result)
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
	   <form  action='api/delete/' method="POST" style="display:inline;">
	     <input type=hidden name="id" value=<?php echo $rws["id"]?>>
	    <input type="submit" value="DELETE">
	   </form>
	   <?php
	   echo "<br/>";
	   
	   
	   
   }}
   
   ?>
   

 </body>
</html>