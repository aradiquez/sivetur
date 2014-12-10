<?= $javascript->link('ckeditor/ckeditor.js')?>
<?= $javascript->link('funciones')?>

<div class="panel">
<h2>Editar :   <?= $form->value('Banner.name') ?>  </h2>
<?
//echo "-------(".Configure::read('Banner.name_i_required').")----------";

$ref='edit/';
if(isset($rc))
$ref='edit/'.$rc;
//enctype="multipart/form-data">

echo $form->create('Banner',array('action'=>$ref,'type' => 'file'));
echo $form->input('id');
echo "<div class='required'>";
echo $form->input('Banner.name', array('type' => 'text', 'label'=>'Nombre: <span>*</span> ','size'=>'50','maxlength'=>'50',));
echo "</div>";
 
echo "<div id='wraper'>";
        
        echo "<div class='misma-linea'>";
            echo "<div class='opcional'>";
                 echo $form->input('Banner.state', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$Banners['Banner']['state'], 'empty'=>false));
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
  $path='../../../fotos/';
	$path2='../../../fotos/';
    echo "<div class='row'>";
        echo "<div class='celd'>"; 
        	echo $form->input('Banner.banner',array('type'=>'file','label'=>'Banner :'));
        echo "</div>";  
     
        echo "<div class='celd'>";  
        	$banner=$Banners['Banner']['banner'];
			if (!empty($banner)){ 
				echo '<a href="'.$path2.$banner.'" target="_blank"><img src="'.$path.$banner.'"/></a>';
				echo $form->input('Banner.eliminar_photo',array('type'=>'checkbox','label'=>'Eliminar foto * ','id'=> 'checke'));
           		echo '<span class="peq">* Marcar esta casilla para eliminar la foto asociada.</span>';    
    		}else
		 		echo "No hay foto";
    	  	
		 		
    		echo $form->input('Banner.banner_a',array('type'=>'hidden','value'=>$banner));
        echo "</div>"; 
    echo "</div>";
           
           if(isset($msj_photo_error ))
             foreach($msj_photo_error as $ms ):
              pr($ms).'<br/>';
           endforeach;
    echo "</div>";
     
 
echo $form->end('Actualizar');
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Eliminar registro', true), array('action'=>'delete', $form->value('Banner.id')), null, sprintf(__('Seguro que que desea eliminar el registro # %s?', true), $form->value('Banner.id'))); ?></li>
		<li><?php echo $html->link(__('Lista de promociones', true), array('action'=>'index'));?></li>
	</ul>
</div>


<?


echo "</div>";

?>