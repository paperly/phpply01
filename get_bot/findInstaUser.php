<?php

$verbindung = mysql_connect("mail.paperly.de", "d01d30b0", "fL5LpWkXSH7PGEME") or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
mysql_select_db("d01d30b0")
        or die("Die Datenbank existiert nicht.");




require 'src/Instagram.php';

use MetzWeb\Instagram\Instagram;

$instagram = new Instagram('15a97d5a6772448a8d99530bcf829963');
//$result = $instagram->getPopularMedia();


    $lat = "48.137758";
    $lng = "11.575615";
    $distance = "5000";
    $minTimestamp = "";
    $maxTimestamp = "";
    $result = $instagram->searchMedia($lat, $lng, $distance, $minTimestamp, $maxTimestamp);
//getMedia("");
 
    
   
    foreach ($result->data as $media) {

        $instagram_id = $media->id;
        $instagram_username = $media->user->username;
        $instagram_userid = $media->user->id;
        
            $result2 = $instagram->getUser($instagram_userid);
            $followercount= $result2->data->counts->followed_by;
            $postscount = $result2->data->counts->media;
    echo "</br> $instagram_id   Username: <a target='_blank' href='https://instagram.com/$instagram_username'>$instagram_username</a> userId: $instagram_userid Follower: $followercount";
 $sql = "INSERT INTO insta_user (id,username,follower,posts) VALUES ('$instagram_userid','$instagram_username','$followercount','$postscount');";
                mysql_query($sql);

    
   

        // output media
        //echo $content . "</li>";
    }

?>
