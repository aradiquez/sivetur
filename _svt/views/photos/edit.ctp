<? echo  "<div class='panel'>"; 

 echo $form->create('Photo', array('type' => 'file'));
  
//echo $form->input('Photo.name', array('type' => 'text', 'label'=>'NOmbre'));
echo $form->input('id');
echo "<br/><br/>";
echo "<center>";
echo "Foto actual:<br/><br/>";
echo "<img src='../../../fotos/albums/tn_{$form->value('filename')}'/>";
echo "</center>";
echo "<br/><br/>";


echo $form->input('Photo.filename',array('type'=>'file','label'=>'Cambiar por :'));

if(isset($error)){           
            pr($error);
        }
 
 
  echo "<div class='opcional'>";
                 echo $form->input('Photo.status', array( 'type' => 'select','label'=>'Estado:','options'=>$estadoArray,'selected'=>$Photos['Photo']['status'], 'empty'=>false));
            echo "</div>";
 
echo $form->input('Photo.details', array('type' => 'text', 'label'=>'Texto foto  ','size'=>'70'));


 echo $form->input('Photo.related_id', array('type' => 'hidden', 'value'=>$form->value('related_id')));
 echo $form->input('Photo.keynum', array('type' => 'hidden', 'value'=>$form->value('keynum')));
  echo $form->input('Photo.filenameant', array('type' => 'hidden', 'value'=>$form->value('filename')));
 

 
 

echo $form->end('Actualizar');
echo "</div>";
echo "</div>";
?>