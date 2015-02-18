<?php 
session_start(); 
$datei = $_FILES['datei']['name']; // Dies hab ich noch nicht getestet, da ich den Namen immer nach datum und user id abgespeichert hab. 
$datei = str_replace(" ", "_", "$datei"); 
$datei = htmlentities($datei); // Mit leerzeichen -> _ hab ich auch noch nicht getestet, sollte aba klappen 
$dateityp = GetImageSize($_FILES['datei']['tmp_name']); 
if($dateityp[2] == 2) 
   { 

   if($_FILES['datei']['size'] <  2048000) //max. Größe in bytes 
      { 
      move_uploaded_file($_FILES['datei']['tmp_name'], "upload/temp-$datei"); 
                  $file        = "upload/temp-$datei"; 
                  $target    = "upload/$datei"; 
                  $max_width   = "500"; //Breite ändern 
                  $max_height   = "500"; //Höhe ändern 
                  $quality     = "90"; //Qualität ändern (max. 100) 
                  $src_img     = imagecreatefromjpeg($file); 
                  $picsize     = getimagesize($file); 
                  $src_width   = $picsize[0]; 
                  $src_height  = $picsize[1]; 
                   
                  if($src_width > $src_height) 
                  { 
                  if($src_width > $max_width) 
                  { 
                    $convert = $max_width/$src_width; 
                    $dest_width = $max_width; 
                    $dest_height = ceil($src_height*$convert); 
                  } 
                  else 
                  { 
                    $dest_width = $src_width; 
                    $dest_height = $src_height; 
                  } 
                  } 
                  else 
                  { 
                  if($src_height > $max_height) 
                  { 
                    $convert = $max_height/$src_height; 
                    $dest_height = $max_height; 
                    $dest_width = ceil($src_width*$convert); 
                  } 
                  else 
                  { 
                    $dest_height = $src_height; 
                    $dest_width = $src_width; 
                  } 
                  } 
                  $dst_img = imagecreatetruecolor($dest_width,$dest_height); 
                  imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $dest_width, $dest_height, $src_width, $src_height); 
                  imagejpeg($dst_img, "$target", $quality); 






// Ab hier wird noch eine Thumbnail erstellt.  
                  $file2       = "upload/$datei"; 
                  $target2    = "upload/thumbnail-$datei"; 
                  $max_width   = "150"; //Thumbnailbreite 
                  $max_height   = "150"; //Thumbnailhöhe 
                  $quality     = "90"; //Thumbnailqualität 
                  $src_img     = imagecreatefromjpeg($file2); 
                  $picsize     = getimagesize($file2); 
                  $src_width   = $picsize[0]; 
                  $src_height  = $picsize[1]; 
                   
                  if($src_width > $src_height) 
                  { 
                  if($src_width > $max_width) 
                  { 
                    $convert = $max_width/$src_width; 
                    $dest_width = $max_width; 
                    $dest_height = ceil($src_height*$convert); 
                  } 
                  else 
                  { 
                    $dest_width = $src_width; 
                    $dest_height = $src_height; 
                  } 
                  } 
                  else 
                  { 
                  if($src_height > $max_height) 
                  { 
                    $convert = $max_height/$src_height; 
                    $dest_height = $max_height; 
                    $dest_width = ceil($src_width*$convert); 
                  } 
                  else 
                  { 
                    $dest_height = $src_height; 
                    $dest_width = $src_width; 
                  } 
                  } 
                  $dst_img = imagecreatetruecolor($dest_width,$dest_height); 
                  imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $dest_width, $dest_height, $src_width, $src_height); 
                  imagejpeg($dst_img, "$target2", $quality); 

                  unlink($file); 
                  echo "<img src=\"upload/$datum-$userid.jpg\">"; 
                  } 

   else 
      { 
         echo "<center><b>Das Bild darf nicht größer als 2MB sein</b></center>"; 
      } 

    } 

else 
    { 
    echo "<center><b>Bitte nur Bilder im JPG Format hochladen</b></center>"; 
    } 
?>