<?php
class Album extends AppModel {
	var $name = 'Album';

  	var $validate = array('name'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar la pregunta en español.'
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
	            								'message' => 'Debe ingresar la respuesta en Español.'
	        									))
	        				); 
	        				
	var $BelongsTo = array('Categories' =>
                            array('className' => 'Category',
                                  'conditions' =>'',
                                  'order' => '',
                                  'limit'         => '',
                                  'foreignKey' => 'category_id',
                                  'dependent'     => true,
	                              'exclusive'     => false,
	                              'finderQuery'   => ''));        				
	        				
	        				
	var $hasMany = array('Photos' =>
                            array('className' => 'Photo',
                                  'conditions'    => '',
	                               'order'         => '',
	                               'limit'         => '',
	                               'foreignKey' => 'related_id',
	                               'dependent'     => true,
	                               'exclusive'     => false,
	                               'finderQuery'   => ''));
     
}
  
?>