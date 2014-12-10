<? class ProgramasCircuitosController extends AppController{
  var $name="ProgramasCircuitos";
  var $helpers = array('Html','Form','Javascript','Fck', 'Tree');
  var $components = array('Thumbnail','Image');
  var $pageTitle = 'Modulo Programas y Circuitos';
  var $model = 'ProgramasCircuito';
  var $uses = array("Photo", 'ProgramasCircuito');

   
	function index(){
		$this->set('ProgramasCircuitos', $this->{$this->model}->find('threaded', array('fields'=>array('id','name', 'estado', 'parent_id'))));
	}

	function add() {
		$this->set('estadoArray',array('A' => 'Activo','I' => 'Inactivo'));
		$this->set("parentArray", $this->{$this->model}->find('threaded', array('fields'=>array('id','name', 'parent_id'))));
		if(empty($this->data)){
			$this->set('selectedEstado', null);
			$this->set('selectedParent', null);
		} else {
			$this->{$this->model}->set($this->data);    
			# valido los datos de entrada de la categoria
			if ($this->{$this->model}->validates($this->data)) {	  
				$this->{$this->model}->save($this->data);
				$this->Session->setFlash('El programa y circuito se ha guardado con exito.','default', array('class' => 'success'));
				$this->redirect("/programas_circuitos");
			}else{
				$this->Session->setFlash('El programa y circuito no se pudo salvar. <br/> Por favor, intentelo de nuevo.','default',array('class' => 'error'));
			}

			$data = $this->data;
			$this->set("{$this->name}", $data);
			$this->set('selectedEstado', null);
			$this->set('selectedParent', null);
		}
	}
	
  
	function edit($id=null){	
		$this->set('estadoArray',array('A' => 'Activo','I' => 'Inactivo'));
		$this->set("parentArray", $this->{$this->model}->find('threaded', array('fields'=>array('id','name', 'parent_id'))));
		if(empty($this->data)) {  
		  $this->{$this->model}->id = $id;
		  $this->data = $this->{$this->model}->read();
		  $data =$this->{$this->model}->read(null, $id);
		  $this->set($this->model, $data);
		  $this->set('selectedEstado', null);
		  $this->set('selectedParent', null);
		}else {   
			if ($this->{$this->model}->validates($this->data)){
				$this->{$this->model}->save($this->data);
				$this->Session->setflash('El programa y circuito ha sido actualizado.','default',array("class"=>"success"));
				$this->redirect('index');
			} else {
				$this->Session->setFlash('El programa y circuito no se pudo actualizar. <br/> Por favor, intentelo de nuevo.','default',array('class' => 'error'));
			}	  
			$data = $this->data;
			$this->set("{$this->name}", $data);
			$this->set('selectedEstado', null);
			$this->set('selectedParent', null);
		}
	}
  
	function delete($id) {
    #deleting the photos related to this record
    $condicion =array('`Photo`.`generic_id`'=>$id, '`Photo`.`key`' => "2");
    $photos_related = $this->Photo->find('all',array('conditions' => $condicion, 'order' => array('name ASC')));
    foreach ($photos_related as $photo) {
    	if(!empty($photo['Photo']['name'])){
    	  if ($this->Image->delete_image($photo['Photo']['name'],'/')){
        	$this->Photo->delete($photo['Photo']['id']);
        }
      }     
    }
      
		$this->{$this->model}->delete($id);
    $this->Session->setflash('El programa y circuito ha sido eliminado.','default',array("class"=>"success"));
	  $this->redirect("/programas_circuitos");
	}
  
}

?>