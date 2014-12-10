 <?=$javascript->link('funciones')?>
 <?=$javascript->link('ckeditor/ckeditor.js')?>

<div class="panel">
<!--<h2><?php //__('Agregar Informacion');?></h2>-->
<?
if(!empty($ruta)){ ?>
	<h2><?=__('Agregar Informacion de la empresa en la ruta:')?>
	<?
	foreach($ruta as $fmse){
		echo " <strong>".$fmse['Empresa']['name']."</strong> => ";
	}?>
	</h2> 
	<?
} else { ?>
	<h2><?=__('Agregar Informacion')?></h2><?
}
//echo "-------(".Configure::read('Empresa.Nombre_i_required').")----------";

//echo $form->create('Empresa');
echo $form->create('Empresa',array('type'=>'file'));
echo $form->input('Empresa.parent_id', array( 'type' => 'hidden','value'=>$reg));

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
        echo $form->input('Empresa.details', array('type'=>'textarea', 'label'=>'Detalles: <span style="color:red">*</span> <div style="clear:both;"></div> '));
        echo "<br/><br/><br/><br/>";
        echo $fck->load('Empresa/details');
     echo "</div>";


echo $form->end('Enviar');
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Lista de Empresas', true), array('action'=>'index'));?></li>
	</ul>
</div>
<?
echo "</div>";

?>