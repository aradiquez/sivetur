<? 
echo $html->metatitle($seccion['Section']['title']." | ".__('_TITULO', true));

$this->set('SEOH1',$seccion['Section']['title']." | ".__('_TITULO', true).__('_INICIO', true));
	
echo $html->meta('keywords', $seccion['Section']['keyword'].__('_KEYWORDS', true), array('inline' => false))."\n";
	
echo $html->meta('description', $seccion['Section']['description'].__('_DESCRIPCION', true), array('inline' => false))."\n";
?>
	
	<div class="container pagecontainer offset-0">	

		 <?php echo $this->element("default/ofertas/_slider_details", array('photos' => $oferta['Photos'])); ?>	
     
		<!-- RIGHT INFO -->
		<div class="col-md-4 detailsright offset-0">
			<div class="padding20">
				<h1 class="lh1"><?=$oferta['Oferta']['name']?></h1>
			</div>
			<div class="line3"></div>
      <br/>
			<div class="hpadding20">
				<p><?=$oferta['Oferta']['introduccion']?></p>
			</div>
			<div class="line3"></div>
      <br/>
			<div class="hpadding20">
				<p class="opensans slim green2 btn-lg">US $<?=number_format($oferta['Oferta']['precio'], 0)?></p>
			</div>
			<div class="line3"></div>
      <br/>
			<div class="hpadding20">
				<p class="opensans slim btn-lg"><strong>Valido hasta:</strong> <?=$funciones->fncFormatoFecha($oferta['Oferta']['end_date'])?></p>
			</div>
			<div class="line3 margtop20"></div>
			<div class="clearfix"></div><br/>
			<div class="hpadding20">
        <?= $this->Html->link('Reserve ahora', array('controller' => 'ofertas', 'action' => 'reservation', $oferta['Oferta']['id'], slug($oferta['Oferta']['name'])), array('class' => "booknow margtop20 btnmarg"))?>
			</div>
		</div>
		<!-- END OF RIGHT INFO -->

	</div>
	<!-- END OF container-->
	
	<div class="container mt25 offset-0">

		<div class="col-md-8 pagecontainer2 offset-0">
			<!-- TAB 1 -->				
			<div id="summary">
        <br/>
				<div class="hpadding20">
				  <?=$oferta['Oferta']['detalle']?> 
        </div>
				<div class="line4"></div>
				
				<!-- Collapse 1 -->	
				<button type="button" class="collapsebtn2  collapsed" data-toggle="collapse" data-target="#collapse1">
				  <h2><?= $oferta['ProgramasCircuito']['name']?></h2><span class="collapsearrow"></span>
				</button>
				
				<div id="collapse1" class="collapse">
					<div class="hpadding20">
						<?= $this->Text->truncate($oferta['ProgramasCircuito']['introduccion'],1500,array('ending' => '...','exact' => false))?><br/><br/> <? echo $html->link("Ver m&aacute;s informaci&oacute;n", array('controller' => 'programas_y_circuitos', 'action' => 'index',$oferta['ProgramasCircuito']['id'], slug($oferta['ProgramasCircuito']['name'])), array('class' => 'pull-right', 'escape' => false));?>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- End of collapse 1 -->				

				<div class="line4"></div>								

				<!-- Collapse 6 -->	
				<button type="button" class="collapsebtn2" data-toggle="collapse" data-target="#collapse6">
				  <h2>Relacionados</h2> <span class="collapsearrow"></span>
				</button>
				
				<div id="collapse6" class="collapse in">
					<div class="hpadding20">
            <?
            $total_tag = count($oferta['Tag']);
            $first_tag = ceil($total_tag / 3);
            $other_tag = round($total_tag / 3);
            ?>
            <? foreach ($oferta['Tag'] as $tags) { } ?>

							<ul class="checklist">
								<li>Climate control</li>
								<li>Air conditioning</li>
								<li>Direct-dial phone</li>
								<li>Minibar</li>
							
								<li>Wake-up calls</li>
								<li>Daily housekeeping</li>
								<li>Private bathroom</li>
								<li>Hair dryer</li>	
							
								<li>Makeup/shaving mirror</li>
								<li>Shower/tub combination</li>
								<li>Satellite TV service</li>
								<li>Electronic/magnetic keys</li>	
							</ul>									
									
					</div>
					<div class="clearfix"></div>
          <br/>
				</div>
				<!-- End of collapse 6 -->								
		
			</div>
		</div>
		
		<?php echo $this->element("default/ofertas/_right_side", array('oferta', $oferta)); ?>	
	</div>
  
  
