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
					<p class="lato size30 slim"><?=$seccion['Section']['title']?></p>
					<p class="aboutarrow"></p>
				</div>
				<div class="line3"></div>
				
				<div class="hpadding50c">
					
					<p class="lato size22 slim textcenter">
					En nuestra página web, encontrará todo lo necesario programar su próximo viaje<br/>
          además le ofrecemos tiquetes aéreos, hoteles, alquiler de autos, turismo nacional y mucho mas.
					</p>
					<br/>
					<div class="line3"></div>
					<br/>

					<!-- LEFT IMG -->
					<div class="cpdd01">
            <div class="col-md-8" style="float: left; margin: 5px;">
              <?= $this->Html->image( '../fotos/img.php?i='.$seccion['FirstPhoto'][0]['name']."&amp;w=677&amp;h=600&amp;radius=0",  array('alt'=>$seccion['FirstPhoto'][0]['details'], 'title'=>$seccion['FirstPhoto'][0]['details'], 'class' => "fwimg"));?>
            </div>
            <div class="opensans size13 grey">
							<?=$seccion['Section']['text']?>
						</div>
            
					</div>
					<!-- END OF LEFT IMG -->
					
		
					<div class="clearfix"></div>
					<br/><br/>
					
				
					<span class="lato size18 dark bold">Colaboradores</span><br/><br/>
					<? if (!empty($colaboradores)) { $cont = 1;?>
            <? foreach ($colaboradores as $people) {  ?>
    					<div class="col-md-4">
    						<div class="abover ohidden">
    							<div class="abbg">
    								<div class="socials-container">
    									<? if (!empty($people['Colaboradore']['twitter'])) { ?><a href="<?=$people['Colaboradore']['twitter']?>" data-placement="top" title="Twitter" class="left"><span class="socials-twitter "></span></a><? } ?>
    									<? if (!empty($people['Colaboradore']['facebook'])) { ?><a href="<?=$people['Colaboradore']['facebook']?>" data-placement="top" title="Facebook" class="left"><span class="socials-facebook "></span></a><? } ?>
    									<? if (!empty($people['Colaboradore']['googleplus'])) { ?><a href="<?=$people['Colaboradore']['googleplus']?>" data-placement="top" title="Google Plus" class="left"><span class="socials-gplus "></span></a><? } ?>
                      <? if (!empty($people['Colaboradore']['linkedin'])) { ?><a href="<?=$people['Colaboradore']['linkedin']?>" data-placement="top" title="Linked In" class="left"><span class="socials-linkedin "></span></a><? } ?>
                      <? if (!empty($people['Colaboradore']['skype'])) { ?><a href="<?=$people['Colaboradore']['skype']?>" data-placement="top" title="Skype" class="left"><span class="socials-skype "></span></a><? } ?>
    								</div>
    							</div>
    							<? if (!empty($people['FirstPhoto'][0]['name'])) { ?> 
                    <?=$this->Html->image( '../fotos/fix_img.php?i='.$people['FirstPhoto'][0]['name']."&amp;w=316&amp;h=200",  array('alt'=>$people['FirstPhoto'][0]['details'], 'title'=>$people['FirstPhoto'][0]['details'], 'class' => "fwimg"));?>
                    <? } else { ?>
                      <img src='img/thumb-img.jpg' width="316" height='200' alt='no foto' />
                    <? } ?>
    						</div>
    						<p class="lato lh2 mt10"><strong><?=$html->link($people['Colaboradore']['nombre'], array('controller' => 'empresa', 'action' => 'colaborador', $people['Colaboradore']['id'], slug($people['Colaboradore']['nombre'])))?></strong><br/>
    						<?=$people['Colaboradore']['departamento']?>
    						</p>
    					</div> 
              <?=(($cont % 3 == 0) ? '<br/><br/><div class="clearfix"></div><br/><br/>' : '')?> 		
            <? $cont++;} ?>
          <? } ?>
					<div class="clearfix"></div>
					
					<br/> <br/>
					<div class="line3"></div>
					<br/><br/>
				</div>
			
			<div class="clearfix"></div><br/><br/>
			</div>
			<!-- END CONTENT -->			
			

			
		</div>    
    