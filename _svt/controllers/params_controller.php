<?php 
class ParamsController extends AppController
{
    var $name = "Params";
	//var $components = array('SdAuth');
    var $helpers = array('Html', 'Form');
	var $model = "Param";
    
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
		if(empty($this->data))
	    {  
		  $this->{$this->model}->id = $id;
	      $this->data = $this->{$this->model}->read();
	      $data =$this->{$this->model}->read(null, $id);
	      $this->set($this->name, $data);
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
		}
	}
		
}

?>