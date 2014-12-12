<? 
echo $html->metatitle($seccion['Section']['title']." | ".__('_TITULO', true));

$this->set('SEOH1',$seccion['Section']['title']." | ".__('_TITULO', true).__('_INICIO', true));
	
echo $html->meta('keywords', $seccion['Section']['keyword'].__('_KEYWORDS', true), array('inline' => false))."\n";
	
echo $html->meta('description', $seccion['Section']['description'].__('_DESCRIPCION', true), array('inline' => false))."\n";
?>
	<div class="container pagecontainer offset-0">	
		<?php echo $this->element("default/ofertas/_filters"); ?>		
		<!-- LIST CONTENT-->
		<div class="rightcontent col-md-9 offset-0">
			<div class="hpadding20">
				<!-- Top filters -->
				<div class="topsortby">
					<div class="col-md-4 offset-0">
							<h2 class="left mt7"><b><?=$seccion['Section']['title']?></b></h2>
					</div><!-- offset-0 -->			
				</div>
				<!-- End of topfilters-->
        <br/>
        <div class="opensans size13 grey">
					<?=$seccion['Section']['text']?>
				</div>
			</div><!-- hpadding20 -->
			<!-- End of padding -->
			<br/><br/>
			<div class="clearfix"></div>
			<div class="itemscontainer offset-1">
				<?php foreach ($ofertas as $offt){  ?>
          <div class="offset-2">
  					<div class="col-md-3 offset-0">
  						<div class="listitem2">
                <?=$html->link($this->Html->image('../fotos/fix_img.php?i='.$offt['FirstPhoto'][0]['name']."&amp;w=271&amp;h=210",  array('alt'=>$offt['Oferta']['name'], 'title'=>$offt['Oferta']['name'])), "../fotos/".$offt['FirstPhoto'][0]['name'], array('data-footer'=> "".$offt['Oferta']['introduccion'], 'data-title' => "".$offt['Oferta']['name'], 'data-gallery' => "multiimages", 'data-toggle'=>"lightbox", 'escape' => false) );?>
  						</div>
  					</div>
  					<div class="col-md-9 offset-0">
  						<div class="itemlabel3">
  							<div class="labelright">
  								<br/>
  								<span class="green size18"><b>US $<?= number_format($offt['Oferta']['precio'], 2)?></b></span><br/>
  								<br/><br/><br/>
  								<?=$html->link('M&aacute;s informaci&oacute;n', array('controller' => 'ofertas', 'action' => 'detalle',$offt['Oferta']['id'], slug($offt['Oferta']['name'])), array('escape' => false, 'class' => "bookbtn mt1") );?>			
  							</div>
  							<div class="labelleft2">			
  								<b><?= $offt['Oferta']['name']?></b><br/><br/>
  								<p class="grey"><?= $offt['Oferta']['introduccion']?></p><br/>
  							</div>
  						</div>
  					</div>
  				</div>
  				<div class="clearfix"></div>
  				<div class="offset-2"><hr class="featurette-divider3"></div>
        <?php } ?>
        
			</div>	<!-- End of offset1-->		

			<div class="hpadding20">
       <ul class="pagination right paddingbtm20"> 
         <?php
           if(count($ofertas)>$parametros['Params']['paginacion']) {
            echo $paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false, 'class' => 'disabled'));
            echo $paginator->numbers(array('separator' => false, 'tag' => 'li', 'currentClass' => 'active'));
            echo $paginator->next('&raquo;', array('tag' => 'li', 'escape' => false, 'class' => 'disabled'));
            
            }
         ?>
       </ul>
			</div><!-- hpadding20 -->

		</div>
		<!-- END OF LIST CONTENT-->
	</div>
	<!-- END OF container-->
