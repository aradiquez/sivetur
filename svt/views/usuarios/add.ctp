 <?=$javascript->link('funciones')?>
 <?=$javascript->link('fckeditor')?>


 <? echo  "<div class='panel'>"; 
 
 echo "<h2>Nuevo Usuario</h2>";
 
    echo $form->create('Usuario', array('type' => 'file'));
?> 
<?php echo $this->element("form_errors"); ?>

<fieldset>
    <div class="input-group">
        <?= $this->Html->tag('span', 'Nombre: <span style="color:red">*</span>',array('class'=>"input-group-addon")); ?>
        <?=$form->input('Usuario.nombre', array('type' => 'text', 'label'=> false,'size' => '35','maxlength'=>'100','class'=>"form-control"))?>
    </div>
    <br/>
    <div class="input-group">
        <?= $this->Html->tag('span', 'Username: <span style="color:red">*</span>',array('class'=>"input-group-addon")); ?>
        <?=$form->input('Usuario.usuario', array('type' => 'text', 'label'=>false,'size' => '25','maxlength'=>'50','class'=>"form-control"))?>
    </div>
    <br/>
    <div class="input-group">
        <?= $this->Html->tag('span', utf8_encode('Contraseña: <span style="color:red">*</span>'),array('class'=>"input-group-addon")); ?>
        <?=$form->input('Usuario.clave', array('type' => 'password', 'label'=>false,'size' =>20,'maxlength'=>150,'class'=>"form-control")); ?>
    </div>
    <br/>
    <div class="input-group">
        <?= $this->Html->tag('span', utf8_encode('Repita la Contraseña: <span style="color:red">*</span>'),array('class'=>"input-group-addon")); ?>
         <?=$form->input('Usuario.clave_confirm', array('type' => 'password', 'label'=>false,'size' =>20,'maxlength'=>150,'class'=>"form-control")); ?>
    </div>
    <br/>
    <div class="input-group">
         <?= $this->Html->tag('span', 'Estado:',array('class'=>"input-group-addon")); ?>
         <?=$form->input('Usuario.estado',  array( 'type' => 'select','label'=>false,'options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false,'class'=>"form-control"));?>
    </div>
    <br/>
    <div class="input-group">
        <?= $this->Html->tag('span', 'Perfil:',array('class'=>"input-group-addon")); ?>
        <?=$form->input('Usuario.perfil', array( 'type' => 'select','label'=>false,'options'=>$perfilArray,'selected'=>$selectedPerfil, 'empty'=>false,'class'=>"form-control"));?>
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

<div class="well fieldset">
	<h3>Perfiles:</h3>
	<p><b>Administrador</b> = Puede crear, modificar o eliminar usuarios.</p>
	<p><b>Mantenimiento</b> = Puede realizar todas las funciones habituales, exepto ver usuarios.</p>
	<p><b>Digitador</b> = Puede modificar en ingresar registros no puede eliminar.</p>
	<p><b>Editador</b> = Solo puede modificar registros.</p>
</div> 
    <div style="clear: both;"></div>
    <br/>
    <hr/>
    <div class="optional">   
        <?php echo $html->link('Lista de usuarios', '/usuarios/index')?>
    </div>   
</div>