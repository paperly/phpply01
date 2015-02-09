<?php

//include "./config/db.php";
//include 'db.php';
include 'db.php';



$text = $_POST["text"];
$latitude  = $_POST["Latitude"];
$longitude  = $_POST["Longitude"];
   if(!empty($text)){
             
 $sql = "INSERT INTO posts (content,latitude,longitude) VALUES ('$text','$latitude','$longitude');";
         mysql_query($sql);
        
        echo $sql;
}

?>