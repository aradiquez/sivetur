    <? $parametros = $this->requestAction('App/getParams'); ?>
			<!-- RIGHT CONTENT -->
			<div class="col-md-4" >
				
				<div class="pagecontainer2 paymentbox grey">
					<div class="padding30">
            <?=$this->Html->image('../fotos/fix_img.php?i='.$oferta['FirstPhoto'][0]['name']."&amp;w=71&amp;h=71",  array('alt'=>$oferta['Oferta']['name'], 'title'=>$oferta['Oferta']['name'], 'class' => 'left margright20'));?>
						<span class="opensans size18 dark bold"><?=$oferta['Oferta']['name']?></span>
            <div class="clearfix"></div>  
					</div>
					<div class="line3"></div>
					
					<div class="hpadding30 margtop30">
						<table class="table table-bordered margbottom20">
							<tr>
								<td><span class="dark"><strong>Programa y Circuito</strong></span></td>
                <td> <?=$oferta['ProgramasCircuito']['name']?></td>
							</tr>
							<tr>
								<td><span class="dark"><strong>Valido hasta</strong></span></td>
                <td> <?=$funciones->fncFormatoFecha($oferta['Oferta']['end_date'])?></td>
							</tr>
						</table>
					</div>	
					<div class="line3"></div>
					<div class="padding30">					
						<span class="left size14 dark"><strong>Precio:</strong></span>
						<span class="right lred2 bold size18">US $<?=number_format($oferta['Oferta']['precio'], 0)?></span>
						<div class="clearfix"></div>
					</div>


				</div><br/>
			
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
			<!-- END OF RIGHT CONTENT -->