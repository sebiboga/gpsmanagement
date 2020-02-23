<?php
if(isset($_POST["kml"]))  
 {  
      require_once('../dbconnect.php'); 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=databaseintermediate.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array( 'lat', 'lng'));  
      $query = "SELECT lat,lng FROM viatransilvanica";  
      $result = mysqli_query($con, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 
 
 ?>