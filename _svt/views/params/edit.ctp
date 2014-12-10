<div class="panel">
   <h2>Editar parametros:</h2>
	<?
		$ref='/params/edit/';
        echo $javascript->link('fckeditor');
        echo $javascript->link('funciones');

		$ref='edit/';
		echo $form->create('Param',array('action'=>$ref,'type'=>'file'));
		echo $form->input('id', array('type'=>'hidden', 'value'=> $form->value('Param.id')));

if(isset($error)){
            pr($error);
        } 

echo "<div class='required'>";
      echo $form->input('Param.correo', array('type' => 'text', 'label'=>'Correo para contacto: ','size'=>'50','maxlength'=>'100'));
echo "</div>";


echo "<div class='required'>";
      echo $form->input('Param.facebook', array('type' => 'text', 'label'=>'Direcci&oacute;n de facebook: ','size'=>'50','maxlength'=>'100'));
echo "</div>";


echo "<div class='required'>";
      echo $form->input('Param.twitter', array('type' => 'text', 'label'=>'Direcci&oacute;n de Twitter: ','size'=>'50','maxlength'=>'100'));
echo "</div>";

echo "<div class='required'>";
      echo $form->input('Param.paginacion', array('type' => 'text', 'label'=>'Tama&ntilde;o de la paginaci&oacute;n: ','size'=>'50','maxlength'=>'2'));
echo "</div>";

echo "<div class='optional'>";
      
    echo "<font color=\"#FF0000\"><strong>*</strong></font>Indica que la informaci&oacute;n del campo es requerida.";

echo "</div>";     
echo $form->end('Actualizar');

?>
 </div>