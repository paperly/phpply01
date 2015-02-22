<?php
$verbindung = mysql_connect("mail.paperly.de", "d01d30b0", "fL5LpWkXSH7PGEME") or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
mysql_select_db("d01d30b0")
        or die("Die Datenbank existiert nicht.");




require '../src/Instagram.php';

use MetzWeb\Instagram\Instagram;

$instagram = new Instagram('15a97d5a6772448a8d99530bcf829963');
//$result = $instagram->getPopularMedia();

$lat = "48.137315";
$lng = "11.575434";
$distance = "100";
$minTimestamp = "";
$maxTimestamp = "";
$result = $instagram->searchMedia($lat, $lng, $distance, $minTimestamp, $maxTimestamp);
//getMedia("");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Instagram - popular photos</title>
        <link href="https://vjs.zencdn.net/4.2/video-js.css" rel="stylesheet">
        <link href="assets/style.css" rel="stylesheet">
        <script src="https://vjs.zencdn.net/4.2/video.js"></script>
    </head>
    <body>
        <div class="container">
            <header class="clearfix">
                <img src="assets/instagram.png" alt="Instagram logo">
                <h1>Instagram <span>popular photos</span></h1>
            </header>
            <div class="main">
                <ul class="grid">
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
                            if($b)
                            {
                            $postid = mysql_insert_id();


                            // Picture Upload

                            $sql = mysql_query("INSERT INTO images (post_id) VALUES('" . $postid . "');");
                            $pid = mysql_insert_id();
                            $newname = "$pid.jpg";
                            $newFilePath = "user-data/" . $newname;
                            $contents = file_get_contents($media->images->low_resolution->url);
                            setlocale(LC_TIME, 'de_DE');
                            $savename = strftime("%Y-%m-%d_%H-%M-%S");

                            $savefile = fopen("..../klein/" . $newname, "w");
                            fwrite($savefile, $contents);
                            fclose($savefile);
                            }
                        }










                        // output media
                        echo $content . "</li>";
                    }
                    ?>
                </ul>


            </div>
        </div>
        <!-- javascript -->

    </body>
</html>
