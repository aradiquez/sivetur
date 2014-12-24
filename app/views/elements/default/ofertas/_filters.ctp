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
			
  			<div class="padding20title"><h2 class="opensans dark">Buscar ofertas</h2></div>
  			<div class="line2"></div>
			
  			<!-- Price range -->					
  			<button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse2">
  			  <h3>Rango de Precios</h3> <span class="collapsearrow"></span>
  			</button>
				
  			<div id="collapse2" class="collapse in">
  				<div class="padding20">
  					<div class="layout-slider wh100percent">
  					<span class="cstyle09">
              <input id="Slider1" type="slider" name="Ofertas[price]" value="<?=!empty($price_form_set[0]) ? $price_form_set[0] : 0?>;<?=!empty($price_form_set[1]) ? $price_form_set[1] : 0?>" /></span>
  					</div>
  					<script type="text/javascript" >
            jQuery(document).ready(function(){
            "use strict";
  					  jQuery("#Slider1").slider({ from: <?=!empty($values['menor']['Oferta']['precio']) ? $values['menor']['Oferta']['precio'] : 0?>, to: <?=!empty($values['mayor']['Oferta']['precio']) ? $values['mayor']['Oferta']['precio'] : 0?>, step: 5, smooth: true, round: 0, dimension: "&nbsp;$", skin: "round" });
            });
  					</script>
  				</div>
  			</div>
  			<!-- End of Price range -->	
			
  			<div class="line2"></div>
			
  			<!-- Acomodations -->		
  			<button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse3">
  			  <h3>Facilidades</h3> <span class="collapsearrow"></span>
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
  			  <h3>Programas y Circuitos</h3> <span class="collapsearrow"></span>
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
  			
  			<!-- Search Words -->
  			<button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse5">
  			  <h3>Donde quiere viajar?</h3> <span class="collapsearrow"></span>
  			</button>	
  			<div id="collapse5" class="collapse in">
  				<div class="hpadding20">
            <br/>
            <?php echo $this->Form->input('Ofertas.criterion', array('label' => false, 'maxlength' => 100, 'placeholder' => 'Machu Pichu', 'class' => 'form-control')); ?> 
  				</div>
  				<div class="clearfix"></div>						
  			</div>	
  			<!-- End of Hotel Preferences -->
  			<br/>
  			<br/>
  			<div class="clearfix"></div>
			  <? echo $this->Form->button(__("_BUSCAR", true), array('type'=>'submit', 'class'=>"pull-right btn-search3 "));?>
  			<div class="clearfix"></div>
        <div class="line2"></div>
  		</div>
  		<!-- END OF FILTERS -->
    <?php echo $this->Form->end(); ?>