<? echo  "<div class='panel'>"; 
 
 echo "<h2>Nuevo Tag</h2>";
 
    echo $form->create('Tag', array('type' => 'file'));
?> 
<?php echo $this->element("form_errors"); ?>

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
        <?php echo $html->link('Lista de tags', '/tags/index')?>
    </div>   
</div>