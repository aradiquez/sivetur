<?
class Section extends AppModel {
    var $name="Section";
	var $displayField='title';

	/*var $validate = array('title'=> array('required' => 
   											array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar un titulo.'
	        									)
								 		)
						);
	*/
	
	/*var $hasMany=array('Secphotos' =>
                                    array('className' => 'Secphoto',
                                          'conditions' =>array('clave'=>'se'),
                                          'order' => '',
                                          'foreignKey' => 'generic_id',
                                           'counterCache' => ''));
	*/
}

?>