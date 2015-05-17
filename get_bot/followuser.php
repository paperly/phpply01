<?php

$verbindung = mysql_connect("mail.paperly.de", "d01d30b0", "fL5LpWkXSH7PGEME") or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
mysql_select_db("d01d30b0")
        or die("Die Datenbank existiert nicht.");




require 'src/Instagram.php';

use MetzWeb\Instagram\Instagram;

$instagram = new Instagram('15a97d5a6772448a8d99530bcf829963');
//$result = $instagram->getPopularMedia();


// grab OAuth callback code
$code = $_GET['4401527.1fb234f.0b0a64196a404d3ca7c6498bad0f418c '];
$data = $instagram->getOAuthToken($code);

echo 'Your username is: ' . $data->user->username;



    
//getMedia("");
 
    
    
    //$instagram->modifyRelationship('follow', 1574083);

   /* foreach ($result->data as $media) {

        $instagram_id = $media->id;
        $instagram_username = $media->user->username;
        $instagram_userid = $media->user->id;
        
            $result2 = $instagram->getUser($instagram_userid);
            $followercount= $result2->data->counts->followed_by;
    echo "</br> $instagram_id   Username: <a target='_blank' href='https://instagram.com/$instagram_username'>$instagram_username</a> userId: $instagram_userid Follower: $followercount";


    
   

        // output media
        //echo $content . "</li>";
    }*/

?>
