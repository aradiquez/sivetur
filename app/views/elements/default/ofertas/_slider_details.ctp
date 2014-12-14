<!-- SLIDER -->
<div class="col-md-8 details-slider">
	<div id="c-carousel">
		<div id="wrapper">
			<div id="inner">
				<div id="caroufredsel_wrapper2">
					<div id="carousel">
            <? foreach ($photos as $people) {  ?>
              <?=$this->Html->image('../fotos/fix_img.php?i='.$people['name']."&amp;w=625&amp;h=388",  array('alt'=>$people['details'], 'title'=>$people['details']));?>
            <? } ?>		
					</div>
				</div>
				<div id="pager-wrapper">
					<div id="pager">
            <? foreach ($photos as $people) {  ?>
              <?=$this->Html->image('../fotos/fix_img.php?i='.$people['name']."&amp;w=120&amp;h=68",  array('width'=>"120", 'height'=> "68", 'alt'=>$people['details'], 'title'=>$people['details']));?>
            <? } ?>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<button id="prev_btn2" class="prev2"><?=$this->Html->image('spacer.png', array('alt'=>"", 'title'=>""));?></button>
			<button id="next_btn2" class="next2"><?=$this->Html->image('spacer.png', array('alt'=>"", 'title'=>""));?></button>		
	  </div>
  </div> <!-- /c-carousel -->
</div>
<!-- END OF SLIDER -->	