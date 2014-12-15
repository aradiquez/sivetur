<? $feature_offers = $this->requestAction('/homes/getFeatureOffers', array('params' => $parametros)); ?>
	<? if (!empty($feature_offers)) { ?>
		<div class="row anim3">
		  <div class="col-md-3">
			<h2><?= $parametros['Params']['feature_offers_title']?></h2> 
		  </div>
		  <div class="col-md-9">
			<!-- Carousel -->
			<div class="wrapper">
				<div class="list_carousel">		
					<ul id="foo2">
						<? foreach ($feature_offers as $feature) { ?>
							<li>
								<?= $this->Html->link($this->Html->image( '../fotos/fix_img.php?i='.$feature['FirstPhoto'][0]['name']."&amp;w=255&amp;h=179&amp;radius=0",  array('alt'=>$feature['Oferta']['name'], 'title'=>$feature['Oferta']['name'])), array('controller' => 'ofertas', 'action' => 'detalle', $feature['Oferta']['id'], slug($feature['Oferta']['name'])), array('escape' => false), null, false);?>
								<div class="m1">
									<h3 class="lh1 dark"><strong><?= $this->Html->link($feature['Oferta']['name'], array('controller' => 'ofertas', 'action' => 'detalle', $feature['Oferta']['id'], slug($feature['Oferta']['name'])), array('escape' => false), null, false);?></strong></h3>
									<h4 class="lh1 green"><?=$text->truncate($feature["Oferta"]['introduccion'], 20)?></h4>							
								</div>							
							</li>	
						<? } ?>				
					</ul>
					<div class="clearfix"></div>
					<a id="prev_btn2" class="prev" href="#"><img src="img/spacer.png" alt=""/></a>
					<a id="next_btn2" class="next" href="#"><img src="img/spacer.png" alt=""/></a>
				</div><!-- list_carousel -->
			</div><!-- wrapper -->
		  </div><!-- col-md-9 -->
		</div><!-- row anim3 -->
	<? } ?>