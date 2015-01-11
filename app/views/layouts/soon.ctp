<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Sivetur, tu mayorista en viajes</title>
	<!-- CSS -->
	<?php
		echo $this->Html->css('soon/reset')."\n";
    echo $this->Html->css('soon/fonts/stylesheet')."\n";
    echo $this->Html->css('soon/style')."\n";
  ?>
	<!--[if lt IE 9]>
    <?= $this->Html->css('soon/ie')."\n"; ?>
	<![endif]-->

	<!-- IE fix for HTML5 tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- jQuery and Modernizr-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<?php echo $this->Html->script('soon/modernizr.custom')."\n"; ?>
  <?php echo $this->Html->script('soon/jquery.countdown')."\n"; ?>
  <?php echo $this->Html->script('soon/script')."\n"; ?>

</head>

<body>

	<header>
		<h1>Estamos trabajando duro para tener nuestro sitio de nuevo online</h1>
		<p>Nuestro desarrollador, Esteban, esta haciendo todo lo que puede para terminar el sitio antes de que el contador termine, pero lo malo es que nosotros no podemos ayudarlo :(</p>
	</header>

	<div id="main">
		
		<div id="counter"></div>

		<div class="social-media-arrow"></div>

		<footer>
			<ul>
				<li><a class="facebook" href="https://es-es.facebook.com/sivetur.mayoristaviajes" target='_blank'></a></li>
			</ul>
		</footer>
	</div>

</body>

</html>
