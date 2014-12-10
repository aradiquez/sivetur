        <? $last_minute = $this->requestAction('/homes/getLastMinute', array('params' => $parametros)); ?>
					<div class="col-md-4">
						<div class="lbl">
							<img src="img/egypt-thumb.jpg" alt="" class="fwimg"/>
							<div class="smallblacklabel"><?= $parametros['Params']['last_minute_title']?></div>
						</div>
						<? foreach ($last_minute as $last) { ?>
	  						<div class="deal">
	  							<?= $this->Html->link($this->Html->image( '../fotos/img.php?i=tn_'.$last['FirstPhoto'][0]['name']."&amp;w=50&amp;h=50&amp;radius=0",  array('alt'=>$last['Oferta']['name'], 'title'=>$last['Oferta']['name'], 'class' => 'dealthumb')), array('controller' => 'ofertas', 'action' => 'detalle', $last['Oferta']['id'], slug($last['Oferta']['name'])), array('escape' => false), null, false);?>
	  							<div class="dealprice">
	  								<p class="size12 grey lh2">desde <span class="price">$<?=number_format($last['Oferta']['precio'], 0)?></span></p>
	  							</div>
	                <div class="dealtitle">
	  								<p><?= $this->Html->link($last['Oferta']['name'], array('controller' => 'ofertas', 'action' => 'detalle', $last['Oferta']['id'], slug($last['Oferta']['name'])), array('escape' => false), null, false);?></p>
	  								<span class="size13 grey mt-9"><?=$text->truncate($last["Oferta"]['introduccion'], 30)?></span>
	  							</div>					
	  						</div>
  						<? } ?>
					
					</div>
