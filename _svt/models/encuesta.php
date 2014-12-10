<?php
class Encuesta extends AppModel {
	var $name = 'Encuesta';
   
  	var $validate = array('name'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar la pregunta de la encuesta'
	        									))
	        				); 
	        				
    var $hasMany = array('Opciones' =>
	                    array('className'     => 'Opcione',
	                               'conditions'    => '',
	                               'order'         => '',
	                               'limit'         => '',
	                               'foreignKey'    => 'encuesta_id',
	                               'dependent'     => true,
	                               'exclusive'     => false,
	                               'finderQuery'   => ''
	                         ));
     
}
  
?>