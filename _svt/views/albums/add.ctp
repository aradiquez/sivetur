 <?=$javascript->link('funciones')?>
 <?=$javascript->link('ckeditor/ckeditor.js')?>

<div class="panel">
<h2><?php __('Agregar Album');?></h2>
<?

echo $form->create('Album',array('type'=>'file'));


echo "<div id='wraper'>";
		echo "<div class='wraperContenedor'>";
             echo "<div class='opcional'>";
                 echo $form->input('Album.category_id', array( 'type' => 'select','label'=>'Categoría:','options'=>$categoriaArray,'selected'=>$selectedCategoria, 'empty'=>false));
            echo "</div>";
        echo "</div>";

        echo "<div class='wraperContenedor'>";
            echo "<div class='opcional'>";
                 echo $form->input('Album.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false));
            echo "</div>";
        echo "</div>";

echo "</div><div style='clear:both;'></div>";

	echo "<div class='opcional'>";
     echo $form->input('Album.name', array('type' => 'text', 'label'=>'Nombre: <span style="color:red">*</span>','size' => '50','maxlength'=>'100'));
     
     	if(isset($err_reg_unico))
           echo $err_reg_unico;
     
echo "</div>";


     echo "<div style='clear:both;'></div><div class='opcional'>";
      echo "<span id='t4'>Caracteres permitidos.</span>";
        
        
        echo $form->input('Album.intro',array('type'=>'textarea','label'=>'Introduccion : <span style="color:red">*</span>','onkeyup'=> 'checkLen(this,"t4",255)','onkeydown'=> 'checkLen(this,"t4",255)','onfocus'=> 'quitaBlancos(this)','cols' => '50','rows' => '2'));
        
     echo "</div>";
    
    echo "<div class='requerid'>";
        echo $form->input('Album.details', array('type'=>'textarea', 'label'=>'Detalle: <span style="color:red">*</span><div style="clear:both;"></div> '));
        echo "<br/><br/><br/><br/>";
        echo $fck->load('Album/details');
     echo "</div>";


echo $form->end('Enviar');
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Lista de Albums', true), array('action'=>'index'));?></li>
	</ul>
</div>
<?
echo "</div>";

?>