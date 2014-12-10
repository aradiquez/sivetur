 <?=$javascript->link('funciones')?>
 <?=$javascript->link('fckeditor')?>

<div class="panel">
<h2>Editar:   <?= $form->value('Encuesta.name') ?>  </h2>
<?

$ref='edit/';

echo $form->create('Encuesta',array('action'=>$ref,'type' => 'file'));
echo $form->input('id',array('type'=>'hidden', 'value'=> $form->value('Encuesta.id')));

echo "<div class='required'>";
     echo $form->input('Encuesta.name', array('type' => 'text', 'label'=>'Nombre: <span style="color:red">*</span>'));
     
echo "</div>";

echo "<div id='wraper'>";
        echo "<div class='wraperContenedor'>";
            echo "<div class='opcional'>";
                 echo $form->input('Encuesta.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$Encuestas['Encuesta']['status'], 'empty'=>false));
            echo "</div>";
        echo "</div>";
      
echo "</div>";


echo $form->end('Actualizar');
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Eliminar', true), array('action'=>'delete', $form->value('Encuesta.id')), null, sprintf(__('Seguro que que desea eliminar el registro # %s?', true), $form->value('Encuesta.id'))); ?></li>
		<li><?php echo $html->link(__('Lista de Encuestas', true), array('action'=>'index'));?></li>
	</ul>
</div>


<?


echo "</div>";

?>