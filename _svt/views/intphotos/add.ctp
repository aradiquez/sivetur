<? echo  "<div class='panel'>"; 
	echo "<p>El tama&ntilde;o recomendado para las imagenes es de 709 X 244 pixeles</p>";
 echo $form->create('Intphoto', array('type' => 'file'));
  
//echo $form->input('Intphoto.name', array('type' => 'text', 'label'=>'NOmbre'));
echo $form->input('Intphoto.filename', array('type' => 'hidden', 'value'=>'n/a'));
//echo $form->input('Intphoto.description', array('type' => 'hidden', 'value'=>'n/a')); 

if(isset($error)){
            pr($error);
        }
        
$i=1;      
while($i<6){        
 echo "<div class='box'>";       
  echo "<div id='wraper-sincolor'>";
       echo "<div class='misma-linea'>";
            echo "<div class='opcional'>";
              echo $form->input('Intphoto.foto'.$i, array('type' => 'file', 'label'=>'Foto '.$i.''));
            echo "</div>";
              
       echo "</div>";
        echo "<div class='misma-linea'>";
             /*echo "<div class='opcional'>";
                  echo $form->input('Intphoto.size'.$i, array( 'type' => 'select','label'=>'Tama&ntilde;o:','options'=>$sizeArray,'selected'=>$selectedSize, 'empty'=>false));
             echo "</div>"; */
       echo "</div>";
  echo "</div>";
  echo '<br/><br/><br/><br/>';
//echo $form->input('Intphoto.url'.$i, array('type' => 'text', 'label'=>'Url','size'=>'60'));

echo "</div>";   
 $i++;
}
 
echo $form->end('Enviar');
echo "</div>";
echo "</div>";
?>