<? $footerNavegador = $this->requestAction('/homes/getNavegador'); ?>
  	<div class="footerbgblack">
  		<div class="container">		
			
  			<div class="col-md-3">
  				<span class="ftitleblack">Visite Nuestras Redes Sociales</span>
				<div class="scont grey2">
					<? if (!empty($parametros['Params']['link_facebook'])) { ?><a href="<?=$parametros['Params']['link_facebook']?>" class="social1b"><?=$this->Html->image('icon-facebook.png',  array('alt'=>__('_TITULO', true)))?></a><? } ?>
					<? if (!empty($parametros['Params']['link_twitter'])) { ?><a href="<?=$parametros['Params']['link_twitter']?>" class="social2b"><?=$this->Html->image('icon-twitter.png',  array('alt'=>__('_TITULO', true)))?></a><? } ?>
					<? if (!empty($parametros['Params']['link_google'])) { ?><a href="<?=$parametros['Params']['link_google']?>" class="social3b"><?=$this->Html->image('icon-gplus.png',  array('alt'=>__('_TITULO', true)))?></a><? } ?>
					<? if (!empty($parametros['Params']['link_youtube'])) { ?><a href="<?=$parametros['Params']['link_youtube']?>" class="social4b"><?=$this->Html->image('icon-youtube.png',  array('alt'=>__('_TITULO', true)))?></a><? } ?>
					<br/><br/><br/>
					<a href="#"><?=$this->Html->image('logosmal.png',  array('alt'=>__('_TITULO', true)))?></a><br/>
					&copy; <?=date("Y")?>  |  <a href="#" data-toggle="modal" data-target="#privacy">Politica de Privacidad</a><br/>
					Todos los derechos reservados
					<br/><br/>
				</div>
  			</div>
  			<!-- End of column 1-->
			<? $footerA = $this->requestAction('/homes/getFooterA', array('params' => $parametros)); ?>
			<? if (!empty($footerA)) { ?>
				<div class="col-md-3">
					<span class="ftitleblack"><?=$parametros['Params']['titulo_footer_bloquea']?></span>
					<br/><br/>
					<ul class="footerlistblack">
						<? foreach($footerA as $fta) { ?>
							<li><?= $this->Html->link($fta['Oferta']['name'], array('controller' => 'ofertas', 'action' => 'detalle', $fta['Oferta']['id'], slug($fta['Oferta']['name'])), array('escape' => false), null, false);?></li>
						<? } ?>
					</ul>
				</div><!-- col-md-3 -->
				<!-- End of column 2-->	
			<? } else { ?>
				<div class="col-md-3"></div>
			<? } ?>
			
			<? $FooterB = $this->requestAction('/homes/getFooterB', array('params' => $parametros)); ?>
			<? if (!empty($FooterB)) { ?>
				<div class="col-md-3">
					<span class="ftitleblack"><?=$parametros['Params']['titulo_footer_bloqueb']?></span>
					<br/><br/>
					<ul class="footerlistblack">
						<? foreach($FooterB as $ftb) { ?>
							<li><?= $this->Html->link($ftb['Oferta']['name'], array('controller' => 'ofertas', 'action' => 'detalle', $ftb['Oferta']['id'], slug($ftb['Oferta']['name'])), array('escape' => false), null, false);?></li>
						<? } ?>
					</ul>				
				</div><!-- col-md-3 -->
				<!-- End of column 3-->		
			<? } else { ?>
				<div class="col-md-3"></div>
			<? } ?>
			
			<div class="col-md-3">
				<span class="ftitleblack"><?=$parametros['Params']['titulo_footer_telefono']?></span><br/>
				<span class="pnr"><?=$parametros['Params']['footer_telefono']?></span><br/>
				<span class="grey2"><?=$parametros['Params']['footer_correo']?></span>
			</div><!-- col-md-3 grey -->			
			<!-- End of column 4-->				
  		</div>	
  	</div>
	
  	<div class="footerbg3black">
  		<div class="container center grey"> 
  		<? $am = count($footerNavegador);
	       $i = 1;
	       foreach ($footerNavegador as $nav) {
			   echo $html->link($nav['Section']['title'], $nav['Section']['direccion'], array()).($am == $i ? "":" | ");
	       $i++;} ?>
  		<a href="#top" class="gotop scroll"><?=$this->Html->image('spacer.png',  array('alt'=>"spacer"))?></a>
  		</div>
  	</div>
    