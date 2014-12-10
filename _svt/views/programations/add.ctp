<?= $javascript->link('ckeditor/ckeditor.js')?>
<?= $javascript->link('funciones')?>
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
<h2><?php __('Agregando nuevo programa');?></h2>

<?
echo $form->create('Programation',array('enctype'=>'multipart/form-data'));
 
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
     
 //////////////////////////////////////////////////////////////////////////////\

	$mensaje='msj_photo_error';
		
		if(isset($$mensaje))
		             foreach($$mensaje as $ms ):
		                 pr($ms).'<br/>';
		           endforeach;
	
	
 echo "<hr><br/><br/>";    
  echo "<div class='opcional'>";    
        echo $form->input('Programation.foto',array('type'=>'file','label'=>'Foto:'));
  echo "</div>";

?>  
	<div class="optional">
		<font color="#FF0000"><strong>*</strong></font>
	    Indica que la informaci&oacute;n del campo es requerida.
	</div>
<?
	echo $form->end('Enviar');
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Lista de programas', true), array('action'=>'index'));?></li>
	</ul>
</div>
<?
echo "</div>";
