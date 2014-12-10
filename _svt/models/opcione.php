<?php
class Opcione extends AppModel {
	var $name = 'Opcione';
   
  	var $validate = array('name'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar la opcion para la encuesta'
	        									))
	        				); 
	        				
    var $belongsTo = array('Encuestas' =>
	                    array('className'     => 'Encuesta',
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