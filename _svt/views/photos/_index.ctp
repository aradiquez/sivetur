 
<?php
//pr($Attachments);
foreach($Photos as $at):
echo $at['Photo']['description'];  
   echo $html->link($at['Photo']['filename'], '../../fotos/tn_'.$at['Photo']['filename']); 
echo "<br/>";
 endforeach;
 
 ?>