 <?=$javascript->link('funciones')?>
 <?=$javascript->link('fckeditor')?>

<div class="panel">
<h2>Editar:   <?= $form->value('Palabrasreservada.name') ?>  </h2>
<?

$ref='edit/';

echo $form->create('Palabrasreservada',array('action'=>$ref,'type' => 'file'));
echo $form->input('id',array('type'=>'hidden', 'value'=> $form->value('Palabrasreservada.id')));

echo "<div class='required'>";
     echo $form->input('Palabrasreservada.name', array('type' => 'text', 'label'=>'Nombre: <span style="color:red">*</span>'));
     
echo "</div>";

echo "<div id='wraper'>";
        echo "<div class='wraperContenedor'>";
            echo "<div class='opcional'>";
                 echo $form->input('Palabrasreservada.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$Palabrasreservadas['Palabrasreservada']['status'], 'empty'=>false));
            echo "</div>";
        echo "</div>";
      
echo "</div>";


echo $form->end('Actualizar');
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Eliminar', true), array('action'=>'delete', $form->value('Palabrasreservada.id')), null, sprintf(__('Seguro que que desea eliminar el registro # %s?', true), $form->value('Palabrasreservada.id'))); ?></li>
		<li><?php echo $html->link(__('Lista de Palabras reservadaos', true), array('action'=>'index'));?></li>
	</ul>
</div>


<?


echo "</div>";

?>