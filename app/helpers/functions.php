<?php

function load_posts($page) {
    $limit = "5";
    $first = $limit * ($page - 1);
    $last = $first + $limit;
    $abfrage = "SELECT * FROM posts ORDER BY  posts.timestamp DESC  LIMIT $limit OFFSET $first ";
    $ergebnis = mysql_query($abfrage);
    $html = "";
    while ($row = mysql_fetch_object($ergebnis)) {
        $text = $row->content;
        $text = wordwrap($text, 7, "\n", true);
        $date = strtotime($row->timestamp);
        $t = date('N', $date);
        $wochentage = array('Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag');
        $wochentag = $wochentage[$t - 1];
        $time = date('d.m.Y H:i', $date);
        $time = $wochentag . ", " . $time . " Uhr";
        $postid = $row->id;

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
        $html .= '<h6>Post id: ' . $postid . ' Pageid: ' . $page . '<a>near Munich at ' . $time . '</a></h6>';

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