<?php 
require_once("../dbconnect.php");



if ( isset($_POST["id"]))
 if ($_POST["id"]!='')	$id = $_POST["id"];



if (isset($id))
  {
	
	$sql = " DELETE FROM viatransilvanica  WHERE id = '$id' ";
	$result = $con -> query($sql);
  }

header('Location: http://autobook.space/gps/');
?>