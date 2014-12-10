<?php
class Banner extends AppModel {
    var $name = 'Banner';
   

var $validate = array(
    	'name' => array(
	        'required' => array(
	            'rule' => array('notEmpty'),
	            'required' => true,
	            'allowEmpty' => false,
	            'message' => 'El nombre es requerido'
	        	),
	        'unique' => array(
	            'rule' => array('isUnique'),
	            'on' => 'create',# ó: 'update'
	            'message' => 'Este nombre ya existe'
	        	)
	    	)
	);

  
  
} 
 
  
?>