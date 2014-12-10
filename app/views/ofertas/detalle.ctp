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
				<h4 class="lh1"><?=$oferta['Oferta']['name']?></h4>
			</div>
			<div class="line3"></div>
			<div class="hpadding20">
				<h2 class="opensans slim green2">Wonderful!</h2>
			</div>
			<div class="line3 margtop20"></div>
			<div class="clearfix"></div><br/>
			<div class="hpadding20">
				<a href="#" class="booknow margtop20 btnmarg">Book now</a>
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
				  <?= $oferta['ProgramasCircuito']['name']?><span class="collapsearrow"></span>
				</button>
				
				<div id="collapse1" class="collapse">
					<div class="hpadding20">
						<?= $oferta['ProgramasCircuito']['detalle']?>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- End of collapse 1 -->				

				<div class="line4"></div>								

				<!-- Collapse 6 -->	
				<button type="button" class="collapsebtn2" data-toggle="collapse" data-target="#collapse6">
				  Room Amenities <span class="collapsearrow"></span>
				</button>
				
				<div id="collapse6" class="collapse in">
					<div class="hpadding20">
						<div class="col-md-4">
							<ul class="checklist">
								<li>Climate control</li>
								<li>Air conditioning</li>
								<li>Direct-dial phone</li>
								<li>Minibar</li>
							</ul>
						</div>
						<div class="col-md-4">
							<ul class="checklist">
								<li>Wake-up calls</li>
								<li>Daily housekeeping</li>
								<li>Private bathroom</li>
								<li>Hair dryer</li>	
							</ul>									
						</div>	
						<div class="col-md-4">
							<ul class="checklist">								
								<li>Makeup/shaving mirror</li>
								<li>Shower/tub combination</li>
								<li>Satellite TV service</li>
								<li>Electronic/magnetic keys</li>	
							</ul>									
						</div>									
					</div>
					<div class="clearfix"></div>
          <br/>
				</div>
				<!-- End of collapse 6 -->								
		
			</div>
		</div>
		
		<?php echo $this->element("default/ofertas/_right_side"); ?>	
	</div>
  
  
