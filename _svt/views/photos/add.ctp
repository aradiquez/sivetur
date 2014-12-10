<? echo  "<div class='panel'>"; 

 echo $form->create('Photo', array('type' => 'file'));
 echo "<div class='opcional'>";
//echo $form->input('Photo.name', array('type' => 'text', 'label'=>'NOmbre'));
//echo $form->input('Photo.filename', array('type' => 'hidden', 'value'=>'n/a'));
//echo $form->input('Photo.description', array('type' => 'hidden', 'value'=>'n/a'));

echo $form->input('Photo.related_id', array('type' => 'hidden', 'value'=>$generic));
echo $form->input('Photo.keynum', array('type' => 'hidden', 'value'=>$keynum));
 
if(isset($error)){
            pr($error);
        }
for($i=1;$i<=5;$i++){
	echo $form->input('Photo.foto'.$i, array('type' => 'file', 'label'=>'Foto '.$i));
	echo $form->input('Photo.details'.$i, array('type' => 'text', 'label'=>'Texto foto '.$i));
}
echo $form->input('Photo.status', array('type' => 'hidden', 'value'=>'A'));
/*
echo $form->input('Photo.foto2', array('type' => 'file', 'label'=>'Foto 2'));
echo $form->input('Photo.description_e2', array('type' => 'text', 'label'=>'Texto foto 2'));
echo $form->input('Photo.description_i2', array('type' => 'text', 'label'=>'Texto foto 2'));


echo $form->input('Photo.foto3', array('type' => 'file', 'label'=>'Foto 3'));
echo $form->input('Photo.description_e3', array('type' => 'text', 'label'=>'Texto foto 3'));
echo $form->input('Photo.description_i3', array('type' => 'text', 'label'=>'Texto foto 3'));


echo $form->input('Photo.foto4', array('type' => 'file', 'label'=>'Foto 4'));
echo $form->input('Photo.description_e4', array('type' => 'text', 'label'=>'Texto foto 4'));
echo $form->input('Photo.description_i4', array('type' => 'text', 'label'=>'Texto foto 4'));

echo $form->input('Photo.foto5', array('type' => 'file', 'label'=>'Foto 5'));
echo $form->input('Photo.description_e5', array('type' => 'text', 'label'=>'Texto foto 5'));
echo $form->input('Photo.description_i5', array('type' => 'text', 'label'=>'Texto foto 5'));
*/
 echo "</div>";
echo $form->end('Enviar');
echo "</div>";
?>