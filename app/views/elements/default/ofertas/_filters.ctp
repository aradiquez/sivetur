		<?php 
    $values = $this->requestAction('/ofertas/getFilterInformation');
    ?>
    <?
    if (!empty($this->params['form']['Ofertas']['price'])){
      $price_form_set = explode(';',$this->params['form']['Ofertas']['price']);
    }
    ?>
    <!-- FILTERS -->
    <?php echo $this->Form->create('Ofertas', array('url' => array('controller' => 'ofertas', 'action' => 'search'))); ?>
  		<div class="col-md-3 filters offset-0">
			
  			<div class="padding20title"><h3 class="opensans dark">Filter by</h3></div>
  			<div class="line2"></div>
			
  			<!-- Price range -->					
  			<button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse2">
  			  Rango de Precios <span class="collapsearrow"></span>
  			</button>
				
  			<div id="collapse2" class="collapse in">
  				<div class="padding20">
  					<div class="layout-slider wh100percent">
  					<span class="cstyle09">
              <input id="Slider1" type="slider" name="Ofertas[price]" value="<?=!empty($price_form_set[0]) ? $price_form_set[0] : $values['menor']['Oferta']['precio'] + 300?>;<?=!empty($price_form_set[1]) ? $price_form_set[1] : $values['menor']['Oferta']['precio'] + 700?>" /></span>
  					</div>
  					<script type="text/javascript" >
            jQuery(document).ready(function(){
            "use strict";
  					  jQuery("#Slider1").slider({ from: <?=$values['menor']['Oferta']['precio']?>, to: <?=$values['mayor']['Oferta']['precio']?>, step: 5, smooth: true, round: 0, dimension: "&nbsp;$", skin: "round" });
            });
  					</script>
  				</div>
  			</div>
  			<!-- End of Price range -->	
			
  			<div class="line2"></div>
			
  			<!-- Acomodations -->		
  			<button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse3">
  			  Tags <span class="collapsearrow"></span>
  			</button>				
			
  			<div id="collapse3" class="collapse in">
  				<div class="hpadding20">
             <?
             echo $form->input('Ofertas.tags', array('multiple'=> 'checkbox', 'label' => false, 'options' => $funciones->sanitize_tags_programs($values['tags'], "Tag")));
             ?>
  				</div>	
  				<div class="clearfix"></div>					
  			</div>
  			<!-- End of Acomodations -->
			
  			<div class="line2"></div>
			
  			<!-- Hotel Preferences -->
  			<button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse4">
  			  Programas y Circuitos <span class="collapsearrow"></span>
  			</button>	
  			<div id="collapse4" class="collapse in">
  				<div class="hpadding20">
             <?
             echo $form->input('Ofertas.programas', array('type' => 'select', 'multiple'=> 'checkbox', 'label' => false,  'options' => $funciones->sanitize_tags_programs($values['programs'], "ProgramasCircuito")));
             ?>
  				</div>
  				<div class="clearfix"></div>						
  			</div>	
  			<!-- End of Hotel Preferences -->
			
  			<div class="line2"></div>
  			<div class="clearfix"></div>
  			<br/>
  			<br/>
			  <? echo $this->Form->button(__("_BUSCAR", true), array('type'=>'submit', 'class'=>"pull-right btn-search3 "));?>
			
  		</div>
  		<!-- END OF FILTERS -->
    <?php echo $this->Form->end(); ?>