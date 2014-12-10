        <? $early_booking = $this->requestAction('/homes/getEarlyBooking', array('params' => $parametros)); ?>
					<div class="col-md-4">
						<div class="lbl">
							<img src="img/rome-thumb.jpg" alt="" class="fwimg"/>
							<div class="smallblacklabel"><?= $parametros['Params']['early_booking_title']?></div>
						</div>
            <? foreach ($early_booking as $early) { ?>
  						<div class="deal">
  							<?= $this->Html->link($this->Html->image( '../fotos/img.php?i=tn_'.$early['FirstPhoto'][0]['name']."&amp;w=50&amp;h=50&amp;radius=0",  array('alt'=>$early['Oferta']['name'], 'title'=>$early['Oferta']['name'], 'class' => 'dealthumb')), array('controller' => 'ofertas', 'action' => 'detalle', $early['Oferta']['id'], slug($early['Oferta']['name'])), array('escape' => false), null, false);?>
  							<div class="dealprice">
  								<p class="size12 grey lh2">desde <span class="price">$<?=number_format($early['Oferta']['precio'], 0)?></span></p>
  							</div>
                <div class="dealtitle">
  								<p><?= $this->Html->link($early['Oferta']['name'], array('controller' => 'ofertas', 'action' => 'detalle', $early['Oferta']['id'], slug($early['Oferta']['name'])), array('escape' => false), null, false);?></p>
  								<span class="size13 grey mt-9"><?=$text->truncate($early["Oferta"]['introduccion'], 30)?></span>
  							</div>
  											
  						</div>
            <? } ?>
					
					</div>