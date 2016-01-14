<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Billy Bates | Portfolio</title>
		<link rel="stylesheet" href="../../httpdocs/css/basic.css" type="text/css" />
		<link rel="stylesheet" href="../../httpdocs/css/galleriffic-5.css" type="text/css" />
		<link rel="stylesheet" href="../../httpdocs/css/styles.css" type="text/css" />
		<link rel="stylesheet" href="../../httpdocs/css/black.css" type="text/css" />
		<link rel="stylesheet" href="../../css/general.css" type="text/css" />
		<script type="text/javascript" src="../../httpdocs/js/jquery-1.3.2.js"></script> 
		<script type="text/javascript" src="../../httpdocs/js/jquery.history.js"></script> 
		<script type="text/javascript" src="../../httpdocs/js/jquery.galleriffic.js"></script> 
		<script type="text/javascript" src="../../httpdocs/js/jquery.opacityrollover.js"></script>

		<!-- Only display thumbnails when javascript is disabled -->
		<script type="text/javascript">
			document.write('<style>.noscript { display: none; }<\/style>');
		</script> 
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17355854-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
		</script> 
	</head>
	<body>
			<div id="container">
<!--<h1><a href="index.html">Simon Turtle</a></h1>-->

					<a class="simonTurtle" href="http://www.simonturtle.com" target="_self">
						<span>Simon Turtle</span></a>
				<div class="nav">
<?php
				
// retrieve settings from session to display name of page that's being edited - loop through the session array with foreach
session_start();
foreach($_SESSION['settings'] as $key=>$value)
    {
    // and print out the values
    $key.' = '."'".$value."'".";".'<br />';
    }
$pagetype = $_SESSION['settings']['$pagetype']; 

// this will display the page that's being previewed
echo '<h3 class="preview">' .$pagetype.' preview </h3>';
?>

<!-- menu items -->
<ul class="menu">
					<li><a href="../dropzone/index.php">Add more photos </a></li>
					<li><a href="../addTitles.php">    Add/edit titles or delete photos </a></li>
					<li><a href="../jquery-drag-n-drop/index.php">    Reorder photos</a></li>
					<li><a href="../index.php">    Start over </a></li>
</ul>						
<!-- run pushLive.php to rename preview table to live table so it will be picked up by front end pages  -->
<div class="buildPageButton"><form action="pushLive.php" method="push">
<input type="submit" value="Build live page">
</div>
</form>

				</div>
				
				<div class="content">
					<div id="controls" class="controls">
					</div>
					<div class="slideshow-container">
						<div id="loading" class="loader">
						</div>
						<div id="slideshow" class="slideshow">
						</div>
					</div>
					<div id="caption" class="caption-container">
<!-- 
						<div class="photo-index"></div>
						 -->
					</div>
				</div>
<!-- End Gallery Html Containers -->
				<div style="clear: both;">
				</div>
<!-- Start Advanced Gallery Html Containers -->
				<div class="navigation-container">
					<div id="thumbs" class="navigation">
						<a class="pageLink prev" style="visibility: hidden;" href="#" title="Previous Page">
						</a>
						<ul class="thumbs noscript">
						
<?php
require 'generateList.php';
?>

						</ul>
						<a class="pageLink next" style="visibility: hidden;" href="#" title="Next Page">
						</a>
					</div>
				</div>
		</div>
<!--
		<div id="footer"></div>
		-->
	</body>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.20;
				$('#thumbs ul.thumbs li, div.navigation a.pageLink').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  0.90,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     3500,
					numThumbs:                 8,
					preloadAhead:              10,
					enableTopPager:            false,
					enableBottomPager:         false,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play',
					pauseLinkText:             'Pause',
					prevLinkText:              '',
					nextLinkText:              '',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             true,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 750,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);

						// Update the photo index display
						this.$captionContainer.find('div.photo-index')
							.html('Photo '+ (nextIndex+1) +' of '+ this.data.length);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						var prevPageLink = this.find('a.prev').css('visibility', 'hidden');
						var nextPageLink = this.find('a.next').css('visibility', 'hidden');
						
						// Show appropriate next / prev page links
						if (this.displayedPage > 0)
							prevPageLink.css('visibility', 'visible');

						var lastPage = this.getNumPages() - 1;
						if (this.displayedPage < lastPage)
							nextPageLink.css('visibility', 'visible');

						this.fadeTo('fast', 1.0);
					}
				});

				/**************** Event handlers for custom next / prev page links **********************/

				gallery.find('a.prev').click(function(e) {
					gallery.previousPage();
					e.preventDefault();
				});

				gallery.find('a.next').click(function(e) {
					gallery.nextPage();
					e.preventDefault();
				});

				/****************************************************************************************/

				/**** Functions to support integration of galleriffic with the jquery.history plugin ****/

				// PageLoad function
				// This function is called when:
				// 1. after calling $.historyInit();
				// 2. after calling $.historyLoad();
				// 3. after pushing "Go Back" button of a browser
				function pageload(hash) {
					// alert("pageload: " + hash);
					// hash doesn't contain the first # character.
					if(hash) {
						$.galleriffic.gotoImage(hash);
					} else {
						gallery.gotoIndex(0);
					}
				}

				// Initialize history plugin.
				// The callback is called at once by present location.hash. 
				$.historyInit(pageload, "advanced.html");

				// set onlick event for buttons using the jQuery 1.3 live method
				$("a[rel='history']").live('click', function(e) {
					if (e.button != 0) return true;

					var hash = this.href;
					hash = hash.replace(/^.*#/, '');

					// moves to a new page. 
					// pageload is called at once. 
					// hash don't contain "#", "?"
					$.historyLoad(hash);

					return false;
				});

				/****************************************************************************************/
			});
		</script> 
</html>
