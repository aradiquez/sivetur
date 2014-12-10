<? $footerNavegador = $this->requestAction('/homes/getNavegador'); ?>
    <div class="container none">		
			<footer>
				<p class="pull-right"><a href="#">Back to top</a></p>
			</footer>
		</div><!-- container none -->		
		
		<div class="footerbg">
			<div class="container">		
				<div class="col-md-3">
					<span class="ftitle">Visite Nuestras Redes Sociales</span>
					<div class="scont">
						<? if (!empty($parametros['Params']['link_facebook'])) { ?><a href="<?=$parametros['Params']['link_facebook']?>" class="social1b"><img src="img/icon-facebook.png" alt=""/></a><? } ?>
						<? if (!empty($parametros['Params']['link_twitter'])) { ?><a href="<?=$parametros['Params']['link_twitter']?>" class="social2b"><img src="img/icon-twitter.png" alt=""/></a><? } ?>
						<? if (!empty($parametros['Params']['link_google'])) { ?><a href="<?=$parametros['Params']['link_google']?>" class="social3b"><img src="img/icon-gplus.png" alt=""/></a><? } ?>
						<? if (!empty($parametros['Params']['link_youtube'])) { ?><a href="<?=$parametros['Params']['link_youtube']?>" class="social4b"><img src="img/icon-youtube.png" alt=""/></a><? } ?>
						<br/><br/><br/>
						<a href="#"><img src="img/logosmal.png" alt="" /></a><br/>
						&copy; 2013  |  <a href="#" data-toggle="modal" data-target="#privacy">Politica de Privacidad</a><br/>
						Todos los derechos reservados
						<br/><br/>
					</div><!-- scont -->
				</div><!-- col-md-3 -->
				<!-- End of column 1-->
				<? $footerA = $this->requestAction('/homes/getFooterA', array('params' => $parametros)); ?>
				<? if (!empty($footerA)) { ?>
					<div class="col-md-3">
						<span class="ftitle"><?=$parametros['Params']['titulo_footer_bloquea']?></span>
						<br/><br/>
						<ul class="footerlist">
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
						<span class="ftitle"><?=$parametros['Params']['titulo_footer_bloqueb']?></span>
						<br/><br/>
						<ul class="footerlist">
							<? foreach($FooterB as $ftb) { ?>
								<li><?= $this->Html->link($ftb['Oferta']['name'], array('controller' => 'ofertas', 'action' => 'detalle', $ftb['Oferta']['id'], slug($ftb['Oferta']['name'])), array('escape' => false), null, false);?></li>
							<? } ?>
						</ul>				
					</div><!-- col-md-3 -->
					<!-- End of column 3-->		
				<? } else { ?>
					<div class="col-md-3"></div>
				<? } ?>
				
				<div class="col-md-3 grey">
					<span class="ftitle"><?=$parametros['Params']['titulo_footer_telefono']?></span><br/>
					<span class="pnr"><?=$parametros['Params']['footer_telefono']?></span><br/>
					<?=$parametros['Params']['footer_correo']?>
				</div><!-- col-md-3 grey -->			
				<!-- End of column 4-->			
			</div><!-- container -->	
		</div><!-- footerbg -->
		
		<div class="footerbg3">
			<div class="container center grey"> 
      <? 
      $am = count($footerNavegador);
      $i = 1;
      foreach ($footerNavegador as $nav) {
		   echo $html->link($nav['Section']['title'], $nav['Section']['direccion'], array()).($am == $i ? "":" | ");
      $i++;} ?>
			<a href="#top" class="gotop scroll"><img src="img/spacer.png" alt=""/></a>
			</div><!-- container center grey -->
		</div><!-- footerbg3 -->