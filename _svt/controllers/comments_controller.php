<?
class CommentsController extends AppController{
   var $name= 'Comments';
   var $displayField='name';
   
   var $helpers = array('Html','Form','Javascript','Fck','Funciones');
   var $components = array('Thumbnail','Image');
   var $pageTitle = 'Modulo Comments';
   
   var $model = 'Comment';

function beforeRender() {   
        
          $this->set('mensajes',Configure :: load('messages'));
        //$this->Session->setflash(Configure::read('Condition.nombre_i_required'));
     }


function index(){      
    $this->{$this->model}->recursive = 0; 
    $this->paginate['limit'] = 20;
    $this->paginate['order'] = array( $this->model.".id desc");
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
  $error=0;# para controlar el Comment de error
  
  $this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));
  $this->set('IdiomaArray',array('E' => 'Español','I' => 'Ingles'));
  $this->set('msj_foto_error','');
  
	if(!empty($this->data)){
			$this->{$this->model}->create();
		
		# valido los datos de entrada de la Condition
		$this->{$this->model}->set($this->data);
		
		if ($this->{$this->model}->validates()){
            ///==============================================================================================

			if ($this->{$this->model}->save($this->data)){	  
				$this->Session->setflash('La '.$this->model.' ha sido guardada con exito.');
				$this->redirect('index/');
	        }
		} else {		
			$errors = $this->{$this->model}->invalidFields();
			
			if(!empty($this->data[$this->model]['foto']['name']))
				{
					$this->Thumbnail->eliminar($this->data[$this->model]['foto']);
					$this->data[$this->model]['foto']='';
					
				}  
            	if(!empty($this->Thumbnail->errors[0]))
					$this->set('msj_foto_error',$this->Thumbnail->errors[0]);
	    }
	
	  	 $data = $this->data;
		 $this->set($this->name,$data);
		 ${$this->model} = null;
		 $this->set('selectedEstado', null);
		 $this->set('selectedIdioma', null);
	} else {
        $this->set('selectedEstado', null);
        $this->set('selectedIdioma', null);
    }
}
/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/

function edit($id = null){
   
   if (!$id && empty($this->data)) {
			$this->flash(__('Invalida '.$this->model, true), array('action'=>'index'));
		}
  $this->set('msj_errvalidacion', 'Error');
  $photo_error=0;
  $error=0;# para controlar el Comment de error
	 
  $this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));
  $this->set('IdiomaArray',array('E' => 'Español','I' => 'Ingles'));
  
	if (empty($this->data))#se cargan los datos
	{
	        $this->{$this->model}->id = $id;
	        $this->data = $this->{$this->model}->read();
	        $data =$this->{$this->model}->read(null, $id);
      		$this->set($this->name, $data); 
	    
      	$this->set('selectedEstado', null);
      	$this->set('selectedIdioma', null);
      		
	}else # se actualizan los datos
	    {            
            
	    $this->{$this->model}->set($this->data);
		  if ($this->{$this->model}->validates())
		      {     # si son validos
		      	
					# guardo los cambios
					if ($this->{$this->model}->save($this->data[$this->model]))
			        {	    
					     $this->Session->setflash('La '.$this->model.' '. $this->data[$this->model]['name'] .' ha sido actualizada con exito.');
			    		     $this->redirect('index/');
			        }
	    		
	    	}else{
				$errors = $this->{$this->model}->invalidFields();
				pr($errors);
				if(!empty($this->Thumbnail->errors[0]))
					$this->set('msj_foto_error',$this->Thumbnail->errors[0]);
		    }
		    
		    $data = $this->data;
			$this->set($this->name,$data);
			${$this->model} = null;   
			
			$this->set('selectedEstado', null);
			$this->set('selectedIdioma', null);
	    }

}

/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
 
function delete($id)
{
	$this->Image->setPath('comments');
	
	$datosCat= $this->{$this->model}->read(null,$id);
	
	if(!empty($datosCat[$this->model]['foto']))
		$this->Image->delete_image($datosCat[$this->model]['foto'],'');
	
	$this->{$this->model}->del($id);
	$this->Session->setflash($datosCat[$this->model]['name'].' fue eliminada exitosisamente');
		
    $this->redirect('index/');
}	 

}
?>