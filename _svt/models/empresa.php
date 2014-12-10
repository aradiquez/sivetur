<?php
class Empresa extends AppModel {
	var $name = 'Empresa';
	
	var $actsAs = array('Tree');
	
	var $validate = array('name'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar un nombre.'
	        									)),
						'intro'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar un encabezado.'
	        									)),
						'details'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar un detalle.'
	        									))
	        				); 
   
}
  
?>