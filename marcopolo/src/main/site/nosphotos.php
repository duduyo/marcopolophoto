<!DOCTYPE html>
<html lang="en">
<head>
<title>Respond | Portfolio</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/my-bootstrap.css" rel="stylesheet">
<!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->
<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="mp-navbar">
	</div>
<div class="container">
  <hr>
  
<?php

$dir    = './img/galerie';
$files2 = scandir($dir, 1);
$colonne=1;

foreach ($files2 as &$value) {
?>


<?php
$colonne++;
}
?>
  
  <div class="row">
    <div class="span4">
      <h3>Deep Sky <small> By <a href="#">Srawat56</a></small></h3>
      <a rel="lightbox" href="img/thumb1.jpg"><img src="img/thumb1.jpg" alt=""></a> </div>
    <div class="span4">
      <h3> Nature's Valley<small> By <a href="#">Paul venter</a></small> </h3>
      <a rel="lightbox" href="img/thumb2.jpg"><img src="img/thumb2.jpg" alt=""></a></div>
    <div class="span4">
      <h3>Deep Sky <small> By <a href="#">Srawat56</a></small></h3>
      <a rel="lightbox" href="img/thumb1.jpg"><img src="img/thumb1.jpg" alt=""></a> </div>
  </div>
  <div class="row">
    <div class="span4">
      <h3>Deep Sky <small> By <a href="#">Srawat56</a></small></h3>
      <a rel="lightbox" href="img/thumb1.jpg"><img src="img/thumb1.jpg" alt=""></a> </div>
    <div class="span4">
      <h3> Nature's Valley<small> By <a href="#">Paul venter</a></small> </h3>
      <a rel="lightbox" href="img/thumb2.jpg"><img src="img/thumb2.jpg" alt=""></a></div>
    <div class="span4">
      <h3>Deep Sky <small> By <a href="#">Srawat56</a></small></h3>
      <a rel="lightbox" href="img/thumb1.jpg"><img src="img/thumb1.jpg" alt=""></a> </div>
  </div>
  <div class="row">
    <div class="span4">
      <h3>Deep Sky <small> By <a href="#">Srawat56</a></small></h3>
      <a rel="lightbox" href="img/thumb1.jpg"><img src="img/thumb1.jpg" alt=""></a> </div>
    <div class="span4">
      <h3> Nature's Valley<small> By <a href="#">Paul venter</a></small> </h3>
      <a rel="lightbox" href="img/thumb2.jpg"><img src="img/thumb2.jpg" alt=""></a></div>
    <div class="span4">
      <h3>Deep Sky <small> By <a href="#">Srawat56</a></small></h3>
      <a rel="lightbox" href="img/thumb1.jpg"><img src="img/thumb1.jpg" alt=""></a> </div>
  </div>
  <hr>

  
  <footer class="row">
    <p> &copy;2012 Your Company.<br>
      Design by <a href="http://www.awfulmedia.com">AwfulMedia.com</a> </p>
  </footer>
</div>
<!-- /container -->
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/bootstrap-transition.js"></script>
<script src="js/bootstrap-carousel.js"></script>
<script src="js/bootstrap-alert.js"></script>
<script src="js/bootstrap-modal.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/bootstrap-scrollspy.js"></script>
<script src="js/bootstrap-tab.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-popover.js"></script>
<script src="js/bootstrap-button.js"></script>
<script src="js/bootstrap-collapse.js"></script>
<script src="js/bootstrap-typeahead.js"></script>
<script src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/jquery.smooth-scroll.min.js"></script>
<script src="js/lightbox.js"></script>
<script type="text/javascript">
$(function(){
    $("#mp-navbar").load("mp-navbar.html", function() {
    	document.getElementById("nosphotos").className="active"; 
    }); 
  });

</script>
</body>
</html>
