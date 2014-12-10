<?php
/* SVN FILE: $Id: default.ctp 7118 2008-06-04 20:49:29Z gwoo $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.libs.view.templates.layouts
 * @since			CakePHP(tm) v 0.10.0.1076
 * @version			$Revision: 7118 $
 * @modifiedby		$LastChangedBy: gwoo $
 * @lastmodified	$Date: 2008-06-04 13:49:29 -0700 (Wed, 04 Jun 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('TVSur :'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
	   echo $html->meta('icon');
           echo $html->css('cake.generic');
	   echo $html->css('admin.generic');
	   echo $html->css('jquery.lightbox-0.5');
	   echo $javascript->link('protoculous-effects')."\n";
	   echo $javascript->link('jquery')."\n";
	   echo $javascript->link('jquery.lightbox-0.5')."\n";
	   
	   echo $scripts_for_layout;
	 ?>
	<script type="text/javascript" charset="utf-8">
	jQuery.noConflict();
	(function($) { 
	  $(function() {
	 	jQuery(document).ready(function($) {
		  $('a[rel*=lightbox]').lightBox()
		});

	  });
	})(jQuery);

	 </script> 
</head>
<body>
<? $sess= $Session->read('AdminExploring'); ?>
	<div id="container">
		<div id="header">
			<h1><?php //echo $html->link(__('CakePHP: the rapid development php framework', true), 'http://cakephp.org'); ?></h1>
                        <h1><?=$html->image('encabezado.jpg',array("alt"=>"", "title"=>""))?>
		 </h1>
		<h2 style="width:60%;float:left;">Administrador de Contenido </h2>
		<h3 style="width:30%;float:right;">Usuario: <?=$sess['Usuario']['Nom_usuario']?>
		&nbsp;&nbsp;&nbsp;&nbsp;<?=$html->link('Salir',"/usuarios/logout")?>
		</h3>
		</div>
                <div id="navcontainer">
			<ul id="nav">
			       <li><?=$html->link('Inicio',"/index.php")?></li>
			       
			       <li><?=$html->link('Secciones',"#")?>
				      <ul>
					  <li><?=$html->link('Secciones',"/sections")?></li>
					 <!-- <li><? //$html->link('Imagenes internas Top',"/secphotos/")?></li>
					  <li><? //$html->link('Imagenes index Top',"/intphotos/")?></li>-->
					  <li><?=$html->link('parametros',"/params/")?></li>
                           </ul>
				</li>
			       <li><?=$html->link('Empresa',"/empresas")?></li>
			       <li><?=$html->link('Noticias',"#")?>
					  <ul>
					  	  <li><?=$html->link('Listado topicos',"/topics/")?></li>
						  <li><?=$html->link('Listado de noticias',"/noticias/")?></li>
					  </ul>
				</li>
			       
			       <li><?=$html->link('Galeria de Fotos',"#")?>
					<ul>
						<li><?=$html->link('Lista de categorias',"/categories/")?></li>
                        <li><?=$html->link('Lista de álbumes',"/albums/")?></li>
					</ul>
				</li>
		        <li><?=$html->link('Banners',"/banners/")?></li>   
				<li><?=$html->link('Encuestas',"/encuestas/")?></li>   
				
				<li><?=$html->link('Patrocinadores',"/patrocinadores/")?></li>
				
				<li><?=$html->link('Programacion',"/programations/")?></li>
				
				<li><?=$html->link('Testimonios',"#")?>
					<ul>
						<li><?=$html->link('Lista de comentarios',"/comments/")?></li>
                        <li><?=$html->link('Lista de palabras prohibidas',"/palabrasreservadas/")?></li>
					</ul>
				</li>
				
				<li><?=$html->link('Links',"/links/")?></li>   
				
				
				 <? echo ($sess['Usuario']['perfil']==0) ? '<li>'.$html->link('Admin',"#") : ''; ?>
				 <? echo ($sess['Usuario']['perfil']==0) ? '<ul><li>'.$html->link('Usuarios',"/usuarios").'</li></ul></li>':'';?>		
		 		<li><?=$html->link(' | Salir',"/usuarios/logout")?></li>				  
			</ul>
                </div>
                <div id="content">
			<?php
			
				if ($session->check('Message.flash')):
						$session->flash();
				endif;
			?>
                    <?php echo $content_for_layout; ?>
                 </div>
               <div id="footer">
			<?php echo $html->link(
							$html->image('cake.power.gif', array('alt'=> __("CakePHP: the rapid development php framework", true), 'border'=>"0")),
							'http://www.cakephp.org/',
							array('target'=>'_new'), null, false
						);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
