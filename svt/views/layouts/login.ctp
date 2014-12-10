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
	<title><?php __('Panel Administrativo Sivetor: '); ?><?php echo $title_for_layout; ?></title>
	<?=$this->Html->meta('icon');?>
	<?=$this->Html->css('bootstrap');?>
	<?=$this->Html->css('custom');?>
	<?=$this->Html->css('animate+animo');?>
	<!-- Fonts -->	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
	<!-- Font-Awesome -->
	<?=$this->Html->css('font-awesome');?>
	<?php echo $javascript->link('jquery-1.10.2')."\n"; ?>
</head>
<body>
<!-- 100% Width & Height container  -->
	<div class="login-fullwidith">

		<div class="login-wrap">
			<?
				if($session->check('Message.flash')) {
					echo '<span class="message">'; 
					echo $session->flash();
					echo '</span>';
				}	
			?>	
		</div>
		<br/>
		<!-- Login Wrap  -->
		<div class="login-wrap">
			<?=$this->Html->image('logo.png',array("alt"=>"Sivetur", "title"=>"Sivetur"))?><br/>
			<div class="login-c1">
				<div class="cpadding50">
				<form method='post' action="">
					<input type="text" class="form-control logpadding" name='username' id='username' placeholder="Username" />
					<br/>
					<input type='password' name='password' id='password' class="form-control logpadding" placeholder="Password" />
					<input type='hidden' name='mode' value='auth_login'/>
				</div>
			</div>
			<div class="login-c2">
				<div class="logmargfix">
					<div class="chpadding50">
						<div class="alignbottom">
							<button class="btn-search4" onclick="errorMessage()" type="submit">Login</button>							
						</div>
						<div class="alignbottom2">
						  <div class="checkbox">
						  	<?
							   if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
							   {
							      $client_ip =
							         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
							            $_SERVER['REMOTE_ADDR']
							            :
							            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
							               $_ENV['REMOTE_ADDR']
							               :
							               "unknown" );
							   
							      # los proxys van añadiendo al final de esta cabecera
							      # las direcciones ip que van "ocultando". Para localizar la ip real
							      # del usuario se comienza a mirar por el principio hasta encontrar
							      # una dirección ip que no sea del rango privado. En caso de no
							      # encontrarse ninguna se toma como valor el REMOTE_ADDR
							   
							      $entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);
							   
							      reset($entries);
							      while (list(, $entry) = each($entries))
							      {
							         $entry = trim($entry);
							         if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
							         {
							            $private_ip = array(
							                  '/^0\./',
							                  '/^127\.0\.0\.1/',
							                  '/^192\.168\..*/',
							                  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
							                  '/^10\..*/');
							   
							            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
							   
							            if ($client_ip != $found_ip)
							            {
							               $client_ip = $found_ip;
							               break;
							            }
							         }
							      }
							   }
							   else
							   {
							      $client_ip =
							         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
							            $_SERVER['REMOTE_ADDR']
							            :
							            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
							               $_ENV['REMOTE_ADDR']
							               :
							               "unknown" );
							   }
							  echo '<span class="IPuser">IP: '.$client_ip.'</span>';
						
							?>
						  </div>
						</div>

					</div>
				</div>
			</div>
			<div class="login-c3">
				<div class="left"><a href="../" class="whitelink"><span></span>Website</a></div>
			</div>	
		</div>
		<!-- End of Login Wrap  -->
			

	</div>	
	<!-- End of Container  -->

	<?php 
	echo $javascript->link('initialize-loginpage')."\n"; 
	echo $javascript->link('jquery.easing')."\n";
	
	echo $javascript->link('animo')."\n";
	?>
	<script>
	function errorMessage(){
		$('.login-wrap').animo( { animation: 'tada' } );
	}
	</script>
	
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<?php echo $javascript->link('bootstrap.min')."\n"; ?>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>