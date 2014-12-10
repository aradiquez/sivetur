<?
class Tag extends AppModel {
    var $name="Tag";

	  var $validate = array(
   			'name' =>  array('required' => 
   											array(
	            								'rule' => 'notEmpty',
	            								'message' => 'El nombre es requerido.'
	        									)
								 		)
    );  
}
?>