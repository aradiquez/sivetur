 <?=$javascript->link('funciones')?>
 <?=$javascript->link('fckeditor')?>

<div class="panel">
<h2><?php __('Agregar Palabra reservada');?></h2>
<?

echo $form->create('Palabrasreservada',array('type'=>'file'));

echo "<div class='opcional'>";
     echo $form->input('Palabrasreservada.name', array('type' => 'text', 'label'=>'Nombre: <span style="color:red">*</span>'));
     
     	if(isset($err_reg_unico))
           echo $err_reg_unico;
     
echo "</div>";

echo "<div id='wraper'>";
        echo "<div class='wraperContenedor'>";
            echo "<div class='opcional'>";
                 echo $form->input('Palabrasreservada.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false));
            echo "</div>";
        echo "</div>";

echo "</div>";


echo $form->end('Enviar');
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Lista de Palabras reservadas', true), array('action'=>'index'));?></li>
	</ul>
</div>
<?
echo "</div>";

?>