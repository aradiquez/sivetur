<h4>Ofertas en <?=$seccion_title?></h4><br/>
<div class="itemscontainer offset-1">
  <? $cant = 0;?>
  <? foreach($ofertas as $offr) {  ?>
  	<div class="col-md-4">
  		<div class="listitem">
        <?=$html->link($this->Html->image('../fotos/fix_img.php?i='.$offr['FirstPhoto'][0]['name']."&amp;w=249&amp;h=180",  array('alt'=>$offr['Oferta']['name'], 'title'=>$offr['Oferta']['name'])), array('controller' => 'ofertas', 'action' => 'detalle',$offr['Oferta']['id'], slug($offr['Oferta']['name'])), array('escape' => false) );?>
  		</div>
  		<div class="itemlabel">
        <?=$html->link("ver m&aacute;s" , array('controller' => 'ofertas', 'action' => 'detalle',$offr['Oferta']['id'], slug($offr['Oferta']['name'])), array('class' => 'bookbtn right mt1', 'escape' => false) );?>
  			<b><?=$html->link("<h5>".$offr['Oferta']['name']."</h5>", array('controller' => 'ofertas', 'action' => 'detalle',$offr['Oferta']['id'], slug($offr['Oferta']['name'])), array('escape' => false) );?></b><br/>
  			<p class="lightgrey"><span class="green size14"><b>US $<?=number_format($offr['Oferta']['precio'], 0)?></b></span></p>
  		</div>
  	</div><?  $cant++; ?>
    <? if ($cant == 3) { ?>
      <div class="clearfix"></div>
      <div class="offset-2"><hr class="featurette-divider3"></div>
    <? $cant = 0;}  ?>
  <? } ?>  
</div>