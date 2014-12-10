<? 
class Patrocinadore extends AppModel
{
  	var $name="Patrocinadore";
  	var $displayField= 'name'; 
						
	var $validate = array(
  						'name'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar un para el link.'
	        									)),
						'intro'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar una introduccion en español.'
	        									)),
						'details'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar un detalle en español.'
	        									))
	        				); 

}
?>
