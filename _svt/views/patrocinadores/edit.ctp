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
<h2>Modificando Patrocinadore</h2>
<?
	$path='../../../fotos/';
	$path2='../../../fotos/';
	echo $javascript->link('ckeditor/ckeditor.js');
	echo $javascript->link('funciones');
	//$ref='/Patrocinadores/edit/'.$html->tagValue('Patrocinadore/id');

$ref='edit/';
if(isset($rc))
$ref='edit/'.$rc;
//enctype="multipart/form-data">

echo $form->create('Patrocinadore',array('action'=>$ref,'enctype'=>'multipart/form-data'));	
 echo $form->input('id');
	
 
echo "<div class='requerid'>";
     echo $form->input('Patrocinadore.name', array('type' => 'text', 'label'=>'Nombre : <span style="color:red">*</span>','size' => '50','maxlength'=>'100'));
echo "</div>";

echo "<div class='opcional'>";
        echo $form->input('Patrocinadore.email', array('type' => 'text', 'label'=>'Email: ','size' => '50','maxlength'=>'100'));
        
echo "</div>";

echo "<div class='opcional'>";
        echo $form->input('Patrocinadore.url', array('type' => 'text', 'label'=>'Url: <small>(sin el http:// al inicio)</small> ','size' => '50','maxlength'=>'100'));
        
echo "</div>";

echo "<div id='wraper'>";
        echo "<div class='wraperContenedor'>";
	    	echo "<div class='opcional'>";
                 echo $form->input('Patrocinadore.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false));
            echo "</div>";
        echo "</div>";
echo "</div>";
    
     echo "<div style='clear:both;'></div><div class='opcional'>";
      echo "<span id='t4'>Caracteres permitidos.</span>";
        
        
        echo $form->input('Patrocinadore.intro',array('type'=>'textarea','label'=>'Introduccion: <span style="color:red">*</span>','onkeyup'=> 'checkLen(this,"t4",100)','onkeydown'=> 'checkLen(this,"t4",100)','onfocus'=> 'quitaBlancos(this)','cols' => '50','rows' => '2'));
        
     echo "</div>";
     
     echo "<div class='requerid'>";
        echo $form->input('Patrocinadore.details', array('type'=>'textarea', 'label'=>'Detalle: <span style="color:red">*</span><div style="clear:both;"></div> '));
        echo "<br/><br/><br/><br/>";
        echo $fck->load('Patrocinadore/details');
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
	echo "<img src='".$path.$Patrocinadores['Patrocinadore']['foto']."' width='150'/>";
	echo "</center>";
	echo "<br/><br/>";
	 echo $form->input('Patrocinadore.eliminar_foto',array('type'=>'checkbox','label'=>'Eliminar foto ','id'=> 'checke'));
	 echo"<br/>";
	 echo $form->input('Patrocinadore.foto_a',array('type'=>'hidden','value' => $Patrocinadores['Patrocinadore']['foto']));
	 echo "<div class='opcional'>";    
	 echo $form->input('Patrocinadore.foto',array('type'=>'file','label'=>'Foto:'));
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
		<li><?php echo $html->link(__('Eliminar', true), array('action'=>'delete', $form->value('Patrocinadore.id')), null, sprintf(__('Seguro que que desea eliminar el registro # %s?', true), $form->value('Patrocinadore.id'))); ?></li>
		<li><?php echo $html->link(__('Lista de Patrocinadores', true), array('action'=>'index'));?></li>
	</ul>
</div>


<?

echo "</div>";