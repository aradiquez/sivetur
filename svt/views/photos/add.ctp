<div class='panel'>
<?  
 echo $form->create('Photo', array('type' => 'file'));
 echo $form->input('Photo.generic_id', array('type' => 'hidden', 'value'=>$generic_id));
 echo $form->input('Photo.key', array('type' => 'hidden', 'value'=>$key));
 
for($i=1;$i<=5;$i++){ ?>
  <div class="input-group">
    <?= $this->Html->tag('span', 'Foto '.$i,array('class'=>"input-group-addon")); ?>
    <?=$form->input('Photo.foto'.$i,array('type'=>'file','label'=>false, 'class' => 'form-control'));?>
  </div>
  <br/>
  <div class="input-group">
    <?= $this->Html->tag('span', 'Texto foto '.$i,array('class'=>"input-group-addon")); ?>
    <?=$form->input('Photo.details'.$i, array('type' => 'text', 'label'=>false, 'class' => 'form-control'));?>
  </div>
  <br/>
<? } echo $form->input('Photo.status', array('type' => 'hidden', 'value'=>'A')); ?>
  <div class="input-group">    
      <?=$form->end(array('label' => 'Guardar', 'class' => 'btn btn-primary btn-lg'));?>
  </div>
</div>