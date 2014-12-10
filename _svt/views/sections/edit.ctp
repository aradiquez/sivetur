<div class="panel">
<h2>Modificar Secci&oacute;n: <?=utf8_encode($form->value('Section.name')) ?></h2>
<?= $javascript->link('ckeditor/ckeditor.js')?>
<?
  
 
 $ref='edit/';
 
if(isset($rc))
$ref='edit/'.$rc;
echo $form->create('Section',array('action'=>$ref));
 echo $form->input('id');

 echo "<div class='required'>";
   echo $form->input('Section.title', array('type' => 'text', 'label'=>'Titulo seccion :  ','size'=>'50','maxlength'=>'250'));
echo "</div>";
 
echo "<div class='opcional'>";
   echo $form->input('Section.keyword', array('type' => 'text', 'label'=>'Palabras claves: ','size'=>'50','maxlength'=>'250'));
echo "</div>"; 

 
echo "<div class='opcional'>";
   echo $form->input('Section.description', array('type' => 'text', 'label'=>'Descripcion : ','size'=>'50','maxlength'=>'250'));
echo "</div>";

echo "<div class='opcional'>";
   echo $form->input('Section.text', array('type' => 'textarea', 'label'=>'Informacion: <div style="clear:both;"></div>','size'=>'50','maxlength'=>'250'));
   echo "<br/><br/><br/><br/>";
    echo $fck->load('Section/text');
echo "<div>";
echo "<div style='clear:both;'></div>";
   
echo $form->end('Actualizar');

echo "</div>"; 	 
?>
 
 
<div class="actions">
	<ul>
		 
		<li><?php echo $html->link(__('Lista de Secciones', true), array('action'=>'index'));?></li>
	</ul>
</div>
