  		<!-- FOOTER -->
		
  		<div class="footerbg sfix3">
  			<div class="container">		
  				<footer>
  					<div class="footer">
    					<? if (!empty($parametros['Params']['link_facebook'])) { ?><a href="<?=$parametros['Params']['link_facebook']?>" class="social1b"><?=$this->Html->image('icon-facebook.png',  array('alt'=>__('_TITULO', true)))?></a><? } ?>
    					<? if (!empty($parametros['Params']['link_twitter'])) { ?><a href="<?=$parametros['Params']['link_twitter']?>" class="social2b"><?=$this->Html->image('icon-twitter.png',  array('alt'=>__('_TITULO', true)))?></a><? } ?>
    					<? if (!empty($parametros['Params']['link_google'])) { ?><a href="<?=$parametros['Params']['link_google']?>" class="social3b"><?=$this->Html->image('icon-gplus.png',  array('alt'=>__('_TITULO', true)))?></a><? } ?>
    					<? if (!empty($parametros['Params']['link_youtube'])) { ?><a href="<?=$parametros['Params']['link_youtube']?>" class="social4b"><?=$this->Html->image('icon-youtube.png',  array('alt'=>__('_TITULO', true)))?></a><? } ?>
  						<br/><br/>
  						Copyright &copy; <?=date("Y")?> <a href="#">Sivetur S.A.</a> Todos los derechos reservados. <a href="http://www.sivetur.com">www.sivetur.com</a>
  						<br/><br/>
  						<a href="#top" id="gotop2" class="gotop"><?=$this->Html->image('spacer.png',  array('alt'=>"spacer"))?></a>
  					</div>
  				</footer>
  			</div>	
  		</div>