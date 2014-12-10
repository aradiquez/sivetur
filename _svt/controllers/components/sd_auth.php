<?
class SdAuthComponent extends Object
{
	var $components = array('RequestHandler', 'Session');	
	
	var $user_model = "Usuario";
	var $user_fields = array('id'=>'id', 'nombre' =>'nombre','username'=>'usuario','password'=>'clave');
	var $sesskey = "AdminExploring";
	
	/* Don't modify these variables */
    var $last_page = null;
    var $user = null;
    var $controller = true;
    
	function startup(&$controller)
    {
		$this->controller = &$controller;
	}
    
    
	/**
	 * islogin
	 * 
	 * @param void
	 * @return true/false
	 */
	function isloggedin(){
        
		$islogin = $this->Session->read($this->sesskey);
		
		if(!empty($islogin)|| $islogin==True){
			return True;
		
		}else{
			#not yet logged in.
			#check
			if(isset($_POST['mode']) && $_POST['mode'] =='auth_login'){
				#data was posted.
				return $this->check($_POST['username'],$_POST['password']);
			} else {
				#You can't enter!
				return false;
			}
		}
	}

	/**
	 * check
	 * 
	 * @param $username
	 * @param $password
	 * @return true/false
	 */
	function check($username, $password){
		
		$conditions = array($this->user_model.".".$this->user_fields['username'] => $username, $this->user_model.".".$this->user_fields['password'] =>md5($password), $this->user_model.".estado" => 'A');
		
        $UserModel = $this->_createModel();
        $user = $UserModel->find($conditions);
		
		//pr($user);exit;
		
		if (!empty($user)) {
	
			if($username == $user[$this->user_model][$this->user_fields['username']] && md5($password)== $user[$this->user_model][$this->user_fields['password']])
			{
				
				#almaceno los datos del usuario en la secion
				$sessdata[$this->user_model]['id'] = $user[$this->user_model][$this->user_fields['id']];
	            $sessdata[$this->user_model]['Nom_usuario'] = $user[$this->user_model][$this->user_fields['nombre']];
				$sessdata[$this->user_model]['usuario'] = $user[$this->user_model][$this->user_fields['username']];
	            $sessdata[$this->user_model]['clave'] = $user[$this->user_model][$this->user_fields['password']];
	            $sessdata[$this->user_model]['perfil'] = $user[$this->user_model]['perfil'];
            	
				#cargo la sesion con los datos
				$this->Session->write($this->sesskey, $sessdata);
				
				$zone=3600*-6;
				$fecha= date("Y-m-d");
				$hora=gmdate("h:i:s",time()+$zone);
				
				$user['Usuario']['ultimo_ingreso']=$fecha;
				$user['Usuario']['hora']=$hora;
				$UserModel->save($user);
				
				return true;
				
			} else {
				$this->Session->write($this->sesskey,false);
				$this->Session->setflash('Error: Contraseña ó Usuario no válido.');
				return false;
			}
		}else{
			$this->Session->write($this->sesskey,false);
			$this->Session->setflash('Error: Contraseña ó Usuario no válido.');
			return false;
		}
			
		
	}
	/**
	 * logout
	 * 
	 * @param void
	 * @return void
	 */
	function logout(){
		$this->Session->write($this->sesskey,false);
		$this->user = null;
        $this->Session->delete($this->sesskey);
        #$page = (!empty($redirect)) ? $redirect : $this->logout_page;
        #$this->controller->redirect($page);
	}
	
	/**
     * Create the User model to be used in login methods.
     */
     
    function _createModel()
    {
        # since we don't know if the models have extra associations we need to
        # unbind all the models, and bind only the ones we're interested in
        # mainly for performance ( and security )
        
        if (ClassRegistry::isKeySet($this->user_model))
        {
            $UserModel =& ClassRegistry::getObject($this->user_model); 
        } 
        else 
        { 
             ///loadModel($this->user_model);
	    App::import('Model',$this->user_model);
            $UserModel =& new $this->user_model; 
            
        }
        return $UserModel;
	}
	 
}# fin del componente

?>