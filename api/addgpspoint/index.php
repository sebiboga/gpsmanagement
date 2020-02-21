<?php 
require_once("../dbconnect.php");
$timestamp = date("Y-m-d H:i:s");
function guid(){
if (function_exists('com_create_guid') === true)
    return trim(com_create_guid(), '{}');

$data = openssl_random_pseudo_bytes(16);
$data[6] = chr(ord($data[6]) & 0x0f | 0x40);
$data[8] = chr(ord($data[8]) & 0x3f | 0x80);
return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

if ( isset($_POST["lat"]))
 if ($_POST["lat"]!='')	$lat = $_POST["lat"];

if ( isset($_GET["lat"]))
 if ($_GET["lat"]!='')	$lat = $_GET["lat"];

if ( isset($_POST["lng"]))
 if ($_POST["lng"])	$lng = $_POST["lng"];

if ( isset($_GET["lng"]))
 if ($_GET["lng"])	$lng = $_GET["lng"];



if (isset($lat) && isset($lng))
{
	$id = guid();
	$sql = " INSERT INTO viatransilvanica(id,lat,lng, timestamp) VALUES ('$id','$lat','$lng','$timestamp') ";
	$result = $con -> query($sql);
}

header('Location: https://autobook.space/gps/');
?>