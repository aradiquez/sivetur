 <?=$javascript->link('funciones')?>
 <?=$javascript->link('ckeditor/ckeditor.js')?>

<div class="panel">
<h2><?php __('Agregar Categoria');?></h2>
<?

echo $form->create('Category',array('type'=>'file'));

	echo "<div class='opcional'>";
     echo $form->input('Category.name', array('type' => 'text', 'label'=>'Nombre: <span style="color:red">*</span>','size' => '50','maxlength'=>'100'));
     
     	if(isset($err_reg_unico))
           echo $err_reg_unico;
     
echo "</div>";

echo "<div id='wraper'>";
        echo "<div class='wraperContenedor'>";
            echo "<div class='opcional'>";
                 echo $form->input('Category.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false));
            echo "</div>";
        echo "</div>";

echo "</div>";


     echo "<div style='clear:both;'></div><div class='opcional'>";
      echo "<span id='t4'>Caracteres permitidos.</span>";
        
        
        echo $form->input('Category.intro',array('type'=>'textarea','label'=>'Introduccion :  <span style="color:red">*</span>','onkeyup'=> 'checkLen(this,"t4",255)','onkeydown'=> 'checkLen(this,"t4",255)','onfocus'=> 'quitaBlancos(this)','cols' => '50','rows' => '2'));
        
     echo "</div>";
    
    echo "<div class='requerid'>";
        echo $form->input('Category.details', array('type'=>'textarea', 'label'=>'Detalle: <span style="color:red">*</span> <div style="clear:both;"></div> '));
        echo "<br/><br/><br/><br/>";
        echo $fck->load('Category/detail_e');
     echo "</div>";
     
echo $form->end('Enviar');
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Lista de Categorias', true), array('action'=>'index'));?></li>
	</ul>
</div>
<?
echo "</div>";

?>