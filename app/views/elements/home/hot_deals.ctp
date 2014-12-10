          <? $hot_deals = $this->requestAction('/homes/getHotDeals', array('params' => $parametros)); ?>
            <div class="col-md-4">
  						<div class="lbl">
  					    <img src="img/surfer-thumb.jpg" alt="" class="fwimg"/>
  							<div class="smallblacklabel"><?= $parametros['Params']['hot_deals_title']?></div>
  						</div>
              <? foreach ($hot_deals as $hotd) { ?>
    						<div class="deal">
    							<?= $this->Html->link($this->Html->image('../fotos/img.php?i=tn_'.$hotd['FirstPhoto'][0]['name']."&amp;w=50&amp;h=50&amp;radius=0",  array('alt'=>$hotd['Oferta']['name'], 'title'=>$hotd['Oferta']['name'], 'class' => 'dealthumb')), array('controller' => 'ofertas', 'action' => 'detalle', $hotd['Oferta']['id'], slug($hotd['Oferta']['name'])), array('escape' => false), null, false);?>
    							<div class="dealprice">
    								<p class="size12 grey lh2">desde <span class="price">$<?=number_format($hotd['Oferta']['precio'], 0)?></span></p>
    							</div>
                  <div class="dealtitle">
    								<p><?= $this->Html->link($hotd['Oferta']['name'], array('controller' => 'ofertas', 'action' => 'detalle', $hotd['Oferta']['id'], slug($hotd['Oferta']['name'])), array('escape' => false), null, false);?></p>
    								<span class="size13 grey mt-9"><?=$text->truncate($hotd["Oferta"]['introduccion'], 30)?></span>
    							</div>
  											
    						</div>
              <? } ?>
					
  					</div>