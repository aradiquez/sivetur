<?php
class UsuariosController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
	    $session = $this->Session->read($this->sesskey);
	    if ($session['Usuario']['perfil'] != 0 && $this->action != 'logout') {
		    $this->Session->setflash("You user is not allow to be on this section, is reserved only for Administrators",'default',array("class"=>"error"));
			$this->redirect('/');
	    }
	}
	
    var $name = 'Usuarios';
    var $components = array('SdAuth');
    var $helpers = array('Html','Form','Javascript','Funciones');
	var $pageTitle = 'Modulo Usuarios';
	
	/** variables configuracion controlador */    
	var $model="Usuario";
	var $listArray="";# nombre del vector para el combo
    var $asociacion="";# nombre de la asocioacion realizada en el modelo
    var $campo_asoc='';# nombre del campo 
    var $index_page = 'index/'; 
    
	function index(){
	    $this->Usuario->recursive = 0;
	    $this->set("{$this->name}",$this->paginate());
    }
	function view($id)
	{
	   $this->set("{$this->name}", $this->{$this->model}->read(null, $id));
	}
	
	function passwordConfirm()
	{
		if ($this->data["Usuario"]["clave"] === $this->data["Usuario"]["clave_confirm"])
		{
			return true;
		}
		return false;
	}

	
	function add() {
	  $this->set('msj_errUsuario', 'Error');
	  $this->set('msj_errClave', 'Error');
	  
	  $this->set('estadoArray',array('A' => 'Activo','I' => 'Inactivo'));
	  $this->set('perfilArray',array('0' => 'Administrador','1' =>'Mantenimiento','2' => 'Digitador','3'=>'Editador'));
	  
	 if(empty($this->data)){
		$this->set('selectedEstado', null);
		$this->set('selectedPerfil', '1');
	 } else {
		$this->{$this->model}->set($this->data);    
		# valido los datos de entrada de la categoria
		if ($this->{$this->model}->validates($this->data)) {	  
			  $this->data[$this->model]["clave"] = md5($this->data[$this->model]['clave']); 
			  $this->data[$this->model]["clave_confirm"] = md5($this->data[$this->model]['clave_confirm']); 
			  $this->{$this->model}->save($this->data);
			  $this->Session->setFlash('El usuario ha sido guardado.');
			  $this->redirect($this->index_page);
	      }else{
	        $this->Session->setFlash('El usuario no pudo ser salvado. <br/> Por favor, intentelo de nuevo.','default',array("class"=>"error"));
	        #contiene el arrego validationErrors
			$errors = $this->{$this->model}->invalidFields();
	     }
			 
	  	 $data = $this->data;
		 $this->set("{$this->name}", $data);
		 $Categoria = null;
		 $this->set('selectedEstado', null);
		 $this->set('selectedPerfil', '1');
	  }
	}
	
	function edit($id = null) {   
	  $this->set('msj_errUsuario', 'Error');
	  $this->set('msj_errClave', 'Error');
	  
	  $this->set('estadoArray',array('A' => 'Activo','I' => 'Inactivo'));
	  $this->set('perfilArray',array('0' => 'Administrador','1' =>'Mantenimiento','2' => 'Digitador','3'=>'Editador'));
	 
		if (empty($this->data)) { #se cargan los datos
	        $this->{$this->model}->id=$id;
	        $this->data = $this->{$this->model}->read();
	        $data =$this->{$this->model}->read(null, $id);
	        #limpio la clave no la necesito
			$data[$this->model]['clave']='';
	        $this->data[$this->model]['clave']='';
	        
      		$this->set("{$this->name}", $data);
      		$this->set('selectedEstado', null);
      		$this->set('selectedPerfil', null);
		}else { # se actualizan los datos		                
	        $netx =$this->{$this->model}->read(null, $id);
	        
	        if(empty($this->data[$this->model]['clave']) and empty($this->data[$this->model]['clave_confirm'])){
	        	$this->data[$this->model]['clave'] = $netx[$this->model]['clave'];	
	        } else {
	        	$this->data[$this->model]['clave'] = md5($this->data[$this->model]['clave']);
	        }
	        
			$this->{$this->model}->set($this->data);
			
			unset($this->{$this->model}->validate['clave']);
			unset($this->{$this->model}->validate['clave_confirm']);
			# valido los datos de entrada de la categoria
			if ($this->{$this->model}->validates($this->data)) {   
				# si son validos
				# guardo los cambios
				if ($this->{$this->model}->save($this->data[$this->model])) {	    
					$this->Session->setflash('El usuario ha sido actualizado con exito.','default',array("class"=>"success"));
		    		$this->redirect($this->index_page);
		        }
	    	}else{
				$this->Session->setFlash('El usuario no pudo ser actualizado. <br/> Por favor, intentelo de nuevo.','default',array("class"=>"error"));
				$errors = $this->{$this->model}->invalidFields();
		    }
		    $data = $this->data;
			$this->set("{$this->name}", $data);
			$Usuario = null;
			
			$this->set('selectedEstado', null);
			$this->set('selectedPerfil', null);
	    }
	
	}

	function delete($id) {
		$this->{$this->model}->del($id);
	    $this->redirect($this->index_page);
	 }
 
    function logout() {
        # Redirect users to this action if they click on a Logout button.
        # All we need to do here is trash the session information:
	    $this->SdAuth->logout();
		# And we should probably forward them somewhere, too...
		$this->Session->setflash('Ahora estas desconectado.');
		$this->redirect('/');    
	}
}
?>