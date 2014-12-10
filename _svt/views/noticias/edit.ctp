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
<h2>Modificando Noticia</h2>
<?
	$path='http://www.tvsur.co.cr/fotos/';
	$path2='http://www.tvsur.co.cr/fotos/';
	echo $javascript->link('ckeditor/ckeditor.js');
	echo $javascript->link('funciones');
	//$ref='/Noticias/edit/'.$html->tagValue('Noticia/id');

$ref='edit/';
if(isset($rc))
$ref='edit/'.$rc;
//enctype="multipart/form-data">
//pr($Noticias);

echo $form->create('Noticia',array('action'=>$ref,'enctype'=>'multipart/form-data'));	
 echo $form->input('id');
	
 
echo "<div class='requerid'>";
     echo $form->input('Noticia.name', array('type' => 'text', 'label'=>'Titulo :  <span style="color:red">*</span>','size' => '50','maxlength'=>'100'));
     
      if(isset($err_reg_unico))
           echo $err_reg_unico;
echo "</div>";
///
echo "<div id='wraper'>";
        echo "<div class='misma-linea'>";
           
	   echo "<div class='opcional'>";
               
                 echo $form->input('Noticia.topic_id', array( 'type' => 'select','label'=>'Topico:','options'=>$topicoArray,'selected'=>$Noticias['Noticia']['topic_id'], 'empty'=>false));
	   
	  
	    echo "</div>";
	        echo "</div>";
	    
	    echo "<div class='misma-linea'>";
	    echo "<div class='opcional'>";
                 echo $form->input('Noticia.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$Noticias['Noticia']['status'], 'empty'=>false));
            echo "</div>";
        echo "</div>";
        
echo "</div>";


///

echo '<br/>';

     
    
     echo "<div class='opcional'>";
      echo "<span id='t4'>Caracteres permitidos.</span>";
        
        
        echo $form->input('Noticia.intro',array('type'=>'textarea','label'=>'Introduccion : <span style="color:red">*</span>','onkeyup'=> 'checkLen(this,"t4",255)','onkeydown'=> 'checkLen(this,"t4",255)','onfocus'=> 'quitaBlancos(this)','cols' => '50','rows' => '2'));
        
     echo "</div>";
    
      echo "<div class='optional'>";
       
       echo "<span id='t1'>Caracteres permitidos.</span>";
         echo $form->input('Noticia.enca',array('type'=>'textarea','label'=>'Encabezado: <span style="color:red">*</span>','onkeyup'=> 'checkLen(this,"t1",255)','onkeydown'=> 'checkLen(this,"t1",255)','onfocus'=> 'quitaBlancos(this)','cols' => '50','rows' => '5'));
     echo "</div>";
 

     echo "<div class='requerid'>";
        echo $form->input('Noticia.details', array('type'=>'textarea', 'label'=>'Descripcion: <span style="color:red">*</span><div style="clear:both;"></div> '));
        echo "<br/><br/><br/><br/>";
        echo $fck->load('Noticia/details');
     echo "</div>";
     
    /*
    
    FOTOS
    */
$i=1;      
while($i<4){ 
	$mensaje='msj_photo_error'.$i;
		
		if(isset($$mensaje))
		             foreach($$mensaje as $ms ):
		                 pr($ms).'<br/>';
		           endforeach;
	
	
 echo "<hr><br/><br/>";    
 
	echo "<center>";
	echo "Foto actual:<br/><br/>";
	echo "<img src='".$path.$Noticias['Noticia']['foto'.$i]."' width='150' />";
	echo "</center>";
	echo "<br/><br/>";
 echo $form->input('Noticia.eliminar_foto'.$i,array('type'=>'checkbox','label'=>'Eliminar foto ','id'=> 'checke'));
 echo"<br/>";
 echo $form->input('Noticia.foto_a'.$i,array('type'=>'hidden','value' => $Noticias['Noticia']['foto'.$i]));
  echo "<div class='opcional'>";    
        echo $form->input('Noticia.foto'.$i,array('type'=>'file','label'=>'Foto'.$i.':'));
    echo "</div>";
 
 echo "<div class='opcional'>";
     echo $form->input('Noticia.texto_foto'.$i, array('type' => 'text', 'label'=>'Texto foto '.$i.' : ','size' => '30','maxlength'=>'50'));
     
       
echo "</div>";
  $i++;
}
    
    

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
		<li><?php echo $html->link(__('Eliminar', true), array('action'=>'delete', $form->value('Noticia.id')), null, sprintf(__('Seguro que que desea eliminar el registro # %s?', true), $form->value('Noticia.id'))); ?></li>
		<li><?php echo $html->link(__('Lista de Noticias', true), array('action'=>'index'));?></li>
	</ul>
</div>


<?

echo "</div>";