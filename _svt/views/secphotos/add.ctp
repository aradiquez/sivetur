<? echo  "<div class='panel'>"; 
	echo "<p>El tama&ntilde;o recomendado para las imagenes es de 708 X 184 pixeles</p>";
 echo $form->create('Secphoto', array('type' => 'file'));
  
//echo $form->input('Secphoto.name', array('type' => 'text', 'label'=>'NOmbre'));
echo $form->input('Secphoto.filename', array('type' => 'hidden', 'value'=>'n/a'));
//echo $form->input('Secphoto.description', array('type' => 'hidden', 'value'=>'n/a')); 

if(isset($error)){
            pr($error);
        }
        
$i=1;      
while($i<6){        
 echo "<div class='box'>";       
  echo "<div id='wraper-sincolor'>";
       echo "<div class='misma-linea'>";
            echo "<div class='opcional'>";
              echo $form->input('Secphoto.foto'.$i, array('type' => 'file', 'label'=>'Foto '.$i.''));
            echo "</div>";
              
       echo "</div>";
        echo "<div class='misma-linea'>";
             /*echo "<div class='opcional'>";
                  echo $form->input('Secphoto.size'.$i, array( 'type' => 'select','label'=>'Tama&ntilde;o:','options'=>$sizeArray,'selected'=>$selectedSize, 'empty'=>false));
             echo "</div>"; */
       echo "</div>";
  echo "</div>";
  echo '<br/><br/><br/><br/>';
//echo $form->input('Secphoto.url'.$i, array('type' => 'text', 'label'=>'Url','size'=>'60'));

echo "</div>";   
 $i++;
}
 
echo $form->end('Enviar');
echo "</div>";
echo "</div>";
?>