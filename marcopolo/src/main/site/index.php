<?php
// Fichier de conf
include (str_replace ( '\\', '/', getcwd () ) . '/class/config.php');
include (str_replace ( '\\', '/', getcwd () ) . '/class/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>marcopolophoto</title>
<meta charset="ISO-8859-1">
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

		<div class="row">
			<div class="span6">
				<span class="color-highlight"><img src="img/marcopolo-logo.png"
					alt=""></span>

				<h3>l'agence photographique</h3>
				<blockquote>
					Marcopolo est une Agence d'Illustration Générale et de Reportage.<br>
					Vous recherchez-une photo ?<br> Explorez notre fond. Vous souhaitez
					une photo inédite ou introuvable ?<br> Réalisons ensemble la photo
					que vous cherchez sur la base d'un prix photothÃ¨que, avec nos
					maquilleuses, nos stylistes, nos modèles, nos studios...
					Contactez-nous. <br> restaurez vos photos !

				</blockquote>
			</div>

			<div class="span6">
				<!--Start Carousel-->
				<div id="myCarousel" class="carousel slide">
					<div class="carousel-inner">
<?php
$listeAlbums = getListeAlbum ( './img/galerie' );
$first = true;
foreach ( $listeAlbums as $album ) {
	$cheminFichierPhoto = 'img/galerie/' . rawurlencode($album [0]) . '/' . $album [1];
	if (isPaysage ( $cheminFichierPhoto )) {
		?>		
						<div class="item <?php echo ($first ? 'active' : ''); ?>">
							<img src="<?php echo ($cheminFichierPhoto); ?>" alt="">
						</div>	
						<?php
		$first = false;
	}
}
?>
				</div>
					<a class="left carousel-control" href="#myCarousel"
						data-slide="prev"><img src="img/arrow.png" alt=""></a> <a
						class="right carousel-control" href="#myCarousel"
						data-slide="next"><img src="img/arrow2.png" alt=""></a>

					<!--End Carousel-->
				</div>
			</div>
	</div>			
	

  <hr>
  <footer class="row">
    <p> &copy;2014 Marcopolophoto
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
$('.carousel').carousel({
	  interval: 3000
	});
$(function(){
    $("#mp-navbar").load("mp-navbar.html", function() {
    	document.getElementById("index").className="active"; 
    }); 
  });

</script>

</body>
</html>