<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="white">
        <meta name="viewport" content="width=device-width">
        <link rel="manifest" href="manifest.json">

        <title>ppply 01</title>

        <!-- Bootstrap -->
        <link href="assets/style/bootstrap/bootstrap.css" rel="stylesheet">
        <link href="assets/style/style_basic.css" rel="stylesheet">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- Include jQuery Mobile stylesheets -->
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
        <!-- Include the jQuery Mobile library -->
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/js/bootstrap/bootstrap.min.js"></script>
        <script src="assets/js/addPost.js"></script>
        <script src="assets/js/map.js"></script>
        <script src="assets/js/jquery.infinitescroll.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      <!--   <style>
       #map-canvas {
        height: 300px;
        width: 300px;
        margin: 0px;
        padding: 0px
      }
    </style> !-->


    </head>
    <body>
        <?php
        $text = $_POST["text"];
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        if (!empty($text) && !empty($latitude) && !empty($longitude)) {
            $sql = "INSERT INTO posts (content,latitude,longitude) VALUES ('$text','$latitude','$longitude');";
            mysql_query($sql);
            $postid = mysql_insert_id();

// Add this product into the database now
            // $sql = mysql_query("INSERT INTO images (post_id) VALUES('1');");
            //$pid = mysql_insert_id();
// Place image in the folder 
            // $newname = "$pid.jpg";
            // $dub = move_uploaded_file($_FILES['image']['tmp_name'], "user-data/$newname");
//Loop through each file+
            //Tests
            //echo "coun:".count($_FILES['upload']['name']);
            // echo $_FILES['upload']['name'][0];

            for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
                //Get the temp file path
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                //Make sure we have a filepath
                if ($tmpFilePath != "") {
                    //Setup our new file path
                    $sql = mysql_query("INSERT INTO images (post_id) VALUES('" . $postid . "');");
                    $pid = mysql_insert_id();
                    $newname = "$pid.jpg";
                    $newFilePath = "user-data/" . $newname;






                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                        //Handle other code here
                        ///small

                        $file = $newFilePath;
                        $target = "klein/$newname";
                        $max_width = "320"; //Breite ändern 
                        $max_height = "300"; //Höhe ändern 
                        $quality = "50"; //Qualität ändern (max. 100) 
                        $src_img = imagecreatefromjpeg($file);
                        $picsize = getimagesize($file);
                        $src_width = $picsize[0];
                        $src_height = $picsize[1];

                        if ($src_width > $src_height) {
                            if ($src_width > $max_width) {
                                $convert = $max_width / $src_width;
                                $dest_width = $max_width;
                                $dest_height = ceil($src_height * $convert);
                            } else {
                                $dest_width = $src_width;
                                $dest_height = $src_height;
                            }
                        } else {
                            if ($src_height > $max_height) {
                                $convert = $max_height / $src_height;
                                $dest_height = $max_height;
                                $dest_width = ceil($src_width * $convert);
                            } else {
                                $dest_height = $src_height;
                                $dest_width = $src_width;
                            }
                        }
                        $dst_img = imagecreatetruecolor($dest_width, $dest_height);
                        imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $dest_width, $dest_height, $src_width, $src_height);
                        imagejpeg($dst_img, "$target", $quality);
                        // small
                    }
                }
            }
        }
        ?>



        <div class="container">
            <div class="page-header">
                <h1>paperly <small> around you</small></h1>
            </div>


            <div class="well well-lg">
                <p>Find nice people and nice places 50 miles around you!</p>
            </div>


            <form action="/" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control"  name="text" id="contentblock" rows="7"></textarea>
                </div>

                <div class="form-group">

                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-primary btn-file">
                                Add Picture <input type="file" name="upload[]"  multiple="multiple" accept="image/*">
                            </span>
                        </span>

                        <input type="text"  class="form-control" readonly="">

                    </div>
                </div>

                <div class="form-group">
                    <input type="text"  name="latitude" id="latitude" type="hidden">
                    <input type="text"  name="longitude" id="longitude"  type="hidden">
                    <button type="submit" class="btn btn-primary">Send</button>
                    <!--<button onclick="add_post();" class="btn btn-primary">Send</button>!-->
                </div>


            </form>

            <div id="content" class="row">

                <?php
// 1 = page 1
                
                $longitude ="";
                $latitude = "";
                echo load_posts(1);
                ?>

            </div>


            <a id="next" href="load.php?page=2">next page?</a>


            <script>


                $('#content').infinitescroll({
                    loading: {
                        finished: undefined,
                        finishedMsg: "",
                        img: null,
                        loadingImg: null,
                        msg: null,
                        msgText: "",
                        selector: null,
                        speed: 'fast',
                        start: undefined

                    },
                    navSelector: "#next:last",
                    nextSelector: "a#next:last",
                    itemSelector: "#content ",
                    // debug: true,
                    bufferPx: 4000,
                    dataType: 'html',
                    // maxPage: 3,
                    //		prefill			: true,
                    //		path: ["http://nuvique/infinite-scroll/test/index", ".html"]
                    //    path: function (index) {
                    //      return "index" + index + ".html";
                    //}
                    // behavior		: 'twitter',
                    // appendCallback	: false, // USE FOR PREPENDING
                    // pathParse     	: function( pathStr, nextPage ){ return pathStr.replace('2', nextPage ); }
                }, function (newElements, data, url) {
                    //USE FOR PREPENDING
                    // $(newElements).css('background-color','#ffef00');
                    // $(this).prepend(newElements);
                    //
                    //END OF PREPENDING

                    //    	window.console && console.log('context: ',this);
                    //    	window.console && console.log('returned: ', newElements);

                });
            </script>




        </div>


    </body>
</html>