 <?=$javascript->link('funciones')?>
 <?=$javascript->link('fckeditor')?>

<div class="panel">
<h2>Editar:   <?= $form->value('Opcione.name') ?>  </h2>
<?

$ref='edit/'.$form->value('Opcione.encuesta_id');

echo $form->create('Opcione',array('action'=>$ref,'type' => 'file'));
echo $form->input('id',array('type'=>'hidden', 'value'=> $form->value('Opcione.id')));
echo $form->input('encuesta_id',array('type'=>'hidden', 'value'=> $form->value('Opcione.encuesta_id')));

echo "<div class='required'>";
     echo $form->input('Opcione.name', array('type' => 'text', 'label'=>'Nombre: <span style="color:red">*</span>'));
     
echo "</div>";

echo "<div id='wraper'>";
        echo "<div class='wraperContenedor'>";
            echo "<div class='opcional'>";
                 echo $form->input('Opcione.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$Opciones['Opcione']['status'], 'empty'=>false));
            echo "</div>";
        echo "</div>";
      
echo "</div>";


echo $form->end('Actualizar');
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Eliminar', true), array('action'=>'delete', $form->value('Opcione.id')), null, sprintf(__('Seguro que que desea eliminar el registro # %s?', true), $form->value('Opcione.id'))); ?></li>
		<li><?php echo $html->link(__('Lista de Opciones', true), array('action'=>'index'));?></li>
	</ul>
</div>


<?


echo "</div>";

?>