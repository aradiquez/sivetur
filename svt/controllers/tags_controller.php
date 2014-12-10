<? class TagsController extends AppController{
  var $name="Tags";
  var $helpers = array('Html','Form','Javascript','Fck', 'Tree');
  var $pageTitle = 'Modulo Tags';
  var $model = 'Tag';
  var $directorio = '/tags';

   
	function index(){
		$this->set('Tags', $this->{$this->model}->find('all'));
	}

	function add() {
		$this->set('estadoArray',array('A' => 'Activo','I' => 'Inactivo'));
		if(empty($this->data)){
			$this->set('selectedEstado', null);
		} else {
			$this->{$this->model}->set($this->data);    
			# valido los datos de entrada de la categoria
			if ($this->{$this->model}->validates($this->data)) {	  
				$this->{$this->model}->save($this->data);
				$this->Session->setFlash('El '.$this->model.' se ha guardado con exito.','default', array('class' => 'success'));
				$this->redirect($this->directorio);
			}else{
				$this->Session->setFlash('El '.$this->model.' no se pudo salvar. <br/> Por favor, intentelo de nuevo.','default',array('class' => 'error'));
			}

			$data = $this->data;
			$this->set("{$this->name}", $data);
			$this->set('selectedEstado', null);
		}
	}
	
	function edit($id=null){	
		$this->set('estadoArray',array('A' => 'Activo','I' => 'Inactivo'));
		if(empty($this->data)) {  
		  $this->{$this->model}->id = $id;
		  $this->data = $this->{$this->model}->read();
		  $data =$this->{$this->model}->read(null, $id);
		  $this->set($this->model, $data);
		  $this->set('selectedEstado', null);
		}else {   
			if ($this->{$this->model}->validates($this->data)){
				$this->{$this->model}->save($this->data);
				$this->Session->setflash('El '.$this->model.' ha sido actualizado.','default',array("class"=>"success"));
				$this->redirect($this->directorio);
			} else {
				$this->Session->setFlash('El '.$this->model.' no se pudo actualizar. <br/> Por favor, intentelo de nuevo.','default',array('class' => 'error'));
			}	  
			$data = $this->data;
			$this->set("{$this->name}", $data);
			$this->set('selectedEstado', null);
		}
	}
  
	function delete($id) {
		$this->{$this->model}->delete($id);
    $this->Session->setflash('El '.$this->model.' ha sido eliminado.','default',array("class"=>"success"));
	  $this->redirect($this->directorio);
	}
  
}

?>