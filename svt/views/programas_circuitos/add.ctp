 <?=$javascript->link('funciones')?>
<?= $javascript->link('ckeditor/ckeditor.js')?>

 <? echo  "<div class='panel'>"; 
 
 echo "<h2>Nuevo Programa y Circuito</h2>";
 
    echo $form->create('ProgramasCircuito', array('type' => 'file'));
?> 
    <?php echo $this->element("form_errors"); ?>

<fieldset>
    <div class="input-group">
         <?= $this->Html->tag('span', 'Parent:',array('class'=>"input-group-addon")); ?>
         <?= $tree->createSelect('ProgramasCircuito/name/id', $parentArray);?>
    </div>
    <br/>
    <div class="input-group">
        <?= $this->Html->tag('span', 'Nombre: <span style="color:red">*</span>',array('class'=>"input-group-addon")); ?>
        <?=$form->input('ProgramasCircuito.name', array('type' => 'text', 'label'=> false,'size' => '35','maxlength'=>'100','class'=>"form-control"))?>
    </div>
    <br/>
    <div class="input-group">
        <?= $this->Html->tag('span', 'Introducci&oacute;n: <span style="color:red">*</span>',array('class'=>"input-group-addon")); ?>
        <?=$form->input('ProgramasCircuito.introduccion', array('type' => 'text', 'label'=>false,'size' => '25','maxlength'=>'255','class'=>"form-control"))?>
    </div>
    <br/>
    <div class="input-group">
        <?= $this->Html->tag('label', utf8_encode('Detalle: <span style="color:red">*</span>')); ?>
        <?=$form->input('ProgramasCircuito.detalle', array('type' => 'textarea', 'label'=>false,'size'=>'50', 'rows' => '20','maxlength'=>'250')); ?>
        <?=$fck->load('ProgramasCircuito/detalle'); ?>
    </div>
    <br/>
    <div class="input-group">
         <?= $this->Html->tag('span', 'Estado:',array('class'=>"input-group-addon")); ?>
         <?=$form->input('ProgramasCircuito.estado',  array( 'type' => 'select','label'=>false,'options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false,'class'=>"form-control"));?>
    </div>
    <br/>
    <div class='input-group'>
        <span style="color:red"><strong>*</strong></span>  Indica que la informaci&oacute;n del campo es requerida.
    </div>      
    <br/>
    <div class="input-group">    
        <?=$form->end(array('label' => 'Guardar', 'class' => 'btn btn-primary btn-lg'));?>
    </div>
</fieldset>    

    <div style="clear: both;"></div>
    <br/>
    <hr/>
    <div class="optional">   
        <?php echo $html->link('Lista de programas y circuitos', '/programas_circuitos/index')?>
    </div>   
</div>