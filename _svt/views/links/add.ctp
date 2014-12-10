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
<h2><?php __('Agregando nuevo Link');?></h2>

<?
echo $form->create('Link',array('enctype'=>'multipart/form-data'));
 
echo "<div class='requerid'>";
     echo $form->input('Link.name', array('type' => 'text', 'label'=>'Nombre : <span style="color:red">*</span>','size' => '50','maxlength'=>'100'));
echo "</div>";

echo "<div class='opcional'>";
        echo $form->input('Link.email', array('type' => 'text', 'label'=>'Email: ','size' => '50','maxlength'=>'100'));
        
echo "</div>";

echo "<div class='opcional'>";
        echo $form->input('Link.web', array('type' => 'text', 'label'=>'Url: <small>(sin el http:// al inicio)</small> ','size' => '50','maxlength'=>'100'));
        
echo "</div>";

echo "<div id='wraper'>";
        echo "<div class='wraperContenedor'>";
	    	echo "<div class='opcional'>";
                 echo $form->input('Link.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$selectedEstado, 'empty'=>false));
            echo "</div>";
        echo "</div>";
echo "</div>";
    
     echo "<div style='clear:both;'></div><div class='opcional'>";
      echo "<span id='t4'>Caracteres permitidos.</span>";
        
        
        echo $form->input('Link.intro',array('type'=>'textarea','label'=>'Introduccion: <span style="color:red">*</span>','onkeyup'=> 'checkLen(this,"t4",100)','onkeydown'=> 'checkLen(this,"t4",100)','onfocus'=> 'quitaBlancos(this)','cols' => '50','rows' => '2'));
        
     echo "</div>";

     echo "<div class='requerid'>";
        echo $form->input('Link.details', array('type'=>'textarea', 'label'=>'Detalle: <span style="color:red">*</span><div style="clear:both;"></div> '));
        echo "<br/><br/><br/><br/>";
        echo $fck->load('Link/details');
     echo "</div>";
     
     
 //////////////////////////////////////////////////////////////////////////////\

	$mensaje='msj_photo_error';
		
		if(isset($$mensaje))
		             foreach($$mensaje as $ms ):
		                 pr($ms).'<br/>';
		           endforeach;
	
	
 echo "<hr><br/><br/>";    
  echo "<div class='opcional'>";    
        echo $form->input('Link.foto',array('type'=>'file','label'=>'Logo:'));
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
		<li><?php echo $html->link(__('Lista de Links', true), array('action'=>'index'));?></li>
	</ul>
</div>
<?
echo "</div>";
