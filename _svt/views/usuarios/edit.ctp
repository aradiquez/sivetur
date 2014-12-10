<div class="panel">
<h2>Editar Usuario:</h2>
<?
echo $javascript->link('fckeditor');
echo $javascript->link('funciones');

$ref='edit/';

echo $form->create('Usuario',array('action'=>$ref,'type'=>'file'));
echo $form->input('id', array('type'=>'hidden', 'value'=> $form->value('Usuario.id')));

if(isset($error)){
    pr($error);
} 
?>

<div class="required">
    <?=$form->input('Usuario.nombre', array('type' => 'text', 'label'=>'Nombre: <span style="color:red">*</span>','size' => '35','maxlength'=>'100'))?>
</div>

<div class="required">
   <?=$form->input('Usuario.usuario', array('type' => 'text', 'label'=>'Username: <span style="color:red">*</span>','size' => '25','maxlength'=>'50'))?>
</div>

<div class="required">
	<?=$form->input('Usuario.clave', array('type' => 'password', 'label'=>utf8_encode('Contraseña: <span style="color:red">*</span>'),'size' =>20,'maxlength'=>150)); ?>
</div>

<div class="required">
	 <?=$form->input('Usuario.clave_confirm', array('type' => 'password', 'label'=>utf8_encode('Repita la Contraseña: <span style="color:red">*</span>'),'size' =>20,'maxlength'=>150)); ?>
</div>

<div class="optional">
	 <?=$form->input('Usuario.estado',  array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false));?>
</div>
<div class="optional">
	<?=$form->input('Usuario.perfil', array( 'type' => 'select','label'=>'Perfil:','options'=>$perfilArray,'selected'=>$selectedPerfil, 'empty'=>false));?>
</div>
    
<div class='optional'>
	<font color=\"#FF0000\"><strong>*</strong></font>Indica que la informaci&oacute;n del campo es requerida.
</div>  

<div class="submit">    
	<?=$form->end('Actualizar');?>
</div>

<div class="optional"> 
	Perfiles:
	<p><b>Administrador</b> = Puede crear, modificar o eliminar usuarios.</p>
	<p><b>Mantenimiento</b> = Puede realizar todas las funciones habituales, exepto ver usuarios.</p>
	<p><b>Digitador</b> = Puede modificar en ingresar registros no puede eliminar.</p>
	<p><b>Editador</b> = Solo puede modificar registros.</p>
</div>

<div class="optional">   
    <?php echo $html->link('Lista de usuarios', '/index')?>
 </div>   
</form>
</div>