<?
class Section extends AppModel
{
    var $name="Section";
	var $displayField='nombre_seccion_e';

	var $validate = array('title_e'=>  VALID_NOT_EMPTY,  
                      'title_i'=>VALID_NOT_EMPTY);
	
	
	/*var $hasMany=array('Secphotos' =>
                                    array('className' => 'Secphoto',
                                          'conditions' =>array('clave'=>'se'),
                                          'order' => '',
                                          'foreignKey' => 'generic_id',
                                           'counterCache' => ''));
	*/
}

?>