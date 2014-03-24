<?php
// Fichier de conf
include (str_replace ( '\\', '/', getcwd () ) . '/class/config.php');
include (str_replace ( '\\', '/', getcwd () ) . '/class/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>marcopolophoto</title>
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsivee.css" rel="stylesheet">
<link href="css/my-bootstrap.css" rel="stylesheet">
<!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->
<link href='http://fonts.googleapis.com/css?family=Lato:300'
	rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="mp-navbar"></div>
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
					que vous cherchez sur la base d’un prix photothèque, avec nos
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
	$cheminFichierPhoto = 'img/galerie/' . $album [0] . '/' . $album [1];
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
			<!--		<hr>
	
		<div class="row">
			<div class="span4">
				<h3>Familles</h3>
				<a rel="lightbox" href="img/galerie/2.jpg"><img
					src="img/galerie/2.jpg" alt=""></a>
			</div>
			<div class="span4">
				<h3>Enfants</h3>
				<a rel="lightbox" href="img/galerie/1.jpg"><img
					src="img/galerie/1.jpg" alt=""></a>
			</div>
			<div class="span4">
				<h3>Paysages</h3>
				<a rel="lightbox" href="img/galerie/3.jpg"><img
					src="img/galerie/3.jpg" alt=""></a>
			</div>
		</div>
		-->

			<div class="row">
				<div class="span5">
					<h3>
						>>> Plus de photos dans notre <a href="nosphotos.php">gallerie</a>
					</h3>
				</div>
			</div>
			<hr>
			<footer class="row">
				<p>&copy;2014 Marcopolophoto</p>
			</footer>
		</div>
		<!-- /container -->
	<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-transition.js" type="text/javascript"></script>
	<script src="js/bootstrap-carousel.js" type="text/javascript"></script>
	<script src="js/bootstrap-alert.js" type="text/javascript"></script>
	<script src="js/bootstrap-modal.js" type="text/javascript"></script>
	<script src="js/bootstrap-dropdown.js" type="text/javascript"></script>
	<script src="js/bootstrap-scrollspy.js" type="text/javascript"></script>
	<script src="js/bootstrap-tab.js" type="text/javascript"></script>
	<script src="js/bootstrap-tooltip.js" type="text/javascript"></script>
	<script src="js/bootstrap-popover.js" type="text/javascript"></script>
	<script src="js/bootstrap-button.js" type="text/javascript"></script>
	<script src="js/bootstrap-collapse.js" type="text/javascript"></script>
	<script src="js/bootstrap-typeahead.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
	<script src="js/jquery.smooth-scroll.min.js" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>
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
