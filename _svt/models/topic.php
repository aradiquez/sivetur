<?php
class Topic extends AppModel {
	var $name = 'Topic';
   
  	var $validate = array('name'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar un nombre para el topico en español.'
	        									))
	        				); 
	        				
    var $hasMany = array('Noticias' =>
	                    array('className'     => 'Noticia',
	                               'conditions'    => '',
	                               'order'         => '',
	                               'limit'         => '',
	                               'foreignKey'    => 'topic_id',
	                               'dependent'     => true,
	                               'exclusive'     => false,
	                               'finderQuery'   => ''
	                         ));
     
}
  
?>