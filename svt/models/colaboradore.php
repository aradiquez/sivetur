<?
class Colaboradore extends AppModel {
    var $name="Colaboradore";

	  var $validate = array(
   			'nombre' =>  array('required' => 
   											array(
	            								'rule' => 'notEmpty',
	            								'message' => 'El nombre es requerido.'
	        									)
								 		)
    );  
}
?>