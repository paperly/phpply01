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


<!-- Include the jQuery Mobile library -->
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
 <script src="assets/js/addPost.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
       <div class="container">
   <div class="page-header">
  <h1>index.php <small>Timeline</small></h1>
</div>
   
      
      <div class="well well-lg">
          <p>Hallo Hallo!! Hier bekommt ihr einen Überblick über alles</p>
      </div>

   
           
           
           
           
     <form>
  
  <div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" id="contentblock" rows="7"></textarea>
  </div>
  
   <div class="form-group">
       <button onclick="add_post();" class="btn btn-default">Submit</button>
   </div>
  
</form>
       
           <div class="row">
               
               <?php
               
               echo load_posts();
               
               ?>
               
           </div>
           
    <div class="row">

    <div class="col-sm-6 col-md-4">
    <div id="post" class="thumbnail">
  
      <div class="caption">
          <h6><a>near Munich</a></h6>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        <p><a  class="btn btn-primary" role="button">klick</a> <a href="#" class="btn btn-default" role="button">Print</a></p>
      </div>
    </div>
  </div>
          <div class="col-sm-6 col-md-4">
    <div id="post" class="thumbnail">
  
      <div class="caption">
          <h6><a>near Munich</a></h6>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        <p><a href="#" class="btn btn-primary" role="button">Share</a> <a href="#" class="btn btn-default" role="button">Print</a></p>
      </div>
    </div>
  </div>
          <div class="col-sm-6 col-md-4">
    <div id="post" class="thumbnail">
  
      <div class="caption">
          <h6><a>near Munich</a></h6>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        <p><a href="#" class="btn btn-primary" role="button">Share</a> <a href="#" class="btn btn-default" role="button">Print</a></p>
      </div>
    </div>
  </div>
          <div class="col-sm-6 col-md-4">
    <div id="post" class="thumbnail">
  
      <div class="caption">
          <h6><a>near Munich</a></h6>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        <p><a href="#" class="btn btn-primary" role="button">Share</a> <a href="#" class="btn btn-default" role="button">Print</a></p>
      </div>
    </div>
  </div>
          <div class="col-sm-6 col-md-4">
    <div id="post" class="thumbnail">
  
      <div class="caption">
          <h6><a>near Munich</a></h6>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        <p><a href="#" class="btn btn-primary" role="button">Share</a> <a href="#" class="btn btn-default" role="button">Print</a></p>
      </div>
    </div>
  </div>  <div class="col-sm-6 col-md-4">
    <div id="post" class="thumbnail">
  
      <div class="caption">
          <h6><a>near Munich</a></h6>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        <p><a href="#" class="btn btn-primary" role="button">Share</a> <a href="#" class="btn btn-default" role="button">Print</a></p>
      </div>
    </div>
  </div>
    <div class="col-sm-6 col-md-4">
    <div id="post" class="thumbnail">
  
      <div class="caption">
          <h6><a>near Munich</a></h6>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        <p><a href="#" class="btn btn-primary" role="button">Share</a> <a href="#" class="btn btn-default" role="button">Print</a></p>
      </div>
    </div>
  </div>
  
        
        
      

       
</div>
    
    
    

    
    
    </div>
    
  
  </body>
</html>