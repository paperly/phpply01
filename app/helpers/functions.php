<?php


function load_posts(){
  $limit = 5;
  $abfrage = "SELECT * FROM posts ORDER BY  posts.timestamp DESC  LIMIT 0,50";
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
              
                $html .= '<div class="col-sm-6 col-md-4">';
                $html .= '<div id="post" class="thumbnail">';
                $html .= ' <div class="caption">';
                $html .= '<h6><a>near Munich at '.$time.'</a></h6>';
                $html .= '<p>'.$text.'</p>';
                $html .= '<p><a href="#" class="btn btn-primary" role="button">Share</a> <a href="#" class="btn btn-default" role="button">Print</a></p>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
                
              
      
                
            }
  
    
    
    return $html;
}



?>