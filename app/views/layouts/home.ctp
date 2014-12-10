<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo $this->Html->charset()."\n"; ?>
	<?php
		echo $this->Html->meta('icon')."\n";
		#Bootstrap
		echo $this->Html->css('bootstrap')."\n";
		echo $this->Html->css('custom')."\n";
		#Carousel
		echo $this->Html->css('carousel')."\n";
		
		echo $scripts_for_layout."\n";
	?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    	<?php echo $this->Html->script('html5shiv'); ?>
		<?php echo $this->Html->script('respond.min'); ?>
    <![endif]-->
	
    <!-- Fonts -->	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
	<!-- Font-Awesome -->
	<?php echo $this->Html->css('font-awesome')."\n"; ?>
    <!--[if lt IE 7]><?php echo $this->Html->css('font-awesome-ie7'); ?><![endif]-->
	
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <?php echo $this->Html->css('fullwidth')."\n"; ?>
    <?php echo $this->Html->css('settings2')."\n"; ?>

    <!-- Picker UI-->	
    <?php echo $this->Html->css('jquery-ui')."\n"; ?>
	
    <!-- jQuery -->	
    <?php echo $this->Html->script('jquery.v2.0.3')."\n"; ?>
    <? $parametros = $this->requestAction('App/getParams'); ?>
 </head>
  <body id="top">
	<!-- Top wrapper -->	
	<div class="navbar-wrapper2 navbar-fixed-top">
      <div class="container">
		<div class="navbar mtnav">
			<div class="container offset-3">
			  <?php echo $this->element("home/nav-bar"); ?> 			  
			</div><!-- container offset-3 -->
        </div><!-- navbar mtnav -->
      </div><!-- container -->
    </div><!-- navbar-wrapper2 navbar-fixed-top -->
	<!-- / Top wrapper -->		
	<!-- Blue background -->
	<div class="mtslide2 sliderbg2"></div>
	<!-- / Blue background -->
	
    <!-- WRAP -->
	<div class="wrap ctup" >
						
		<div class="slideup">
			<div class="container z-index100">		
				<div class="slidercontainer">
					<div class="row">
						<?php echo $this->element("home/search_box"); ?>			
						<div class="col-md-8 scolright">
							<?php echo $this->element("home/home_slider"); ?>
						</div><!-- col-md-8 scolright -->			
					</div><!-- end of row -->
				</div><!-- slidercontainer -->
			</div><!-- container z-index100 -->
		</div><!-- slideup -->
		
		<div class="deals4">
			<div class="container">	
				<div class="row">
					<?php echo $this->element("home/last_minute", array('parametros' => $parametros) ); ?>
					<!-- End of first row-->
					
					<?php echo $this->element("home/early_booking", array('parametros' => $parametros) ); ?>
					<!-- End of first row-->
					
					<?php echo $this->element("home/hot_deals", array('parametros' => $parametros) ); ?>
					<!-- End of first row-->			
				</div><!-- row -->
			</div><!-- container -->
		</div><!-- deals4 -->
		
		<div class="lastminute4"></div>	
		
		<div class="container">	
			<?php echo $this->element("home/top_deals", array('parametros' => $parametros) ); ?>
			<hr class="featurette-divider2">
			<?php echo $this->element("home/feature_offerts", array('parametros' => $parametros) ); ?>
		</div><!-- container cstyle06 -->
		
		<!-- FOOTER -->
		<?php echo $this->element("home/footer", array('parametros' => $parametros) ); ?>		
	</div><!-- wrap ctup -->
	<!-- WRAP -->
	
	<div id="privacy" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	    	<div class="modal-header">
		    	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Politica de Privacidad</h4>
		     </div>
		     <div class="modal-body">
				 <p><?= $parametros['Params']['privacy']; ?></p>
		     </div>
		     <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		      </div>
	    </div>
	  </div>
	</div>
	
    <!-- Javascript -->
	
    <!-- This page JS -->
    <?php echo $this->Html->script('js-index7')."\n"; ?>
	
	<!-- Modals -->
    <?php echo $this->Html->script('js-modal')."\n"; ?>
	
    <!-- Custom functions -->
    <?php echo $this->Html->script('functions')."\n"; ?>
	
    <!-- Picker UI-->	
    <?php echo $this->Html->script('jquery-ui')."\n"; ?>
	
	<!-- Easing -->
	<?php echo $this->Html->script('jquery.easing')."\n"; ?>
	
    <!-- jQuery KenBurn Slider  -->
    <?php echo $this->Html->script('jquery.themepunch.revolution.min')."\n"; ?>
	
   <!-- Nicescroll  -->	
   <?php echo $this->Html->script('jquery.nicescroll.min')."\n"; ?>
	
    <!-- CarouFredSel -->
    <?php echo $this->Html->script('helper-plugins/jquery.carouFredSel-6.2.1-packed')."\n"; ?>
    <?php echo $this->Html->script('helper-plugins/jquery.touchSwipe.min')."\n"; ?>
    <?php echo $this->Html->script('helper-plugins/jquery.mousewheel.min')."\n"; ?>
    <?php echo $this->Html->script('helper-plugins/jquery.transit.min')."\n"; ?>
    <?php echo $this->Html->script('helper-plugins/jquery.ba-throttle-debounce.min')."\n"; ?>
	
    <!-- Custom Select -->
    <?php echo $this->Html->script('jquery.customSelect')."\n"; ?>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this->Html->script('bootstrap.min')."\n"; ?>
    <?php echo $this->element('sql_dump'); ?>
    
  	<?php echo $this->Session->flash(); ?>
  	<?php echo $content_for_layout; ?>
  </body>
</html>