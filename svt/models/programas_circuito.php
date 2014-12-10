<?
class ProgramasCircuito extends AppModel {
    var $name="ProgramasCircuito";

    var $hasMany=array('ProgramasCircuitos' =>
                                    array('className' => 'ProgramasCircuito',
                                          'order' => '',
                                          'foreignKey' => 'parent_id',
                                           'counterCache' => ''));
	var $validate = array(
   			'name' =>  array('required' => 
   											array(
	            								'rule' => 'notEmpty',
	            								'message' => 'El nombre es requerido.'
	        									)
								 		),
   			'introduccion' => array('required' => 
   											array(
	            								'rule' => 'notEmpty',
	            								'message' => 'Debe ingresar una introduccion.'
	        									)
								 		),
   			'detalle' => array('required' => array(
	            								'rule' => 'notEmpty',
	            								'message' => 'El detalle del programa y circuito es requerido'
	        									)
								 			),
   );  
}
?>