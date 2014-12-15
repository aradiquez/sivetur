<?php 
class ParamsController extends AppController {  
	public function beforeFilter() {
		parent::beforeFilter();
	    $session = $this->Session->read($this->sesskey);
	    if ($session['Usuario']['perfil'] != 0) {
		    $this->Session->setflash("You user is not allow to be on this section, is reserved only for Administrators",'default',array("class"=>"error"));
			$this->redirect('/');
	    }
	}

    var $name = "Params";
	//var $components = array('SdAuth');
    var $helpers = array('Html', 'Form', 'Tree', 'Funciones');
	  var $model = "Param";
    var $uses = array('Param', 'ProgramasCircuito');
    
    function index()
    {
	  $this->{$this->model}->recursive = 0;
	  $this->set("{$this->name}", $this->paginate());
    }
	
    function logout(){
        $this->Session->destroy('user');
		$this->redirect('login'); 
    }
   	
	function edit($id){
    $this->set('categorias', $this->ProgramasCircuito->find('threaded', array('fields'=>array('id','name', 'estado', 'parent_id'))));
    $this->set('paginacionArray',array('10' => '10','20' => '20','30' => '30','40' => '40', '50' => '50','60' => '60', '70' => '70','80' => '80', '90' => '90','100' => '100'));
		if(empty($this->data))
	    {  
		  $this->{$this->model}->id = $id;
	      $this->data = $this->{$this->model}->read();
	      $data =$this->{$this->model}->read(null, $id);
	      $this->set($this->name, $data);
        $this->set('paginacionPrioridad', null);
	   }else {   
			# valido los datos de entrada
			if ($this->{$this->model}->validates()){	
				# ademas de ser validos y la imagen no hay errores -> guardo los cambios    
				$this->{$this->model}->save($this->data);
				$this->Session->setflash("Se han actualizado correctamente los parametros",'default',array("class"=>"success"));
				$this->redirect('index/');
			}else{
				//$this->data[$this->model]['image']= $img_act;#sostengo la actual
				$errors = $this->{$this->model}->invalidFields();
			}
			$this->set("{$this->model}",$this->data);
      $this->set('paginacionPrioridad', null);
		}
	}	
		
    
	function fnCambiaf_normal($fecha) { 
	    ereg( "([0-9]{2,4})/([0-9]{1,2})/([0-9]{1,2})", $fecha, $mifecha); 
	    $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1]; 
	    return $lafecha; 
	}

	function fncFormatoFecha($fecha, $separador="/") { 
	    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha); 
	    $lafecha = $mifecha[3].$separador.$mifecha[2].$separador.$mifecha[1]; 
	    return $lafecha; 
	}  
}

?>