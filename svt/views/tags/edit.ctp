<h2>Editar Tag:</h2>
<?
$ref='edit/';
echo $form->create('Tag',array('action'=>$ref,'type'=>'file'));
echo $form->input('id', array('type'=>'hidden', 'value'=> $form->value('Tag.id')));

?>
<fieldset>
	<div class="input-group">
		<?= $this->Html->tag('span', 'Nombre: <span style="color:red">*</span>',array('class'=>"input-group-addon")); ?>
	    <?=$form->input('Tag.name', array('type' => 'text', 'label'=> false,'size' => '35','maxlength'=>'100','class'=>"form-control"))?>
	</div>
	<br/>
	<div class="input-group">
		 <?= $this->Html->tag('span', 'Estado:',array('class'=>"input-group-addon")); ?>
		 <?=$form->input('Tag.estado',  array( 'type' => 'select','label'=>false,'options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false,'class'=>"form-control"));?>
	</div>
	<br/>
	<div class='input-group'>
		<span style="color:red"><strong>*</strong></span>Indica que la informaci&oacute;n del campo es requerida.
	</div>  	
	<br/>
	<div class="input-group">    
		<?=$form->end(array('label' => 'Actualizar', 'class' => 'btn btn-primary btn-lg'));?>
	</div>
</fieldset>    

<br/>
<div style="clear: both;"></div>
 <div class="optional">   
    <?php echo $html->link('Lista de tags', '/index')?>
 </div>   

</div>