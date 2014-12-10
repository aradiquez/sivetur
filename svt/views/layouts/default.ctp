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
	   echo $this->Html->meta('icon')."\n";
       echo $this->Html->css('bootstrap')."\n";
	   echo $this->Html->css('custom')."\n";
	   echo $this->Html->css('dashboard')."\n";
	   echo $this->Html->css('font-awesome')."\n";
	   echo $this->Html->css('jquery-ui')."\n";
	   echo $scripts_for_layout;
	 ?>
	 <?php echo $javascript->link('jquery-1.10.2')."\n"; ?>
	 <link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>
 </head>
 <? $sess = $this->Session->read('Sivetur'); ?>
 <body id="top">
    
	
	
	<!-- CONTENT -->
	<div class="container2">

		
		<div class="container2 offset-0">
			
			
			<!-- CONTENT -->
			<div class="col-md-12  offset-0">
				

				
				<!-- LEFT MENU -->
				<div class="dashboard-left offset-0 textcenter">
					
					<br/><br/>
					<a href="/"><?=$this->Html->image('logo.png',array("alt"=>"Sivetur", "title"=>"Sivetur"))?></a><br/>
					<span class="size12 grey lh5">Welcome to the Admin Panel</span><br/>
					<span class="size12 dark"><?=$sess['Usuario']['Nom_usuario']?></span><br/>
					<?=$this->Html->link($this->Html->image("dash/logout.png",  array('alt'=>'logout')),"/usuarios/logout",array('escape' => false))?><br/>
					<br/><br/>
					
					<!-- Nav tabs -->
					<ul class="nav dashboard-tabs">
			
					  <li>
					  <?php echo $this->Html->link(
					  		$this->Html->tag("div", 
					  			$this->Html->tag("span",'', array('class' => 'dashboard-icon left'))
					  			.$this->Html->tag("span",'Dashboard', array('class' => 'dtxt'))						  				
					  			, array('class' => "dash-ct"))
					  	,"/",array('escape' => false) ); ?>
					  </li>			

						<li>
						  <?php echo $this->Html->link(
						  		$this->Html->tag("div", 
						  			$this->Html->tag("span",'', array('class' => 'forums-icon left'))
						  			.$this->Html->tag("span",'Secciones', array('class' => 'dtxt'))						  				
						  			, array('class' => "dash-ct"))
						  	,"/sections/",array('escape' => false) ); ?>
						  </li>	

						<li>
						  <?php echo $this->Html->link(
						  		$this->Html->tag("div", 
						  			$this->Html->tag("span",'', array('class' => 'posts-icon left'))
						  			.$this->Html->tag("span",'Ofertas', array('class' => 'dtxt'))						  				
						  			, array('class' => "dash-ct"))
						  	,"/ofertas/",array('escape' => false) ); ?>
						 </li>
						<li>
							<?php echo $this->Html->link(
						  		$this->Html->tag("div", 
						  			$this->Html->tag("span",'', array('class' => 'topics-icon left'))
						  			.$this->Html->tag("span",'Programas y Circuitos', array('class' => 'dtxt'))						  				
						  			, array('class' => "dash-ct"))
						  	,"/programas_circuitos/",array('escape' => false) ); ?>
						  </li>
						<li>
							<?php echo $this->Html->link(
						  		$this->Html->tag("div", 
						  			$this->Html->tag("span",'', array('class' => 'pages-icon left'))
						  			.$this->Html->tag("span",'Tags', array('class' => 'dtxt'))						  				
						  			, array('class' => "dash-ct"))
						  	,"/tags/",array('escape' => false) ); ?>
						  </li>
  						<li>
  							<?php echo $this->Html->link(
  						  		$this->Html->tag("div", 
  						  			$this->Html->tag("span",'', array('class' => 'appearance-icon left'))
  						  			.$this->Html->tag("span",'Colaboradores', array('class' => 'dtxt'))						  				
  						  			, array('class' => "dash-ct"))
  						  	,"/colaboradores/",array('escape' => false) ); ?>
  						  </li>
						  <? if ($sess['Usuario']['perfil']==0) { ?>
							  <li>
							  <?php echo $this->Html->link(
						  		$this->Html->tag("div", 
						  			$this->Html->tag("span",'', array('class' => 'profile-icon left'))
						  			.$this->Html->tag("span",'Usuarios', array('class' => 'dtxt'))						  				
						  			, array('class' => "dash-ct"))
						  	,"/usuarios/",array('escape' => false) ); ?>
							  </li>	
                
    						<li>
    							<?php echo $this->Html->link(
  						  		$this->Html->tag("div", 
  						  			$this->Html->tag("span",'', array('class' => 'settings-icon left'))
  						  			.$this->Html->tag("span",'Parametros', array('class' => 'dtxt'))						  				
  						  			, array('class' => "dash-ct"))
  						  	,"/params/",array('escape' => false) ); ?>
  						  </li>
						  <?php } ?>
						  <!-- 
						<li class="margbottom20">
						  <a href="#comments" data-toggle="tab">
						  <div class="dash-ct">
							  <span class="comments-icon left"></span>	
							  <span class="dtxt">Comments</span>
						  </div>
						  </a></li>
						<li>
						  <a href="#forums" data-toggle="tab">
						  <div class="dash-ct">
							  <span class="forums-icon left"></span>	
							  <span class="dtxt">Forums</span>
						  </div>
						  </a></li>					
						<li>
						  <a href="#topics" data-toggle="tab">
						  <div class="dash-ct">
							  <span class="topics-icon left"></span>	
							  <span class="dtxt">Topics</span>
						  </div>
						  </a></li>
						<li class="margbottom20">
						  <a href="#replies" data-toggle="tab">
						  <div class="dash-ct">
							  <span class="replies-icon left"></span>	
							  <span class="dtxt">Replies</span>
						  </div>
						  </a></li>
						<li>
						  <a href="#appearance" data-toggle="tab">
						  <div class="dash-ct">
							  <span class="appearance-icon left"></span>	
							  <span class="dtxt">Appearance</span>
						  </div>
						  </a></li>			
						<li>
						  <a href="#plugins" data-toggle="tab">
						  <div class="dash-ct">
							  <span class="wishlist-icon left"></span>
							  <span class="dtxt">Plugins <span class="badge indent0">3</span></span>
						  </div>
						  </a></li>		
						<li>
						  <a href="#users" data-toggle="tab">
						  <div class="dash-ct">
							  <span class="profile-icon left"></span>									  
							  <span class="dtxt">Users</span>
						  </div>
						  </a></li>		
						<li>
						  <a href="#tools" data-toggle="tab">
						  <div class="dash-ct">
	  						  <span class="tools-icon left"></span>	
							  <span class="dtxt">Tools</span>
						  </div>
						  </a></li>	
						<li>
						  <a href="#settings" data-toggle="tab">
						  <div class="dash-ct">
							 <span class="settings-icon left"></span>									  
							  <span class="dtxt">Settings</span>
						  </div>
						  </a></li>		-->
						  
					</ul>
					<br/>
					<span class="dtxt">
						<span class="size12 grey">
							Copyright &copy; <?php echo date("Y") ?>.<br/>
							Aradiquez.com
							</span>
						<br/>
						<br/>
						<br/>
					</span>
					<div class="clearfix"></div>
				</div>
				<!-- LEFT MENU -->
					
				<!-- RIGHT CPNTENT -->
				<div class="dashboard-right  offset-0">
					<!-- Tab panes from left menu -->
					<div class="tab-content5">
					
					  <!-- TAB 1 -->
					  <div class="tab-pane cpadding40 active" id="profile">
					  	
						<span class="lato size12 grey"><?php echo (date("a") == 'am' ? 'Buenos Dias' : ((date("a") == 'pm' && date("g") < 4) ? 'Buenas Tardes' : 'Buenas Noches')); ?> <a href="#" class="orange"><?=$sess['Usuario']['Nom_usuario']?></a></span>
						<ul class="d-status">
							
							<li><a href="#" id="messages" data-content='
                <?
                 $cont = 0;
                 foreach($OfertasInactivas as $row){ ?>
    							<div class="msgbox<?=$cont % 2 ? "2": ''?> offset-0">
    								<span class="opensans size13 dark"><?=$this->Html->link($this->Text->truncate($row['Oferta']['name'],38,array('ending' => '...','exact' => false)),'/ofertas/edit/'.$row['Oferta']['id'],array('escape' => false) );?> </span><br/>
    								<span class="opensans size12"><?=$this->Html->link($this->Text->truncate($row['Oferta']['introduccion'],38,array('ending' => '...','exact' => false)),'/ofertas/edit/'.$row['Oferta']['id'],array('escape' => false) );?></span>
    							</div>
  							<? $cont++; } ?>
							' data-placement="left" data-toggle="popover" data-container="body" data-original-title="<span class='dark bold'>Ofertas Expiradas</span>">Ofertas Expiradas<span class="d-mes active"><?=count($OfertasInactivas)?></span></a></li>
						</ul>
						<div class="line2"></div>

						<?php echo $this->element("flash"); ?>

					
						<div class="row">
							<?php echo $content_for_layout; ?>
						</div>
						
					  </div>
					  <!-- END OF TAB 1 -->		
					  <?php echo $this->element('sql_dump'); ?>
					</div>
					<!-- End of Tab panes from left menu -->	
					
				</div>
				<!-- END OF RIGHT CPNTENT -->
			
			<div class="clearfix"></div><br/><br/>
			</div>
			<!-- END CONTENT -->			
		
		</div>
		
	</div>
	<!-- END OF CONTENT -->
	<?php 
	   echo $javascript->link('js-index')."\n";
	   echo $javascript->link('js-dashboard')."\n";
	   echo $javascript->link('functions')."\n";
	   echo $javascript->link('jquery-ui')."\n";
	   echo $javascript->link('jquery.easing')."\n";
	   echo $javascript->link('jquery.nicescroll.min')."\n";
	   echo $javascript->link('bootstrap.min')."\n";
	   echo $javascript->link('lightbox')."\n";

	?>
</body>
</html>
