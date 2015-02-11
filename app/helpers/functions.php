<?php

function load_posts() {
    $limit = 5;
    $abfrage = "SELECT * FROM posts ORDER BY  posts.timestamp DESC  LIMIT 0,5";
    $ergebnis = mysql_query($abfrage);
    $html = "";
    while ($row = mysql_fetch_object($ergebnis)) {
        $text = $row->content;
        $date = strtotime($row->timestamp);
        $t = date('N', $date);
        $wochentage = array('Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag');
        $wochentag = $wochentage[$t - 1];
        $time = date('d.m.Y H:i', $date);
        $time = $wochentag . ", " . $time . " Uhr";
        $postid = $row->id;

        $abfrage2 = "SELECT * FROM images where post_id = ".$postid." ";
        $ergebnis2 = mysql_query($abfrage2);
        $count = mysql_num_rows($ergebnis2) ;
        
        $html .= '<div class="col-sm-6 col-md-4">';
        $html .= '<div id="post" class="thumbnail">';
        $html .= ' <div class="caption">';
        $html .= ''
                . '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="user-data/1.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="user-data/17.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>';
        
        $html .= '<h6><a>near Munich at ' . $time . '</a></h6>';
         $html .= '<p> Count Bilder' . $count . '</p>';
        $html .= '<p>' . $text . '</p>';
        //     $html .= '<p><a href="#" class="btn btn-default" role="button">Print</a></p>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
    }



    return $html;
}

?>