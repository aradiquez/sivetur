<? $tags = $this->requestAction('/homes/getTagsForSearch'); ?>
          <?php echo $this->Form->create(null, array('url' => array('controller' => 'ofertas', 'action' => 'search'))); ?>
					<div class="col-md-4 scolleft">
            <div class="w50percent">
                <? $count = 0;
                foreach ($tags as $tag) { ?> 
								<div class="radio">
								  <label>
                    <?
                    echo $form->input($tag['Tag']['name'], array(
                        'type' => 'radio',
                        'id' => "tag_".$tag['Tag']['id'],
                        'name' => "radio_options",
                        'options' => $tag['Tag']['name']
                    ));
                    ?>
								  </label>
								</div>
                
                <?= ($count == 7 ? '</div><div class="w50percentlast">' : '');?>
               <? $count++; } ?>
							</div>	
							
							<div class="clearfix"></div><br/>
							
							<!-- HOTELS TAB -->
							<div class="hotelstab">
								<div class="w50percentlast">	
									<div class="wh90percent textleft right">
										<div class="w50percent">
											<div class="wh90percent textleft left">
												<span class="opensans size13"><b>Adult</b></span>
												<select class="form-control mySelectBoxClass">
												  <option>1</option>
												  <option>2</option>
												  <option>3</option>
												  <option>4</option>
												  <option>5</option>
												</select>
											</div>
										</div>							
										<div class="w50percentlast">
											<div class="wh90percent textleft right">
											<span class="opensans size13"><b>Child</b></span>
												<select class="form-control mySelectBoxClass">
												  <option selected>0</option>
												  <option>1</option>
												  <option>2</option>
												  <option>3</option>
												  <option>4</option>
												  <option>5</option>
												</select>
											</div>
										</div>
									</div>
								</div>
                <div class="clearfix"></div>
                <br/>
								<span class="opensans size18">Where do you want to go?</span>
								<input type="text" class="form-control" placeholder="Greece">

								<? echo $this->Form->button(__("_BUSCAR", true), array('type'=>'submit', 'class'=>"btn-search3"));?>
							</div>
							<!-- END OF HOTELS TAB -->
						</div>
            <?php echo $this->Form->end(); ?>