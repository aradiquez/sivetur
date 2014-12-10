<? class OfertasController extends AppController{
  var $name="Ofertas";
  var $helpers = array('Html','Form','Javascript','Fck', 'Funciones', 'Tree');
  var $components = array('Thumbnail','Image');
  var $pageTitle = 'Modulo Ofertas';
  var $model = 'Oferta';
  var $directorio = '/ofertas';
  var $uses = array("Photo", 'Oferta');

   
	function index(){
		$this->set('OfertasActivas', $this->{$this->model}->find('all', array('conditions' => ("`Oferta`.`estado` = 'A' AND `Oferta`.`end_date` >= CURDATE()"))));
    $this->set('OfertasInactivas', $this->{$this->model}->find('all', array('conditions' => ("`Oferta`.`estado` = 'I' OR `Oferta`.`end_date` <= CURDATE()"))));
	}

	function add() {
		$this->set('estadoArray',array('A' => 'Activo','I' => 'Inactivo'));
    $this->set('prioridadArray',array('1' => '1','2' => '2','3' => '3','4' => '4', '5' => '5','6' => '6', '7' => '7','8' => '8', '9' => '9','10' => '10'));
    $this->set("Tags", $this->{$this->model}->Tag->find('list', array('estado'=>'A'),'Tag.name ASC',null,'',''));
    $this->set("ProgramaCircuitoArray",  $this->{$this->model}->ProgramasCircuito->find('threaded', array('fields'=>array('id','name', 'parent_id'))));
		if(empty($this->data)){
			$this->set('selectedEstado', null);
      $this->set('selectedPrioridad', null);
      $this->set("selectedProgramaCircuito", null);
		} else {
			$this->{$this->model}->set($this->data);    
			# valido los datos de entrada de la categoria
			if ($this->{$this->model}->validates($this->data)) {	 
        $this->convertDates($this->data[$this->model], 'start_date');
        $this->convertDates($this->data[$this->model], 'end_date'); 
				$this->{$this->model}->save($this->data);
				$this->Session->setFlash('La '.$this->model.' se ha guardado con exito.','default', array('class' => 'success'));
				$this->redirect($this->directorio);
			}else{
				$this->Session->setFlash('La '.$this->model.' no se pudo salvar. <br/> Por favor, intentelo de nuevo.','default',array('class' => 'error'));
			}

			$data = $this->data;
			$this->set("{$this->name}", $data);
			$this->set('selectedEstado', null);
      $this->set('selectedPrioridad', null);
      $this->set("selectedProgramaCircuito", null);
      $this->set('Tag',$data['Tag']);
		}
	}
	
	function edit($id=null){	
		$this->set('estadoArray',array('A' => 'Activo','I' => 'Inactivo'));
    $this->set('prioridadArray',array('1' => '1','2' => '2','3' => '3','4' => '4', '5' => '5','6' => '6', '7' => '7','8' => '8', '9' => '9','10' => '10'));
    $this->set("Tags", $this->{$this->model}->Tag->find('list', array('estado'=>'A'),'Tag.name ASC',null,'',''));
    $this->set("ProgramaCircuitoArray",  $this->{$this->model}->ProgramasCircuito->find('threaded', array('fields'=>array('id','name', 'parent_id'))));
		if(empty($this->data)) {  
		  $this->{$this->model}->id = $id;
		  $this->data = $this->{$this->model}->read();
		  $data =$this->{$this->model}->read(null, $id);
		  $this->set($this->model, $data);
		  $this->set('selectedEstado', null);
		  $this->set('selectedPrioridad', null);
      $this->set('selectedProgramasCircuito', null);
      $this->set('Tag',$data['Tag']);
		}else {   
			if ($this->{$this->model}->validates($this->data)){
        $this->convertDates($this->data[$this->model], 'start_date');
        $this->convertDates($this->data[$this->model], 'end_date');
				$this->{$this->model}->save($this->data);
				$this->Session->setflash('La '.$this->model.' ha sido actualizado.','default',array("class"=>"success"));
				$this->redirect($this->directorio);
			} else {
				$this->Session->setFlash('La '.$this->model.' no se pudo actualizar. <br/> Por favor, intentelo de nuevo.','default',array('class' => 'error'));
			}	  
			$data = $this->data;
			$this->set("{$this->name}", $data);
			$this->set('selectedEstado', null);
      $this->set('selectedPrioridad', null);
      $this->set('selectedProgramasCircuito', null);
      $this->set('Tag',$data['Tag']);
		}
	}
  
	function delete($id) {
    #deleting the photos related to this record
    $condicion =array('`Photo`.`generic_id`'=>$id, '`Photo`.`key`' => "3");
    $photos_related = $this->Photo->find('all',array('conditions' => $condicion, 'order' => array('name ASC')));
    foreach ($photos_related as $photo) {
    	if(!empty($photo['Photo']['name'])){
    	  if ($this->Image->delete_image($photo['Photo']['name'],'/')){
        	$this->Photo->delete($photo['Photo']['id']);
        }
      }     
    }
    
		$this->{$this->model}->delete($id);
    $this->Session->setflash('El tag ha sido eliminado.','default',array("class"=>"success"));
	  $this->redirect($this->directorio);
	}
  
  
  function convertDates( &$data, $fieldName ){
      if (!empty($data[$fieldName]) && strtotime($data[$fieldName]) ){
          $data[$fieldName] = date('Y-m-d', strtotime($data[$fieldName]));
      }
  }
  
}

?>