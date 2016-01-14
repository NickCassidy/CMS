<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Billy Bates - Portfolio</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




<!--start css for gallery -->

<link rel="stylesheet" href="../css/grid.css" >
    <link rel="stylesheet" href="../css/demo.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/elastislide.css" />
    <link rel="stylesheet" href="../css/navbar-fixed-top.css">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<!--end css for gallery -->




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
        {{if itemsCount > 1}}
        <div class="rg-image-nav">
            <a href="#" class="rg-image-nav-prev">Previous Image</a>
            <a href="#" class="rg-image-nav-next">Next Image</a>
          </div>
        {{/if}}
        <div class="rg-image"></div>
        <div class="rg-loading"></div>
        <div class="rg-caption-wrapper">
          <div class="rg-caption" style="display:none;">
            <p></p>
          </div>
        </div>
      </div>
    </script>

  </head>

  <body onload="stopCount()">
    <div class="containerHeader">
<a href="../" target="_self"><h1 class="title">Simon Turtle</h1></a>   
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
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Portfolio</a></li>
              <li><a href="../portrait/">Portraits</a></li>
              <li><a href="../archive/">Archive</a></li>
              <li><a href="../poster/">Posters</a></li>
              <li><a href="../ella/">Ella</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../contact/">Contact</a></li>
              </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>
</div>

<div class="row">
	        	              		
        <div class="col-md-6">





      <div class="jumbotron">
  <div id="slideshowControls">
    <div class="text"><a href="javascript:doTimer();">Play</a></div>
    <div class="text" style="display:none"><a href="javascript:stopCount();">Pause</a></div>
  </div>

    <div class="container">

        <div class="clr"></div>
   
      
      <div class="content">
        <div id="rg-gallery" class="rg-gallery">
          <div class="rg-thumbs">
            <!-- Elastislide Carousel Thumbnail Viewer -->
            <div class="es-carousel-wrapper">
              <div class="es-carousel" style="margin: auto;">
                <ul>
                  
<?php
require 'generateList.php';
?>                
                </ul>
              </div>
            </div>
            <!-- End Elastislide Carousel Thumbnail Viewer -->
          </div><!-- rg-thumbs -->
        </div><!-- rg-gallery -->
      </div><!-- content -->
      </div><!-- jumbotron -->

    </div> <!-- /container -->


</div>
</div>





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
