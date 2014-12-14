
<div class="aditional_photos">
	<? if (!empty($photos)) { $cont = 1;?>
    <? foreach ($photos as $people) {  ?>
			<div class="col-md-4">
					<? if (!empty($people['name'])) { ?> 
            <?=$html->link($this->Html->image('../fotos/img.php?i='.$people['name']."&amp;w=200&amp;h=190",  array('alt'=>$people['details'], 'title'=>$people['details'])), "../fotos/".$people['name'], array('data-footer'=> "".$people['details'], 'data-title' => "".$people['details'], 'data-gallery' => "multiimages", 'data-toggle'=>"lightbox", 'escape' => false) );?>
          <? } else { ?>
              <img src='img/thumb-img.jpg' width="316" height='200' alt='no foto' />
          <? } ?>
			</div> 
      <?=(($cont % 3 == 0) ? '<br/><br/><div class="clearfix"></div><br/><br/>' : '')?> 		
    <? $cont++;} ?>
  <? } ?>
	<div class="clearfix"></div>
</div>