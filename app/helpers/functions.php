<?php

function load_posts($page) {
    $limit = "20";
    $distance ="5"; // in km
    $first = $limit * ($page - 1);
    $last = $first + $limit;
    
    $mylatitude="48.161098";
    $mylongitude="11.527798";
    
    $abfrage = "SELECT id,timestamp,content,111.324 *  acos(sin(latitude) * sin($mylatitude) + cos(latitude) * cos($mylatitude) * cos($mylongitude - longitude)) AS distance FROM posts HAVING distance <= $distance ORDER BY  posts.timestamp DESC  LIMIT $limit OFFSET $first ";
    $ergebnis = mysql_query($abfrage);
    $html = "";
    while ($row = mysql_fetch_object($ergebnis)) {
        $text = $row->content;
        $text = wordwrap($text, 7, "\n", true);
        $date = strtotime($row->timestamp);
        $t = date('N', $date);
        $id = $row->id;
        //$wochentage = array('Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag');
        // $wochentage = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $wochentage = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
        $wochentag = $wochentage[$t - 1];
        //$timedate = date('d.m.Y H:i', $date);
        
        $timedate = $wochentag . ", " . date('d.m.Y H:i', $date) . "";
        
        
        
        
    
    $atime = strtotime("now");
    $diff = $atime - $date;
    $secs = $diff;
    $days = intval($secs / (60 * 60 * 24));
    $secs = $secs % (60 * 60 * 24);
    $hours = intval($secs / (60 * 60));
    $secs = $secs % (60 * 60);
    $mins = intval($secs / 60);
    $secs = $secs % 60;
    if (strlen($hours) == 1)
        $hours = "" . $hours;
    if (strlen($mins) == 1)
        $mins = "" . $mins;
    if (strlen($secs) == 1)
        $secs = "" . $secs;
    if ($hours == 0)
        $timesince = "" . $mins . " m";
    else
        $timesince = "" . $hours . " h";
    
    
    if ($diff <= 86400) {
        // $time = "am ".date('d.m.Y H:i', $date);
        $time = $hours." h ago";
    }
 else {
        $time = $timedate;
    }
     if ($diff <= 3600) {
        // $time = "am ".date('d.m.Y H:i', $date);
        $time = $mins." min ago";
    }
     if ($diff <= 60) {
        // $time = "am ".date('d.m.Y H:i', $date);
        $time = "now";
    }
        
        
      // $time = $time2;
        
        $postid = $row->id;
        $distance = round($row->distance, 3);
        $abfrage2 = "SELECT * FROM images where post_id = " . $postid . " ";
        $ergebnis2 = mysql_query($abfrage2);
        $count = mysql_num_rows($ergebnis2);

        $html .= '<div id="post"  class="col-sm-6 col-md-4">';
        $html .= '<div class="thumbnail">';
        $html .= ' <div class="caption">';
        $html .= ' <div id="carousel-' . $postid . '" class="carousel slide" data-interval="false" >';
        if ($count > 1) {
            $html .= '<!-- Indicators -->
  <ol class="carousel-indicators">
  <li data-target="#carousel-' . $postid . '" data-slide-to="0" class="active"></li>';
            for ($i =1; $i <=$count; $i++) {
                $html.=' <li data-target="#carousel-' . $postid . '" data-slide-to="' . $i . '"></li>';
            }

            $html.='
    
  </ol>';
        }

        $html.='<!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">';
        $pointer_first = 0;
        while ($row2 = mysql_fetch_object($ergebnis2)) {
            $image = $row2->id . ".jpg";

            if ($pointer_first == 0) {
                $html .= ' 
       <div class="item active">';
            } else {
                $html .= ' 
       <div class="item">';
            }
            $html .= ' 
      <img src="klein/' . $image . '" alt="">
    </div>';
            $pointer_first++;
        }

        $html .= '</div>';

        if ($count > 1) {


            $html .= ''
                    . '
 

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-' . $postid . '" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-' . $postid . '" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>';
        }
        $html .= '</div>';
       // $html .= '<h6>Post id: ' . $postid . ' Pageid: ' . $page . '<a>near '.$distance.' km at ' . $time . '</a></h6>';
        $html .= '<h6>Post id: ' . $id . '<a> '.$distance.' km away, ' . $time. '</a></h6>';

        $html .= '<p style="word-break:break-all;word-wrap:break-word">' . $text . '</p>';
        //  $html .= '<p><a href="#" class="btn btn-default" role="button">Print</a></p>';
        //  $html .= '<p><div class="col-xs-4">
        //<div id="map-canvas"></div>
        //     </div></p>';


        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
    }



    return $html;
}

?>