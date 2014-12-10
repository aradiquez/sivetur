<? class ColaboradoresController extends AppController{
  var $name="Colaboradores";
  var $helpers = array('Html','Form','Javascript','Fck', 'Tree');
  var $components = array('Thumbnail','Image');
  var $pageTitle = 'Modulo Colaboradores';
  var $model = 'Colaboradore';
  var $message = 'Colaborador';
  var $directorio = '/colaboradores';
  var $uses = array("Photo", 'Colaboradore');

   
	function index(){
		$this->set('Colaboradores', $this->{$this->model}->find('all'));
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
				$this->Session->setFlash('El '.$this->message.' se ha guardado con exito.','default', array('class' => 'success'));
				$this->redirect($this->directorio);
			}else{
				$this->Session->setFlash('El '.$this->message.' no se pudo salvar. <br/> Por favor, intentelo de nuevo.','default',array('class' => 'error'));
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
				$this->Session->setflash('El '.$this->message.' ha sido actualizado.','default',array("class"=>"success"));
				$this->redirect($this->directorio);
			} else {
				$this->Session->setFlash('El '.$this->message.' no se pudo actualizar. <br/> Por favor, intentelo de nuevo.','default',array('class' => 'error'));
			}	  
			$data = $this->data;
			$this->set("{$this->name}", $data);
			$this->set('selectedEstado', null);
		}
	}
  
	function delete($id) {
    #deleting the photos related to this record
    $condicion =array('`Photo`.`generic_id`'=>$id, '`Photo`.`key`' => "4");
    $photos_related = $this->Photo->find('all',array('conditions' => $condicion, 'order' => array('name ASC')));
    foreach ($photos_related as $photo) {
    	if(!empty($photo['Photo']['name'])){
    	  if ($this->Image->delete_image($photo['Photo']['name'],'/')){
        	$this->Photo->delete($photo['Photo']['id']);
        }
      }     
    }
    
		$this->{$this->model}->delete($id);
    $this->Session->setflash('El '.$this->message.' ha sido eliminado.','default',array("class"=>"success"));
	  $this->redirect($this->directorio);
	}
  
}

?>