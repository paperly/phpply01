<?php

$verbindung = mysql_connect("mail.paperly.de", "d01d30b0", "fL5LpWkXSH7PGEME") or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
mysql_select_db("d01d30b0")
        or die("Die Datenbank existiert nicht.");




require 'src/Instagram.php';

use MetzWeb\Instagram\Instagram;

$instagram = new Instagram('15a97d5a6772448a8d99530bcf829963');
//$result = $instagram->getPopularMedia();

$abfrage = "SELECT * FROM locations";
$ergebnis = mysql_query($abfrage);


// while datenbank
while ($row = mysql_fetch_object($ergebnis)) {
 echo "hallo";

    $lat =  $row->lat;
    $lng = $row->long;
    $distance = $row->distance;
    $minTimestamp = "";
    $maxTimestamp = "";
    $result = $instagram->searchMedia($lat, $lng, $distance, $minTimestamp, $maxTimestamp);
//getMedia("");
    ?>

    <?php

    foreach ($result->data as $media) {
        $content = "<li>";

        // output media
        if ($media->type === 'image') {

            // image
            $image = $media->images->low_resolution->url;
            $content .= "<img class=\"media\" src=\"{$image}\"/>";
        }
        // create meta section
        //$avatar = $media->user->profile_picture;
        // $username = $media->user->username;
        $posttext = (!empty($media->caption->text)) ? $media->caption->text : '';
        $latitude = $media->location->latitude;
        $longitude = $media->location->longitude;

        // Datenbank
        if (!empty($media->caption->text)) {
            $sql = "INSERT INTO posts (content,latitude,longitude) VALUES ('$posttext','$latitude','$longitude');";
            $b = mysql_query($sql);
            if ($b) {
                $postid = mysql_insert_id();


                // Picture Upload

                $sql = mysql_query("INSERT INTO images (post_id) VALUES('" . $postid . "');");
                $pid = mysql_insert_id();
                $newname = "$pid.jpg";
                $newFilePath = "user-data/" . $newname;
                $contents = file_get_contents($media->images->low_resolution->url);
                setlocale(LC_TIME, 'de_DE');
                $savename = strftime("%Y-%m-%d_%H-%M-%S");

                $savefile = fopen("../klein/" . $newname, "w");
                fwrite($savefile, $contents);
                fclose($savefile);
            }
        }










        // output media
        //echo $content . "</li>";
    }
} // ende While dtanebank
?>
