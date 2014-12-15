      <? $tags = $this->requestAction('/homes/getTagsForSearch'); ?>
          <?php echo $this->Form->create(null, array('url' => array('controller' => 'ofertas', 'action' => 'search'))); ?>
					<div class="col-md-4 scolleft">
            <div class="w50percent">
                <? $count = 0;
                foreach ($tags as $tag) { ?> 
								<div class="radio">
								  <label>
                    <?
                    echo $this->Form->input('Ofertas.tags', array(
                        'type' => 'radio',
                        'options' => array($tag['Tag']['id'] => $tag['Tag']['name']),
                        'hiddenField' => false
                    ), array());
                    ?>
								  </label>
								</div>
                
                <?= ($count == 7 ? '</div><div class="w50percentlast">' : '');?>
               <? $count++; }  ?>
							</div>	
							
							<div class="clearfix"></div><br/>
							
							<!-- HOTELS TAB -->
							<div class="hotelstab">
                <div class="clearfix"></div>
                <br/>
								<span class="opensans size18">Donde quiere viajar?</span>
                <?php echo $this->Form->input('Ofertas.criterion', array('label' => false, 'maxlength' => 100, 'placeholder' => 'Machu Pichu', 'class' => 'form-control')); ?>
								<? echo $this->Form->button(__("_BUSCAR", true), array('type'=>'submit', 'class'=>"btn-search3"));?>
							</div>
							<!-- END OF HOTELS TAB -->
						</div>
            <?php echo $this->Form->end(); ?>