<?= $javascript->link('ckeditor/ckeditor.js')?>
<?= $javascript->link('funciones')?>
<? 
	//echo 'error'.print_r($this->data);
	if($error)
 	{
		echo "<div class='curvacaja'>";
		echo $html->image('error.png',array("alt"=>"", "title"=>"","class"=>"icono"));
		echo "&nbsp;<strong>Hay errores en los datos ingresados.Por favor corrija lo que se indica a continuación.</strong>";
		echo"</div>";
	}
?>
<div class="panel">
<h2><?php __('Agregando nueva Noticia');?></h2>

<?
echo $form->create('Noticia',array('enctype'=>'multipart/form-data'));
 
 echo "<div class='requerid'>";
     echo $form->input('Noticia.name', array('type' => 'text', 'label'=>'Titulo : <span style="color:red">*</span>','size' => '50','maxlength'=>'100'));
     
      if(isset($err_reg_unico))
           echo $err_reg_unico;
echo "</div>";
echo "<div class='opcional'>";
        echo $form->input('Noticia.title_i', array('type' => 'text', 'label'=>'Titulo: '.$html->image('uk.png',array("alt"=>"Ingles", "title"=>"Ingles")).'','size' => '50','maxlength'=>'100'));
        
echo "</div>";




echo "<div id='wraper'>";
        echo "<div class='wraperContenedor'>";
           
	   echo "<div class='opcional'>";
               
                 echo $form->input('Noticia.topic_id', array( 'type' => 'select','label'=>'Topico:','options'=>$topicoArray,'selected'=>$selectedTopico, 'empty'=>false));
	   
	  
	    echo "</div>";
	    
	   
	    echo "<div class='opcional'>";
                 echo $form->input('Noticia.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false));
            echo "</div>";
        echo "</div>";
        
echo "</div>";
    
     echo "<div style='clear:both;'></div><div class='opcional'>";
      echo "<span id='t4'>Caracteres permitidos.</span>";
        
        
        echo $form->input('Noticia.intro_e',array('type'=>'textarea','label'=>'Introduccion:'.$html->image('crc.png',array("alt"=>"Espa", "title"=>"Espa",)).' <span style="color:red">*</span>','onkeyup'=> 'checkLen(this,"t4",100)','onkeydown'=> 'checkLen(this,"t4",100)','onfocus'=> 'quitaBlancos(this)','cols' => '50','rows' => '2'));
        
     echo "</div>";
     echo "<div class='required'>";
      echo "<span id='t3'>Caracteres permitidos.</span>";
        
         echo $form->input('Noticia.intro_i',array('type'=>'textarea','label'=>'Introducion : '.$html->image('uk.png',array("alt"=>"Ingles", "title"=>"Ingles")).'','onkeyup'=> 'checkLen(this,"t3",100)','onkeydown'=> 'checkLen(this,"t3",100)','onfocus'=> 'quitaBlancos(this)','cols' => '50','rows' => '2'));
  
    echo "</div>";
    
      echo "<div class='optional'>";
       
       echo "<span id='t1'>Caracteres permitidos.</span>";
         echo $form->input('Noticia.header_e',array('type'=>'textarea','label'=>'Encabezado:'.$html->image('crc.png',array("alt"=>"Espa", "title"=>"Espa",)).' <span style="color:red">*</span> &nbsp;&nbsp;&nbsp;&nbsp;','error'=>array('required'=>'* No se puede dejar la descripcion en blanco','length'=>'* Se requiere un minimo de 10 caracteres'),'onkeyup'=> 'checkLen(this,"t1",255)','onkeydown'=> 'checkLen(this,"t1",255)','onfocus'=> 'quitaBlancos(this)','cols' => '50','rows' => '5'));
     echo "</div>";
    
     echo "<div class='opcional'>";
       
       echo "<span id='t2'>Caracteres permitidos.</span>";
         echo $form->input('Noticia.header_i',array('type'=>'textarea','label'=>'Encabezado: '.$html->image('uk.png',array("alt"=>"Ingles", "title"=>"Ingles")).'','onkeyup'=> 'checkLen(this,"t2",255)','onkeydown'=> 'checkLen(this,"t2",255)','onfocus'=> 'quitaBlancos(this)','cols' => '50','rows' => '5'));
     echo "</div>";
     

     echo "<div class='requerid'>";
        echo $form->input('Noticia.detail_e', array('type'=>'textarea', 'label'=>'Descripcion: '.$html->image('crc.png',array("alt"=>"Espa", "title"=>"Espa",)).' <span style="color:red">*</span><div style="clear:both;"></div> '));
        echo "<br/><br/><br/><br/>";
        echo $fck->load('Noticia/detail_e');
     echo "</div>";
     
     echo "<div class='opcional'>";
        echo $form->input('Noticia.detail_i',array('type'=>'textarea','label'=>'Descripcion: '.$html->image('uk.png',array("alt"=>"Ingles", "title"=>"Ingles")).'<div style="clear:both;"></div>'));
        echo "<br/><br/><br/><br/>";
        echo $fck->load('Noticia/detail_i');
    echo "</div>";
     
 //////////////////////////////////////////////////////////////////////////////\
  
$i=1;      
while($i<6){ 
	$mensaje='msj_photo_error'.$i;
		
		if(isset($$mensaje))
		             foreach($$mensaje as $ms ):
		                 pr($ms).'<br/>';
		           endforeach;
	
	
 echo "<hr><br/><br/>";    
  echo "<div class='opcional'>";    
        echo $form->input('Noticia.foto'.$i,array('type'=>'file','label'=>'Foto'.$i.':'));
    echo "</div>";
 
 echo "<div class='opcional'>";
     echo $form->input('Noticia.text'.$i.'_e', array('type' => 'text', 'label'=>'Texto foto '.$i.' : '.$html->image('crc.png',array("alt"=>"Espa", "title"=>"Espa",)).'','size' => '30','maxlength'=>'50'));
     
       
echo "</div>";
echo "<div class='opcional'>";
        echo $form->input('Noticia.text'.$i.'_i', array('type' => 'text', 'label'=>'Texto foto '.$i.': '.$html->image('uk.png',array("alt"=>"Ingles", "title"=>"Ingles")).'','size' => '30','maxlength'=>'50'));
        
echo "</div>";
  $i++;
}

 
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
		<li><?php echo $html->link(__('Lista de Noticias', true), array('action'=>'index'));?></li>
	</ul>
</div>
<?
echo "</div>";
