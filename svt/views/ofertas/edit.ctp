<?= $javascript->link('ckeditor/ckeditor.js')?>
<h2>Editar Oferta:</h2>
<?
$ref='edit/';
echo $form->create('Oferta',array('action'=>$ref,'type'=>'file'));
echo $form->input('id', array('type'=>'hidden', 'value'=> $form->value('Oferta.id')));

?>
<fieldset>
    <div class="input-group">
         <?= $this->Html->tag('span', 'Parent:',array('class'=>"input-group-addon")); ?>
         <?= $tree->createSelectRelated('Oferta/programacircuito_id/ProgramasCircuito/name/id', $ProgramaCircuitoArray, $form->value('Oferta.programacircuito_id'));?>
    </div>
    <br/>
    <div class="input-group">
        <?= $this->Html->tag('span', 'Nombre: <span style="color:red">*</span>',array('class'=>"input-group-addon")); ?>
        <?=$form->input('Oferta.name', array('type' => 'text', 'label'=> false,'size' => '35','maxlength'=>'100','class'=>"form-control"))?>
    </div>
    <br/>
    <div class="input-group">
        <?= $this->Html->tag('span', 'introducci&oacute;n: <span style="color:red">*</span>',array('class'=>"input-group-addon")); ?>
        <?=$form->input('Oferta.introduccion', array('type' => 'text', 'label'=> false,'size' => '35','maxlength'=>'255','class'=>"form-control"))?>
    </div>
    <br/>
  	<div class='require'>
  		  <?=$form->label("Oferta.detalle", 'Informaci&oacute;n: <div style="clear:both;"></div>');?>
  	   	<br/><div style='clear: both;'></div>
  	   	<?=$form->input('Oferta.detalle', array('type' => 'textarea', 'label'=>'','size'=>'50','maxlength'=>'250'));?>
  	   	<?=$fck->load('Oferta/detalle');?>
  	</div>
    <br/>
  	<div class='input-group'>
  	    <?=$form->input('Oferta.start_date', array('type' => 'text', 'label'=>'Fecha de inicio: ','size'=>'10','maxlength'=>'10', 'class' => 'datepicker form-control'));?>
  	</div>
    <br/>
  	<div class='input-group'>
  	    <?=$form->input('Oferta.end_date', array('type' => 'text', 'label'=>'Fecha de inicio: ','size'=>'10','maxlength'=>'10', 'class' => 'datepicker form-control'));?>
  	</div>
    <br/>
  	<div class='input-group'>
  	    <?=$form->input('Oferta.precio', array('type' => 'text', 'label'=>'Precio: ','size'=>'10','maxlength'=>'10', 'class' => 'form-control', 'placeholder' => 'US $'));?>
  	</div>
    <br/>
    <div class="input-group">
         <?= $this->Html->tag('span', 'Estado:',array('class'=>"input-group-addon")); ?>
         <?=$form->input('Oferta.estado',  array( 'type' => 'select','label'=>false,'options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false,'class'=>"form-control"));?>
    </div>
    <br/>
    <div class="input-group">
         <?= $this->Html->tag('span', 'Prioridad:',array('class'=>"input-group-addon")); ?>
         <?=$form->input('Oferta.prioridad',  array( 'type' => 'select','label'=>false,'options'=>$prioridadArray,'selected'=>$selectedPrioridad, 'empty'=>false, 'class'=>"form-control"));?>
    </div>
    <br/>
    <div class="optional">
      <label for="">Servicios Generales:</label>
    </div>
    <div id="input-group">
      	<? echo $form->input('Tag',array(
              'label' => false,
              'type' => 'select',
              'multiple' => 'checkbox',
              'options' => $Tags,
              'selected' => $html->value('Tag.Tag'),
          ));
          ?>
    </div>
    <br/>
  <div style="clear: both;"></div>
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
    <?php echo $html->link('Lista de ofertas', '/index')?>
 </div>   

</div>