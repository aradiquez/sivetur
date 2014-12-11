<div class="col-md-4" >	
	<? $parametros = $this->requestAction('App/getParams'); ?>
	<div class="pagecontainer2 needassistancebox">
		<div class="cpadding1">
			<span class="icon-help"></span>
			<h3 class="opensans">Necesitas ayuda?</h3>
			<p class="size14 grey">Por favor si tiene alguna pregunta, sirvase llamar a nuestras oficinas en horario de 8:00 am a 5:00 pm</p>
			<p class="opensans size30 lblue xslim"><?php echo $parametros['Params']['footer_telefono']?></p>
		</div>
	</div><br/>
	
	<div class="pagecontainer2 alsolikebox">
		<div class="cpadding1">
			<span class="icon-location"></span>
			<h3 class="opensans">Tambi&eacute;n te podr&iacute;a interesar</h3>
			<div class="clearfix"></div>
		</div>
    <? $related = $this->requestAction('homes/getRelated/'.$oferta['Oferta']['id']."/".$oferta['Oferta']['programacircuito_id'])?>
    <? foreach($related as $relat) { ?>
  		<div class="cpadding1 ">
        <?=$html->link($this->Html->image('../fotos/fix_img.php?i='.$relat['FirstPhoto'][0]['name']."&amp;w=96&amp;h=61",  array('alt'=>$relat['Oferta']['name'], 'title'=>$relat['Oferta']['name'], 'class' => 'left mr20')), array('controller' => 'ofertas', 'action' => 'detalle',$relat['Oferta']['id'], slug($relat['Oferta']['name'])), array('escape' => false) );?>
  			<?=$html->link("<b>".$relat['Oferta']['name']."</b>",  array('controller' => 'ofertas', 'action' => 'detalle',$relat['Oferta']['id'], slug($relat['Oferta']['name'])), array('escape' => false));?><br/>
  			<span class="opensans green bold size14">$ <?php echo number_format($relat['Oferta']['precio'], 0)?></span><br/>
  		</div>
      <div class="clearfix"></div>
  		<div class="line5"></div>
		<? } ?>
    <br/>
	</div>				
</div>