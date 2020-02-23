<?php
$header_kml ='<?xml version="1.0" encoding="UTF-8"?>
<kml xmlns="http://www.opengis.net/kml/2.2" xmlns:gx="http://www.google.com/kml/ext/2.2">
<Document>
  <!-- Begin Style Definitions -->
  <Style id="line1">
    <LineStyle>
      <color>FF007DEF</color>
      <width>1</width>
    </LineStyle>
  </Style>
  <Folder>
    <name>Line Features</name>
    <description>Line Features</description>
    <Placemark>
      <description>Unknown Line Type</description>
      <styleUrl>#line1</styleUrl>
      <LineString>
        <coordinates>
';

$footer_kml = '</coordinates>
      </LineString>
    </Placemark>
  </Folder>
</Document>
</kml>
';
if(isset($_POST["kml"]))  
 {  
      require_once('../dbconnect.php'); 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=traseu.kml');  
      $output = fopen("php://output", "w");  
     fwrite($output, $header_kml);  
      $query = "SELECT lat,lng FROM viatransilvanica";  
      $result = mysqli_query($con, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }
   fwrite($output, $footer_kml); 	  
      fclose($output);  
 }  
 
 
 ?>