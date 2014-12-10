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
	<?php echo $this->Html->charset(); ?>
	<title><?php __('Sivetour: '); ?><?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta('icon');
		#Bootstrap
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('custom');
		#Carousel
		echo $this->Html->css('carousel');
		
		echo $scripts_for_layout;
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
	<?php echo $this->Html->css('font-awesome'); ?>
    <!--[if lt IE 7]><?php echo $this->Html->css('font-awesome-ie7'); ?><![endif]-->
	
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <?php echo $this->Html->css('fullwidth'); ?>
    <?php echo $this->Html->css('settings2'); ?>
    <?php echo $this->Html->css('settings'); ?>
    
    <!-- jslider -->
    <?php echo $this->Html->css('plugin.jslider'); ?>
    <!-- Picker UI-->	
    <?php echo $this->Html->css('jquery-ui'); ?>
	
    <!-- jQuery -->	
    <?php echo $this->Html->script('jquery.v2.0.3'); ?>
    <? $parametros = $this->requestAction('App/getParams'); ?>
 </head>
  <body id="top" class="thebg">
	<!-- Top wrapper -->	
	<div class="navbar-wrapper2 navbar-fixed-top">
      <div class="container">
		<div class="navbar mtnav">
			<div class="container offset-3">
			  <?php echo $this->element("default/nav-bar"); ?> 			  
			</div><!-- container offset-3 -->
        </div><!-- navbar mtnav -->
      </div><!-- container -->
    </div><!-- navbar-wrapper2 navbar-fixed-top -->
	<!-- / Top wrapper -->		
  
  <?= $this->element("default/breadcrum"); ?>

	<!-- CONTENT -->
	<div class="container">
		<?php echo $this->Session->flash(); ?>
		<?php echo $content_for_layout; ?>
	</div>
	<!-- END OF CONTENT -->
	
    <!-- FOOTER -->
    <?php echo $this->element("default/footer", array('parametros' => $parametros) ); ?>		
    
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
	  
  	<!-- Javascript  -->
  	<?php echo $this->Html->script('js-blog'); ?>
    
    <!-- Nicescroll  -->	
    <?php echo $this->Html->script('jquery.nicescroll.min'); ?>
	
     <!-- Custom functions -->
     <?php echo $this->Html->script('functions'); ?>
	
    <!-- lightbox -->
    <?php echo $this->Html->script('lightbox'); ?>
	
    <!-- Custom Select -->
    <?php echo $this->Html->script('jquery.customSelect'); ?>
	
  	<!-- Load Animo -->
  	<?php echo $this->Html->script('animo'); ?>

    <!-- CarouFredSel -->
    <?php echo $this->Html->script('helper-plugins/jquery.carouFredSel-6.2.1-packed'); ?>
    <?php echo $this->Html->script('helper-plugins/jquery.touchSwipe.min'); ?>
    <?php echo $this->Html->script('helper-plugins/jquery.mousewheel.min'); ?>
    <?php echo $this->Html->script('helper-plugins/jquery.transit.min'); ?>
    <?php echo $this->Html->script('helper-plugins/jquery.ba-throttle-debounce.min'); ?>
    <!-- Picker UI-->	
    <?php echo $this->Html->script('jquery-ui'); ?>
    
  	<!-- bin/jquery.slider.min.js -->
    <?php echo $this->Html->script('helper-plugins/jslider/jquery.jslider'); ?>
    
	  <!-- Easing -->
	  <?php echo $this->Html->script('jquery.easing'); ?>
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this->Html->script('bootstrap.min'); ?>
  
    <?php echo $this->element('sql_dump'); ?>
  </body>
</html>