<?php
class Category extends AppModel {
	var $name = 'Category';

  	var $validate = array('name'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar el nombre en español.'
	        									)),
						'intro'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar una introducción en Español.'
	        									)),
						'details'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar un detalle en Español.'
	        									))
	        				); 
	var $hasMany = array('Albums' =>
                            array('className' => 'Album',
                                  'conditions' =>'',
                                  'order' => '',
	                              'limit' => '',
                                  'foreignKey' => 'category_id',
                                  'dependent'     => true,
	                              'exclusive'     => false,
	                              'finderQuery'   => ''));
     
}
  
?>