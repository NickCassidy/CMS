<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Billy Bates - Archive</title>

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">

    <!--start gallery css -->

    <link rel="stylesheet" href="../css/grid.css" >
    <link rel="stylesheet" href="../css/demo.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/elastislide.css" />
    <link rel="stylesheet" href="../css/navbar-fixed-top.css">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <!--end gallery css -->

    <noscript>
      <style>
        .es-carousel ul{
          display:block;
        }
      </style>
    </noscript>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.tmpl.min.js"></script>
    <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../js/jquery.elastislide.js"></script>
    <script type="text/javascript" src="../js/gallery.js"></script>
    <script type="text/javascript" src="../js/playPause.js"></script>

    <script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">  
      <div class="rg-image-wrapper">
        <div class="rg-image"></div>
              {{if itemsCount > 1}}
          <div class="rg-image-nav">
            <a href="#" class="rg-image-nav-prev"></a>
            <a href="#" class="rg-image-nav-next"></a>
          </div>
              {{/if}}
          <div class="rg-loading"></div>
        </div>
        <div class="rg-caption"><p></p>
      </div>
    </script>
  </head>
  <body onload="stopCount()">
      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../" target="_self">Simon Turtle</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="../portfolio/">Portfolio</a></li>
              <li><a href="../portrait/">Portraits</a></li>
              <li class="active"><a href="../archive/">Archive</a></li>
              <li><a href="../poster/">Posters</a></li>
              <li><a href="../ella/">Ella</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../contact/">Contact</a></li>
              </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>
      <div id="slideshowControls">
        <div class="text"><a href="javascript:doTimer();">Play</a></div>
        <div class="text" style="display:none"><a href="javascript:stopCount();">Pause</a></div>
      </div>
                              
      <div class="container">  
        <div id="rg-gallery" class="rg-gallery">
          <div class="rg-thumbs">
            <div class="es-carousel-wrapper"><!-- start Elastislide -->
              <div class="es-carousel">
                <ul>             
<?php
require 'generateList.php';
?>                
                </ul>
              </div>
            </div><!-- end Elastislide -->
          </div><!-- rg-thumbs -->
        </div><!-- rg-gallery -->
      </div> <!-- /container -->

    <!-- Bootstrap core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>