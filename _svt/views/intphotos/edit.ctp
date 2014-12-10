<? echo  "<div class='panel'>"; 

 echo $form->create('Intphoto', array('type' => 'file'));
  
//echo $form->input('Intphoto.name', array('type' => 'text', 'label'=>'NOmbre'));
echo $form->input('id');
echo "<br/><br/>";
echo "<center>";
echo "Foto actual:<br/><br/>";
echo "<img src='../../../fotos/rotativas/{$form->value('filename')}'/>";
echo "</center>";
echo "<br/><br/>";


echo $form->input('Intphoto.filename',array('type'=>'file','label'=>'Cambiar por :'));
if(isset($error)){
           
            
            pr($error);
        }


  //echo "<div class='opcional'>";
//echo $form->input('Intphoto.size', array( 'type' => 'select','label'=>'Tama&ntilde;o:','options'=>$sizeArray,'selected'=>$secphotos['Intphoto']['size'], 'empty'=>false));
 // echo "</div>";
//echo $form->input('Intphoto.description', array('type' => 'hidden', 'value'=>'n/a'));
//echo $form->input('Intphoto.url',array('type'=>'text','label'=>'Direccion url :','size'=>'80'));
 


// echo $form->input('Intphoto.generic_id', array('type' => 'hidden', 'value'=>$form->value('generic_id')));
// echo $form->input('Intphoto.clave', array('type' => 'hidden', 'value'=>$form->value('clave')));
  echo $form->input('Intphoto.filenameant', array('type' => 'hidden', 'value'=>$form->value('filename')));
 

 
 

echo $form->end('Actualizar');
echo "</div>";
echo "</div>";
?>