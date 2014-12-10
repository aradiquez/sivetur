<? echo  "<div class='panel'>"; 

 echo $form->create('Infphoto', array('type' => 'file'));
  
//echo $form->input('Infphoto.name', array('type' => 'text', 'label'=>'NOmbre'));
echo $form->input('id');
echo "<br/><br/>";
echo "<center>";
echo "Foto actual:<br/><br/>";
echo "<img src='../../../fotos/informaciones/tn_{$form->value('filename')}'/>";
echo "</center>";
echo "<br/><br/>";


echo $form->input('Infphoto.filename',array('type'=>'file','label'=>'Cambiar por :'));
if(isset($error)){
           
            
            pr($error);
        }


  echo "<div class='opcional'>";
                  //echo $form->input('Infphoto.size', array( 'type' => 'select','label'=>'Tama&ntilde;o:','options'=>$sizeArray,'selected'=>$secInfphotos['Infphoto']['size'], 'empty'=>false));
  echo "</div>";
//echo $form->input('Infphoto.description', array('type' => 'hidden', 'value'=>'n/a'));
//echo $form->input('Infphoto.url',array('type'=>'text','label'=>'Direccion url :','size'=>'80'));
 
 
  echo "<div class='opcional'>";
                 echo $form->input('Infphoto.state', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$Infphotos['Infphoto']['state'], 'empty'=>false));
            echo "</div>";
 
echo $form->input('Infphoto.description_e', array('type' => 'text', 'label'=>'Texto foto  ','size'=>'70'));
echo $form->input('Infphoto.description_i', array('type' => 'text', 'label'=>'Texto foto ','size'=>'70'));


 echo $form->input('Infphoto.service_id', array('type' => 'hidden', 'value'=>$form->value('informacione_id')));
  echo $form->input('Infphoto.filenameant', array('type' => 'hidden', 'value'=>$form->value('filename')));
 
echo $form->end('Actualizar');
echo "</div>";
echo "</div>";
?>