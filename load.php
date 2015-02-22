

<div id="content">
<?php

include "config/db.php";
include "app/helpers/functions.php";

$page = $_GET["page"];        
   echo load_posts($page);
?>
    
     
		
</div>