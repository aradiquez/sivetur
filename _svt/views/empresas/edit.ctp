 <?=$javascript->link('funciones')?>
<?=$javascript->link('ckeditor/ckeditor.js')?>

<div class="panel">
<h2>Editar :   <?= $form->value('Empresa.name') ?>  </h2>
<?

$ref='edit/';

echo $form->create('Empresa',array('action'=>$ref,'type' => 'file'));
echo $form->input('Empresa.id',array('type'=>'hidden', 'value'=> $form->value('Empresa.id')));

//echo $form->input('Empresa.parent_id', array( 'type' => 'hidden','value'=>$reg));

echo "<div class='opcional'>";
     echo $form->input('Empresa.name', array('type' => 'text', 'label'=>'Nombre: <span style="color:red">*</span>', 'size' => '50', 'maxlength'=>'100'));
echo "</div>";
  

echo "<div id='wraper'>";
        echo "<div class='wraperContenedor'>";
            echo "<div class='opcional'>";
                 echo $form->input('Empresa.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false));
            echo "</div>";
        echo "</div>";
echo "</div>";
    
    
echo "<div style='clear:both;'></div><div class='opcional'>";
      echo "<span id='t4'>Caracteres permitidos.</span>";
        
        
        echo $form->input('Empresa.intro',array('type'=>'textarea','label'=>'Introduccion : <span style="color:red">*</span>','onkeyup'=> 'checkLen(this,"t4",255)','onkeydown'=> 'checkLen(this,"t4",255)','onfocus'=> 'quitaBlancos(this)','cols' => '50','rows' => '2'));
        
     echo "</div>";
    
    echo "<div class='requerid'>";
        echo $form->input('Empresa.details', array('type'=>'textarea', 'label'=>'Detalles:  <span style="color:red">*</span><div style="clear:both;"></div> '));
        echo "<br/><br/><br/><br/>";
        echo $fck->load('Empresa/details');
     echo "</div>";


echo $form->end('Actualizar');
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Eliminar', true), array('action'=>'delete', $form->value('Empresa.id')), null, sprintf(__('Seguro que que desea eliminar el registro # %s?', true), $form->value('Empresa.id'))); ?></li>
		<li><?php echo $html->link(__('Lista de Empresas', true), array('action'=>'index'));?></li>
	</ul>
</div>


<?


echo "</div>";

?>