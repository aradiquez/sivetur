<? 
echo $html->metatitle($seccion['Section']['title']." | ".__('_TITULO', true));

$this->set('SEOH1',$seccion['Section']['title']." | ".__('_TITULO', true).__('_INICIO', true));
	
echo $html->meta('keywords', $seccion['Section']['keyword'].__('_KEYWORDS', true), array('inline' => false))."\n";
	
echo $html->meta('description', $seccion['Section']['description'].__('_DESCRIPCION', true), array('inline' => false))."\n";
?>
		
		<div class="container mt25 offset-0">
			<!-- CONTENT -->
			<div class="col-md-12 pagecontainer2 offset-0">
				<div class="hpadding50c">
					<p class="lato size30 slim"><?=$seccion_title?></p>
					<p class="aboutarrow"></p>
				</div>
				<div class="line3"></div>
				
				<div class="hpadding50c">
					
					<p class="lato size22 slim textcenter">
					  <?=$seccion_description?>
					</p>
					<br/>
					<div class="line3"></div>
					<br/>
          
					<!-- LEFT IMG -->
					<div class="cpdd01">
            <? if (!empty($seccion['FirstPhoto'][0]) ){ ?>
              <div class="col-md-8" style="float: left; margin: 5px;">
                <?= $this->Html->image( '../fotos/img.php?i='.$seccion['FirstPhoto'][0]['name']."&amp;w=677&amp;h=600&amp;radius=0",  array('alt'=>$seccion['FirstPhoto'][0]['details'], 'title'=>$seccion['FirstPhoto'][0]['details'], 'class' => "fwimg"));?>
              </div>
            <? } ?>
            <div class="opensans size13 grey">
							<?=$seccion_text?>
						</div>
            
					</div>
					<!-- END OF LEFT IMG -->
					
    			<br/><br/>
    			<div class="clearfix"></div>
    			<div class="itemscontainer offset-1">
    				<?php foreach ($programacircuito as $offt){  ?>
              <div class="offset-2">
                <? if (!empty($offt['FirstPhoto'][0])) { ?>
        					<div class="col-md-3 offset-0">
        						<div class="listitem2">
                      <?=$html->link($this->Html->image('../fotos/fix_img.php?i='.$offt['FirstPhoto'][0]['name']."&amp;w=271&amp;h=210",  array('alt'=>$offt['ProgramasCircuito']['name'], 'title'=>$offt['ProgramasCircuito']['name'])), "../fotos/".$offt['FirstPhoto'][0]['name'], array('data-footer'=> "".$offt['ProgramasCircuito']['introduccion'], 'data-title' => "".$offt['ProgramasCircuito']['name'], 'data-gallery' => "multiimages", 'data-toggle'=>"lightbox", 'escape' => false) );?>
        						</div>
        					</div>
                  <div class="col-md-9 offset-0">
                <? } else { ?>
                  <div class="col-md-12 offset-0">
                <? } ?>
      						<div class="itemlabel3">
      							<div class="labelright">
      								<br/>
      								<br/><br/><br/>	
                      <?=$html->link('M&aacute;s informaci&oacute;n', array('controller' => 'programas_y_circuitos', 'action' => 'index',$offt['ProgramasCircuito']['id'], slug($offt['ProgramasCircuito']['name'])), array('escape' => false, 'class' => "bookbtn mt1") );?>
      							</div>
      							<div class="labelleft2">			
      								<b><?=$html->link($offt['ProgramasCircuito']['name'], array('controller' => 'programas_y_circuitos', 'action' => 'index',$offt['ProgramasCircuito']['id'], slug($offt['ProgramasCircuito']['name'])), array('escape' => false));?></b><br/><br/>
      								<p class="grey"><?= $offt['ProgramasCircuito']['introduccion']?></p><br/>
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
               if(count($programacircuito)>$parametros['Params']['paginacion']) {
                echo $paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false, 'class' => 'disabled'));
                echo $paginator->numbers(array('separator' => false, 'tag' => 'li', 'currentClass' => 'active'));
                echo $paginator->next('&raquo;', array('tag' => 'li', 'escape' => false, 'class' => 'disabled'));
            
                }
             ?>
           </ul>
    			</div><!-- hpadding20 -->
          
          
					<div class="clearfix"></div>
				</div>
			
			<div class="clearfix"></div><br/><br/>
			</div>
			<!-- END CONTENT -->			
			

			
		</div>    