 <?=$javascript->link('funciones')?>
 <?=$javascript->link('ckeditor/ckeditor.js')?>

<div class="panel">
<h2><?php __('Agregar Comentario');?></h2>
<?

echo $form->create('Comment',array('type'=>'file'));

	echo "<div class='opcional'>";
     echo $form->input('Comment.name', array('type' => 'text', 'label'=>'Nombre: <span style="color:red">*</span>','size' => '50','maxlength'=>'100'));
	echo "</div>";
	
	echo "<div class='opcional'>";
     echo $form->input('Comment.direccion', array('type' => 'text', 'label'=>'Dirección: <span style="color:red">*</span>','size' => '50','maxlength'=>'100'));
	echo "</div>";
	
	echo "<div class='opcional'>";
     echo $form->input('Comment.email', array('type' => 'text', 'label'=>'Email: ','size' => '50','maxlength'=>'100'));
	echo "</div>";

	echo "<div id='wraper'>";
	        echo "<div class='wraperContenedor'>";
	            echo "<div class='opcional'>";
	                 echo $form->input('Comment.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false));
	            echo "</div>";
	        echo "</div>";
	        
	        echo "<div class='wraperContenedor'>";
	            echo "<div class='opcional'>";
	                 echo $form->input('Comment.idioma', array( 'type' => 'select','label'=>'Idioma:','options'=>$IdiomaArray,'selected'=>$selectedIdioma, 'empty'=>false));
	            echo "</div>";
	        echo "</div>";
	echo "</div>";

    echo "<div class='requerid'>";
        echo $form->input('Comment.details', array('type'=>'textarea', 'label'=>'Comentario: <span style="color:red">*</span> <div style="clear:both;"></div> '));
        echo "<br/><br/><br/><br/>";
        echo $fck->load('Comment/details');
     echo "</div>";


echo $form->end('Enviar');
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Lista de Comentarios', true), array('action'=>'index'));?></li>
	</ul>
</div>
<?
echo "</div>";

?>