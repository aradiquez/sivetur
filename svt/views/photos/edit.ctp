<div class='panel'>
<? 
  echo $form->create('Photo', array('type' => 'file')); ?>
  <fieldset>
  <?  
  echo $form->input('id');
  echo "<br/><br/>";
  echo "Foto actual:<br/><br/>";
  echo "<a href='../../../fotos/{$form->value('name')}' data-footer='{$form->value('name')}' data-title='{$form->value('name')}' data-gallery=\"multiimages\" data-toggle=\"lightbox\"><img src='../../../fotos/img.php?i={$form->value('name')}&amp;w=250&amp;h=213' alt=''/></a>";    
  echo "<br/><br/>"; ?>
  
  <div class="input-group">
    <?= $this->Html->tag('span', 'Cambiar por :',array('class'=>"input-group-addon")); ?>
    <?=$form->input('Photo.name',array('type'=>'file','label'=>false, 'class' => 'form-control'));?>
  </div>
  <br/>
  <div class="input-group">
    <?= $this->Html->tag('span', 'Detalle de la foto:',array('class'=>"input-group-addon")); ?>
    <?=$form->input('Photo.details', array('type' => 'text', 'label'=>false, 'class' => 'form-control'));?>
  </div>
  <br/>
  <div class="input-group">
       <?= $this->Html->tag('span', 'Estado:',array('class'=>"input-group-addon")); ?>
       <?=$form->input('Photo.status', array( 'type' => 'select','label'=>false,'options'=>$estadoArray,'selected'=>$Photos['Photo']['status'], 'empty'=>false, 'class' => 'form-control'));?>
  </div>
  <br/>
  <?
  echo $form->input('Photo.generic_id', array('type' => 'hidden', 'value'=>$form->value('generic_id')));
  echo $form->input('Photo.key', array('type' => 'hidden', 'value'=>$form->value('key')));
  echo $form->input('Photo.nameant', array('type' => 'hidden', 'value'=>$form->value('name')));
  ?>
  <div class="input-group">    
      <?=$form->end(array('label' => 'Actualizar', 'class' => 'btn btn-primary btn-lg'));?>
  </div>
  </fieldset>
  <div style="clear: both;"></div>    
</div>
