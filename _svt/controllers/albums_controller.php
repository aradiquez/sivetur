<?
class AlbumsController extends AppController{
   var $name= 'Albums';
   var $displayField='name';
   
   var $helpers = array('Html','Form','Javascript','Fck','Funciones');
   var $components = array('Thumbnail','Image');
   var $uses = array('Album','Category');
   var $pageTitle = 'Modulo Albums';
   
   var $model = 'Album';

function beforeRender() {   
        
          $this->set('mensajes',Configure :: load('messages'));
        //$this->Session->setflash(Configure::read('Condition.nombre_i_required'));
     }


function index(){      
    $this->{$this->model}->recursive = 0; 
    $this->paginate['limit'] = 20;
   	$condicion = array();
    $this->set($this->name, $this->paginate($this->model,$condicion));
  }
  
function logout(){
		$this->SdAuth->logout();
		$this->redirect("/index.php");
	}
 
function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalida condicion', true), array('action'=>'index'));
		}
		$this->set($this->name, $this->{$this->model}->read(null, $id));
	}
/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
 

function add()
{
  $this->set('msj_errvalidacion','Error');
  $error=0;# para controlar el Album de error
  
  $this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));
  $this->set('categoriaArray', $this->Category->find('list',array( 'fields' =>array('id','name'), 'conditions' => array('status' => 'A'), 'order' => array('name' => 'asc'))));
  $this->set('selectedCategoria',null);
  
  
	if(!empty($this->data)){
			$this->{$this->model}->create();
		
		# valido los datos de entrada de la Condition
		$this->{$this->model}->set($this->data);
		
		if ($this->{$this->model}->validates()){
			if ($this->{$this->model}->save($this->data)){	  
				$this->Session->setflash('La '.$this->model.' ha sido guardada con exito.');
				$this->redirect('index');
	        }
		} else {		
			$errors = $this->{$this->model}->invalidFields();
	    }
	
	  	 $data = $this->data;
		 $this->set($this->name,$data);
		 ${$this->model} = null;
		 $this->set('selectedEstado', null);
	} else {
        $this->set('selectedEstado', null);
    }
}
/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/

function edit($id = null){
   
   if (!$id && empty($this->data)) {
			$this->flash(__('Invalida '.$this->model, true), array('action'=>'index'));
		}
  $this->set('msj_errvalidacion', 'Error');
  $photo_error=0;
  $error=0;# para controlar el Album de error
	 
  $this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));
  
  $this->set('categoriaArray', $this->Category->find('list',array( 'fields' =>array('id','name'), 'conditions' => array('status' => 'A'), 'order' => array('name' => 'asc'))));

  
	if (empty($this->data))#se cargan los datos
	{
	        $this->{$this->model}->id = $id;
	        $this->data = $this->{$this->model}->read();
	        $data =$this->{$this->model}->read(null, $id);
      		$this->set($this->name, $data); 
	    
      	$this->set('selectedEstado', null);
      	$this->set('selectedCategoria',null);
      		
	}else # se actualizan los datos
	    {            
            
	    $this->{$this->model}->set($this->data);
		  if ($this->{$this->model}->validates())
		      {     # si son validos
					# guardo los cambios
					if ($this->{$this->model}->save($this->data[$this->model]))
			        {	    
					     $this->Session->setflash('La '.$this->model.' '. $this->data[$this->model]['name'] .' ha sido actualizada con exito.');
			    		     $this->redirect('index');
			        }
	    		
	    	}else{
				$errors = $this->{$this->model}->invalidFields();
		    }
		    
		    $data = $this->data;
			$this->set($this->name,$data);
			${$this->model} = null;   
			
			$this->set('selectedEstado', null);
	    }

}

/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
 
function delete($id)
{
	$datosCat= $this->{$this->model}->read(null,$id);
	
	$this->Image->setPath('albums');
		
		foreach($datosCat['Photos'] as $phot){
			# elimino la foto actual
			if(!empty($phot['filename'])){
				$this->Image->delete_image($phot['filename'],'');   
	        }	
		}	
		
	$this->{$this->model}->del($id);
	$this->Session->setflash('El '.$this->model.' fue eliminada exitosisamente');
		
    $this->redirect('index');
}	 

}
?>