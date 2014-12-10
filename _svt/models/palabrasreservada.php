<?php
class Palabrasreservada extends AppModel {
	var $name = 'Palabrasreservada';
   
  	var $validate = array('name'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar la palabra reservada.'
	        									))
	        				); 
}
  
?>