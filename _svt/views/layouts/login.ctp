<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Entrar Panel Control : Sivetur</title>
<link rel="icon" href="<?=$this->webroot . 'favicon.ico'?>" type="image/x-icon" />
<link rel="shortcut icon" href="<?=$this->webroot . 'favicon.ico';?>" type="image/x-icon" />
<?=$html->css('login');?>
</head>
<body>
<div id="content">
	<?=$html->image('logo.jpg',array("alt"=>"Sivetur", "title"=>"Sivetur"))?>

	<form method='post' action="">
	<fieldset class="fieldsetlog">
	<legend>Panel de Acceso Administrativo</legend>
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
		  echo '<p class="txtEnca">IP: '.$client_ip.'</p>';
	
	?>
	<input type='hidden' name='mode' value='auth_login'/>
	<div class="trform">
			<div class="tdlabels"><label for="username">Usuario:</label></div>
			<div class="tdimputs">
				<input type='text' name='username' id='username'/>
			</div>
	</div>
	<div class="trform">
			<div class="tdlabels"><label for="password">Contrase&ntilde;a:</label></div>
			<div class="tdimputs">
				<input type='password' name='password' id='password'/>
			</div>
	</div>
	<div class="trform">
	   <?php echo $form->submit('Login', array('class' => 'boton1'));?>
	</div>
	<?
		if($session->check('Message.flash'))
		{
			echo '<span class="msj">'; 
			$session->flash();
			echo '</span>';
		}	
	?>
	</fieldset>
	</form>
</div>

	<div id="footer">
		Programaci&oacute;n y dise&ntilde;o <a href="http://www.aradiquez.com"><?=$html->image('aradiquez.jpg',array("alt"=>"Aradiquez", "title"=>"Aradiquez"))?></a>&nbsp; - <?=$html->image('cake.power.gif',array("alt"=>"", "title"=>""))?>
	</div>
</body>
</html>