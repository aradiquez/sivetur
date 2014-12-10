<? 
echo $html->metatitle($colaborador['Colaboradore']['nombre']." | ".$seccion['Section']['title']." | ".__('_TITULO', true));

$this->set('SEOH1',$colaborador['Colaboradore']['nombre']." | ".$seccion['Section']['title']." | ".__('_TITULO', true).__('_INICIO', true));
	
echo $html->meta('keywords', $colaborador['Colaboradore']['nombre'].", ".$seccion['Section']['keyword'].__('_KEYWORDS', true), array('inline' => false))."\n";
	
echo $html->meta('description', $colaborador['Colaboradore']['nombre'].", ".$seccion['Section']['description'].__('_DESCRIPCION', true), array('inline' => false))."\n";
?>

		
		<div class="container mt25 offset-0">
			<!-- CONTENT -->
			<div class="col-md-12 pagecontainer2 offset-0">
				<div class="hpadding50c">
					<p class="lato size30 slim"><?=$colaborador['Colaboradore']['nombre']?></p>
					<p class="aboutarrow"></p>
				</div>
				<div class="line3"></div>
				
				<div class="hpadding50c">
					
					<p class="lato size22 slim textcenter">
					<?=$colaborador['Colaboradore']['departamento']?>
					</p>
					<br/>
					<div class="line3"></div>
					<br/>

					<!-- LEFT IMG -->
					<div class="cpdd01">
            <div class="colaborador_picture" style="float: left; margin: 5px;">
              <?= $this->Html->image( '../fotos/img.php?i='.$colaborador['FirstPhoto'][0]['name']."&amp;w=300&amp;h=300&amp;radius=0",  array('alt'=>$colaborador['FirstPhoto'][0]['details'], 'title'=>$colaborador['FirstPhoto'][0]['details'], 'class' => "fwimg"));?><br/><br/>
							<? if (!empty($colaborador['Colaboradore']['twitter'])) { ?><a href="<?=$colaborador['Colaboradore']['twitter']?>" data-placement="top" title="Twitter" class="left"><span class="socials-twitter "></span></a><? } ?>
							<? if (!empty($colaborador['Colaboradore']['facebook'])) { ?><a href="<?=$colaborador['Colaboradore']['facebook']?>" data-placement="top" title="Facebook" class="left"><span class="socials-facebook "></span></a><? } ?>
							<? if (!empty($colaborador['Colaboradore']['googleplus'])) { ?><a href="<?=$colaborador['Colaboradore']['googleplus']?>" data-placement="top" title="Google Plus" class="left"><span class="socials-gplus "></span></a><? } ?>
              <? if (!empty($colaborador['Colaboradore']['linkedin'])) { ?><a href="<?=$colaborador['Colaboradore']['linkedin']?>" data-placement="top" title="Linked In" class="left"><span class="socials-linkedin "></span></a><? } ?>
              <? if (!empty($colaborador['Colaboradore']['skype'])) { ?><a href="<?=$colaborador['Colaboradore']['skype']?>" data-placement="top" title="Skype" class="left"><span class="socials-skype "></span></a><? } ?>
            </div>
            <div class="opensans size13 grey">
							<?=$colaborador['Colaboradore']['detalle']?>
						</div>
            
					</div>
					<!-- END OF LEFT IMG -->
					<br/> <br/>
					<div class="line3"></div>
					<br/><br/>
          <?php echo $this->element("default/empresa/_photo_gallery", array('photos' => $colaborador['Photos']) ); ?>		
		      
					<div class="clearfix"></div>
					<br/><br/>
				</div>
			
			<div class="clearfix"></div><br/><br/>
			</div>
			<!-- END CONTENT -->			
			

			
		</div>    
    