<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="The portfolio site of Simon Turtle, a London based portrait photographer available for commissions">
    <meta name="google-site-verification" content="CVO3OoBf1sd2jSZeXbA_espA3pdhpq3kCRhnlxMz8sw" />
    <title>Billy Bates</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">

    <!-- general start css -->

    <link rel="stylesheet" href="css/grid.css" >
    <link rel="stylesheet" href="css/demo.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar-fixed-top.css">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <!--end general css -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  
  </head>
  <body>
      <h1>Billy Bates</h1>   
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
              <li><a href="portfolio/">Portfolio</a></li>
              <li><a href="portrait/">Portraits</a></li>
              <li><a href="archive/">Archive</a></li>
              <li><a href="poster/">Posters</a></li>
              <li><a href="ella/">Ella</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="contact/">Contact</a></li>
              </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

    <div class="homepageGalleryContainer">
	     <div class="homepageGallery">
<?php
require 'admin/homepageImages/randomPhotoGenerator.php';
?>
       </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
