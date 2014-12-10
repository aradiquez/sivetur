	<? $top_deals = $this->requestAction('/homes/getTopDeals', array('params' => $parametros)); ?>
		<? if (!empty($feature_offers)) { ?>
			<div class="row anim2">
			  <div class="col-md-3">
				<h2><?= $parametros['Params']['top_deals_title']?></h2><br/>
			  </div>
			  <div class="col-md-9">
				<!-- Carousel -->
				<div class="wrapper">
					<div class="list_carousel">
						<ul id="foo">
							<? foreach ($top_deals as $deals) { ?>
								<li>
									<?= $this->Html->link($this->Html->image( '../fotos/img.php?i=tn_'.$deals['FirstPhoto'][0]['name']."&amp;w=155&amp;h=179&amp;radius=0",  array('alt'=>$deals['Oferta']['name'], 'title'=>$deals['Oferta']['name'], 'class' => 'dealthumb')), array('controller' => 'ofertas', 'action' => 'detalle', $deals['Oferta']['id'], slug($deals['Oferta']['name'])), array('escape' => false), null, false);?>
									<div class="m1">
										<h6 class="lh1 dark"><strong><?= $this->Html->link($deals['Oferta']['name'], array('controller' => 'ofertas', 'action' => 'detalle', $deals['Oferta']['id'], slug($deals['Oferta']['name'])), array('escape' => false), null, false);?></strong></h6>
										<h6 class="lh1 green"><?=$text->truncate($deals["Oferta"]['introduccion'], 20)?></h6>							
									</div>
								</li>
							<? } ?>
						</ul>
						<div class="clearfix"></div>
						<a id="prev_btn" class="prev" href="#"><img src="img/spacer.png" alt=""/></a>
						<a id="next_btn" class="next" href="#"><img src="img/spacer.png" alt=""/></a>
					</div><!-- list_carousel -->
				</div><!-- wrapper -->
			  </div><!-- col-md-9 -->
			</div><!-- row anim2 -->	
		<? } ?>