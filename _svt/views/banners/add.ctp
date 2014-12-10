<?= $javascript->link('ckeditor/ckeditor.js')?>
<?= $javascript->link('funciones')?>

<div class="panel">
<h2><?php __('Agregar Banner');?></h2>
<?
echo $form->create('Offer.',array('type' => 'file'));
  
echo "<div class='required'>";
echo $form->input('Banner.name', array('type' => 'text', 'label'=>'Nombre: <span>*</span> ','size'=>'50','maxlength'=>'50',));
echo "</div>";
 
echo "<div id='wraper'>";
        
        echo "<div class='misma-linea'>";
            echo "<div class='opcional'>";
                 echo $form->input('Banner.state', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>null, 'empty'=>false));
            echo "</div>";
        echo "</div>";
        
        echo "<div class='misma-linea'>";
            echo "<div class='opcional'>";
                 echo $form->input('Banner.tipo', array( 'type' => 'select','label'=>'Tipo:','options'=>$tipoArray,'selected'=>$selectedTipo, 'empty'=>false));
            echo "</div>";
        echo "</div>";
        
        echo "<div class='wraperContenedor'>";
            echo "<div class='opcional'>";
           		echo $form->input('Banner.web', array('type' => 'text', 'label'=>'Direccion web:','size'=>'50','maxlength'=>'148'));
        	echo "</div>";
      	echo "</div>";
echo "</div>";
 
echo "<div class='opcional'>";
        echo $form->input('Banner.details', array('type'=>'textarea', 'label'=>'Descripcion: <div style="clear:both;"></div>'));
        echo "<br/><br/><br/><br/>";
        echo $fck->load('Banner/details');
     echo "</div>";
    
  echo "<div class='opcional'>";
    echo "<div class='row'>";
        echo "<div class='celd'>"; 
        	echo $form->input('Banner.banner',array('type'=>'file','label'=>'Banner :'));
        echo "</div>";  
    echo "</div>";
           
           if(isset($msj_photo_error ))
             foreach($msj_photo_error as $ms ):
              pr($ms).'<br/>';
           endforeach;
    echo "</div>";

echo $form->end('Enviar');
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Lista de Promociones', true), array('action'=>'index'));?></li>
	</ul>
</div>
<?
echo "</div>";

?>