<?php

class Usuario extends AppModel
{
    var $name = 'Usuario';
    
   var $validate = array(
   			'nombre' =>  array('required' => 
   											array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'El nombre de usuario es requerido.'
	        									),
	        								    'unique' => array(
	            							    'rule' => array('isUnique'),
	            							    'on' => 'create',# ó: 'update'
	            							    'message' => 'Este nombre de usuario ya se encuentra registrado.'
	        								     )
								 		),
   			'usuario' => array('required' => 
   											array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'El username es requerido.'
	        									),
	        								    'unique' => array(
	            							    'rule' => array('isUnique'),
	            							    'on' => 'create',# ó: 'update'
	            							    'message' => 'Este username ya se encuentra registrado.'
	        								     )
								 		),
   			'clave' => array('required' => array(
	            								'rule' => array('notEmpty'),
	            								'required' => true,
	            								'allowEmpty' => false,
	            								'message' => 'El password es requerido'
	        									)
								 			),
   			'clave_confirm' => array('required' => array(
	            									'rule' => array('passwordConfirm'),
	            									'required' => true,
	            									'allowEmpty' => false,
	            									'message' => 'Los password deben coincidir'
	        										)
								 		),
   );  
   
   function passwordConfirm(){
      	if(!empty($this->data["Usuario"]["clave"]) and !empty($this->data["Usuario"]["clave_confirm"])){
			if ($this->data["Usuario"]["clave"] == $this->data["Usuario"]["clave_confirm"]) {
				return true;
			}else {
				return false;
			}
		} else {
			return false;
		}
	}
   
}

?>