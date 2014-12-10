<? echo  "<div class='panel'>"; 

 echo $form->create('Secphoto', array('type' => 'file'));
  
//echo $form->input('Secphoto.name', array('type' => 'text', 'label'=>'NOmbre'));
echo $form->input('id');
echo "<br/><br/>";
echo "<center>";
echo "Foto actual:<br/><br/>";
echo "<img src='../../../fotos/rotativas/{$form->value('filename')}'/>";
echo "</center>";
echo "<br/><br/>";


echo $form->input('Secphoto.filename',array('type'=>'file','label'=>'Cambiar por :'));
if(isset($error)){
           
            
            pr($error);
        }


  //echo "<div class='opcional'>";
//echo $form->input('Secphoto.size', array( 'type' => 'select','label'=>'Tama&ntilde;o:','options'=>$sizeArray,'selected'=>$secphotos['Secphoto']['size'], 'empty'=>false));
 // echo "</div>";
//echo $form->input('Secphoto.description', array('type' => 'hidden', 'value'=>'n/a'));
//echo $form->input('Secphoto.url',array('type'=>'text','label'=>'Direccion url :','size'=>'80'));
 


// echo $form->input('Secphoto.generic_id', array('type' => 'hidden', 'value'=>$form->value('generic_id')));
// echo $form->input('Secphoto.clave', array('type' => 'hidden', 'value'=>$form->value('clave')));
  echo $form->input('Secphoto.filenameant', array('type' => 'hidden', 'value'=>$form->value('filename')));
 

 
 

echo $form->end('Actualizar');
echo "</div>";
echo "</div>";
?>