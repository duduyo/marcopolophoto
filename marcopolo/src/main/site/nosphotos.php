<?php
  // Fichier de conf
  include (str_replace('\\','/',getcwd()).'/class/config.php');
  include (str_replace('\\','/',getcwd()).'/class/functions.php');
?>


<!DOCTYPE html>
<html lang="fr">
<head>
<title>Respond | Portfolio</title>
<meta charset="iso-8859-1">
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
<div class="row"> 
<?php


$listeAlbums=getListeAlbum('./img/galerie');
$colCount=1;

foreach ($listeAlbums as $album) {
	if ($colCount == 4) {
		$colCount=1;
?>
   </div>
  <div class="row"> 
<?php
	}
	$cheminFichierPhoto = 'img/galerie/'.$album[0].'/'.$album[1];
	// lecture dans l'imager
//	$imgSize = getimagesize($cheminFichierPhoto);
//	$orientationPortrait = ($imgSize[1] > $imgSize[0]);
//	if ($orientationPortrait) {
//		echo ('<div class="span2">');	
//	} else {
//		echo ('<div class="span4">');
//	}
?>
      <div class="span4">
      <h3> <?php echo ($album[0]); ?></h3> 
      <div class="monConteneurImg">
      <a rel="lightbox" href="<?php echo ($cheminFichierPhoto); ?>"><img src="<?php echo ($cheminFichierPhoto); ?>" alt=""></a>
    </div>
    </div>
	<?php
	$colCount++;
}		
?>

</div>

</div>  
<hr>
		<footer class="row">
			<p>
				&copy;2014 Marcopolophoto
			</p>
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
