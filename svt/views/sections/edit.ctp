<div class="panel">
<h2>Modificar Secci&oacute;n: <?=utf8_encode($form->value('Section.name')) ?></h2>
<?= $javascript->link('ckeditor/ckeditor.js')?>
<?
 $ref='edit/';
 
if(isset($rc))
$ref='edit/'.$rc;
echo $form->create('Section',array('action'=>$ref));
 echo $form->input('id');
?>
	<?php
	 echo "<div class='input-group'>";
	   echo $form->input('Section.title', array('type' => 'text', 'label'=>'Titulo secci&oacute;n:','size'=>'50','maxlength'=>'250','class'=>"form-control"));
	echo "</div>";
	 
	echo "<div class='input-group'>";
	   echo $form->input('Section.keyword', array('type' => 'text', 'label'=>'Palabras claves: ','size'=>'50','maxlength'=>'250','class'=>"form-control"));
	echo "</div>"; 
	 
	echo "<div class='input-group'>";
	   echo $form->input('Section.description', array('type' => 'text', 'label'=>'Descripci&oacute;n: ','size'=>'50','maxlength'=>'250','class'=>"form-control"));
	echo "</div>";
?>
<?php if ($section_id != 1) {
	echo "<div class='require'>";
		echo $form->label("Section.text", 'Informaci&oacute;n: <div style="clear:both;"></div>');
	   	echo "<br/><div style='clear: both;'></div>";
	   	echo $form->input('Section.text', array('type' => 'textarea', 'label'=>'','size'=>'50','maxlength'=>'250'));
	   	echo $fck->load('Section/text');
	echo "<div>";
	}	 ?>

<?php
	echo "<div style='clear:both;'></div><br/><br/>";
	echo $form->end(array('label' => 'Actualizar', 'class' => 'btn btn-primary btn-lg'));

echo "<br/><br/></div>"; 	 
?>
 <p><?php echo $html->link(__('Lista de Secciones', true), array('action'=>'index'));?></p>
	