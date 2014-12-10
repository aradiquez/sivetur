<? 
class Noticia extends AppModel
{
  	var $name="Noticia";
  	var $displayField= 'title_e'; 
						
	var $validate = array(
  						'name'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar un titulo para la noticia en español.'
	        									)),
						'enca'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar un encabezado en español.'
	        									)),
						
						'details'=> array( 'required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'Debe ingresar un detalle en español.'
	        									))
	        				); 

  /** ** relacion entre New y topicos (de pertenece) **** *** **** ***/
				var $belongsTo = array('Topics' => 
							             array('className' => 'Topic',
							                   'conditions' => '',
							                   'order' => '',
							                   'foreignKey' =>'topic_id',
							                   'counterCache' => '',
							                   'dependent'     => true,
                              				   'exclusive'     => false,
                              				   'finderQuery'   => ''));

  
  
  
  function topicos(){
            $ret = $this->query("SELECT id, name FROM topics WHERE status='A'");
            $new=array();
	    foreach($ret as $cate):
                     $new[$cate['topics']['id']]=$cate['topics']['name'];
            endforeach;
         return $new;
    }




}
?>
