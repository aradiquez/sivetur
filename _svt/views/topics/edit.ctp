 <?=$javascript->link('funciones')?>
 <?=$javascript->link('fckeditor')?>

<div class="panel">
<h2>Editar:   <?= $form->value('Topic.name') ?>  </h2>
<?

$ref='edit/';

echo $form->create('Topic',array('action'=>$ref,'type' => 'file'));
echo $form->input('id',array('type'=>'hidden', 'value'=> $form->value('Topic.id')));

echo "<div class='required'>";
     echo $form->input('Topic.name', array('type' => 'text', 'label'=>'Nombre: <span style="color:red">*</span>'));
     
echo "</div>";

echo "<div id='wraper'>";
        echo "<div class='wraperContenedor'>";
            echo "<div class='opcional'>";
                 echo $form->input('Topic.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$Topics['Topic']['status'], 'empty'=>false));
            echo "</div>";
        echo "</div>";
      
echo "</div>";


echo $form->end('Actualizar');
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Eliminar', true), array('action'=>'delete', $form->value('Topic.id')), null, sprintf(__('Seguro que que desea eliminar el registro # %s?', true), $form->value('Topic.id'))); ?></li>
		<li><?php echo $html->link(__('Lista de Topicos', true), array('action'=>'index'));?></li>
	</ul>
</div>


<?


echo "</div>";

?>