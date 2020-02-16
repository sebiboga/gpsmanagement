<?php 
require_once("../dbconnect.php");
function guid(){
if (function_exists('com_create_guid') === true)
    return trim(com_create_guid(), '{}');

$data = openssl_random_pseudo_bytes(16);
$data[6] = chr(ord($data[6]) & 0x0f | 0x40);
$data[8] = chr(ord($data[8]) & 0x3f | 0x80);
return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

if ( isset($_POST["lat"])) $lat = $_POST["lat"];
if ( isset($_POST["lng"])) $lng = $_POST["lng"];



if (isset($lat) && isset($lng))
{
	$id = guid();
	$sql = " INSERT INTO viatransilvanica(id,lat,lng) VALUES ('$id','$lat','$lng') ";
	$result = $con -> query($sql);
}

header('Location: http://autobook.space/gps/');
?>