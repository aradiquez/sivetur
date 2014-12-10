<? echo  "<div class='panel'>"; 

 echo $form->create('Infphoto', array('type' => 'file'));
 echo "<div class='opcional'>";

echo $form->input('Infphoto.informacione_id', array('type' => 'hidden', 'value'=>$generic));
 echo $form->input('Photo.state', array('type' => 'hidden', 'value'=>'A'));

if(isset($error)){ 
            pr($error);
        }
        
for($i=1;$i<=5;$i++){
	echo $form->input('Infphoto.foto'.$i, array('type' => 'file', 'label'=>'Foto '.$i));
	echo $form->input('Infphoto.description_e'.$i, array('type' => 'text', 'label'=>'Texto foto '.$i));
	echo $form->input('Infphoto.description_i'.$i, array('type' => 'text', 'label'=>'Texto foto '.$i));
}

 echo "</div>";
echo $form->end('Enviar');
echo "</div>";
?>