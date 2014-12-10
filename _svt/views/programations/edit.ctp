<? 
	if($error)
 	{
		echo "<div class='curvacaja'>";
		echo $html->image('error.png',array("alt"=>"", "title"=>"","class"=>"icono"));
		echo "&nbsp;<strong>Hay errores en los datos ingresados.Por favor corrija lo que se indica a continuación.</strong>";
		echo"</div>";
	}
?>
<div class="panel">
<h2>Modificando Programation</h2>
<?
	$path='../../../fotos/';
	$path2='../../../fotos/';
	echo $javascript->link('ckeditor/ckeditor.js');
	echo $javascript->link('funciones');
	//$ref='/Programations/edit/'.$html->tagValue('Programation/id');

$ref='edit/';
if(isset($rc))
$ref='edit/'.$rc;
//enctype="multipart/form-data">

echo $form->create('Programation',array('action'=>$ref,'enctype'=>'multipart/form-data'));	
 echo $form->input('id');
	
 
echo "<div class='requerid'>";
     echo $form->input('Programation.name', array('type' => 'text', 'label'=>'Nombre : <span style="color:red">*</span>','size' => '50','maxlength'=>'100'));
echo "</div>";

echo "<div id='wraper'>";
        echo "<div class='wraperContenedor'>";
	    	echo "<div class='opcional'>";
                 echo $form->input('Programation.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false));
            echo "</div>";
        
        echo "<div class='wraperContenedor'>";
	            echo "<div class='opcional'>";
	            	echo $form->label("Programation.hour", "Horario: ", null);
	            	echo $form->hour("Programation.hour", false, $selectedHora, null, false);
	            echo "</div>";
            echo "</div>";
            
            echo "<div class='wraperContenedor'>";
	            echo "<div class='opcional'>";
	            	echo $form->minute("Programation.min", $selectedMinuto, null, false);
	            echo "</div>";
            echo "</div>";
            
             echo "<div class='wraperContenedor'>";
	            echo "<div class='opcional'>";
	            	echo $form->meridian("Programation.meridian", null, null, false);
	            echo "</div>";
            echo "</div>";        
        	echo "</div>";
        	
        echo "<div class='wraperContenedor'>";
        	echo "<strong>D&iacute;as de Transmisi&oacute;n:</strong> ";
    		echo "<div class='opcional'>";
    			echo $form->input('Programation.lunes',array('type'=>'checkbox','label'=>'Lunes ','id'=> 'checke'));
            	echo $form->input('Programation.martes',array('type'=>'checkbox','label'=>'Martes ','id'=> 'checke'));
            	echo $form->input('Programation.miercoles',array('type'=>'checkbox','label'=>'Miercoles ','id'=> 'checke'));
            	echo $form->input('Programation.jueves',array('type'=>'checkbox','label'=>'Jueves ','id'=> 'checke'));
            	echo $form->input('Programation.viernes',array('type'=>'checkbox','label'=>'Viernes ','id'=> 'checke'));
            	echo $form->input('Programation.sabado',array('type'=>'checkbox','label'=>'S&aacute;bado ','id'=> 'checke'));
            	echo $form->input('Programation.domingo',array('type'=>'checkbox','label'=>'Domingo ','id'=> 'checke'));
            echo "</div>";
        echo "</div>";
        
echo "</div>";
    
     echo "<div style='clear:both;'></div><div class='opcional'>";
      echo "<span id='t4'>Caracteres permitidos.</span>";
        
        
        echo $form->input('Programation.intro',array('type'=>'textarea','label'=>'Introduccion: <span style="color:red">*</span>','onkeyup'=> 'checkLen(this,"t4",255)','onkeydown'=> 'checkLen(this,"t4",255)','onfocus'=> 'quitaBlancos(this)','cols' => '50','rows' => '2'));
        
     echo "</div>";
     
     echo "<div class='requerid'>";
        echo $form->input('Programation.details', array('type'=>'textarea', 'label'=>'Detalle: <span style="color:red">*</span><div style="clear:both;"></div> '));
        echo "<br/><br/><br/><br/>";
        echo $fck->load('Programation/details');
     echo "</div>";

    /*
    FOTOS
    */

	$mensaje='msj_photo_error';
		
		if(isset($$mensaje))
		             foreach($$mensaje as $ms ):
		                 pr($ms).'<br/>';
		           endforeach;
	
 echo "<hr><br/><br/>";    
 
	echo "<center>";
	echo "Foto actual:<br/><br/>";
	echo "<img src='".$path.$Programations['Programation']['foto']."' width='150'/>";
	echo "</center>";
	echo "<br/><br/>";
	 echo $form->input('Programation.eliminar_foto',array('type'=>'checkbox','label'=>'Eliminar foto ','id'=> 'checke'));
	 echo"<br/>";
	 echo $form->input('Programation.foto_a',array('type'=>'hidden','value' => $Programations['Programation']['foto']));
	 echo "<div class='opcional'>";    
	 echo $form->input('Programation.foto',array('type'=>'file','label'=>'Foto:'));
	 echo "</div>";
?>
	<div class="optional">
		<font color="#FF0000"><strong>*</strong></font>
	    Indica que la informaci&oacute;n del campo es requerida.
	</div>
	
<?
echo $form->end('Actualizar');
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Eliminar', true), array('action'=>'delete', $form->value('Programation.id')), null, sprintf(__('Seguro que que desea eliminar el registro # %s?', true), $form->value('Programation.id'))); ?></li>
		<li><?php echo $html->link(__('Lista de programas', true), array('action'=>'index'));?></li>
	</ul>
</div>


<?

echo "</div>";