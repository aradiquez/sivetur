<?
class EmpresasController extends AppController{
   var $name= 'Empresas';
   var $displayField='name';
   
   var $helpers = array('Html','Form','Javascript','Fck','Funciones');
   var $components = array('Thumbnail','Image');
   var $pageTitle = 'Modulo Informaciones';
   
   var $model = 'Empresa';

function beforeRender() {   
        
          $this->set('mensajes',Configure :: load('messages'));
        //$this->Session->setflash(Configure::read('Condition.nombre_i_required'));
     }


function index(){       
    $nodelist = $this->{$this->model}->generatetreelist(array('status' => 'A'), '{n}.Empresa.id', '{n}.Empresa.name', '&nbsp;&nbsp;&nbsp;&nbsp;');
    $nodelist_inac = $this->{$this->model}->generatetreelist(array('status' => 'I'), '{n}.Empresa.id', '{n}.Empresa.name', '&nbsp;&nbsp;&nbsp;&nbsp;');
    //$nodelist = $this->{$this->model}->find('all',array('fields' => array('id','name_e','status'), 'order' => 'lft'));
    $this->set($this->name, $nodelist);
    $this->set('Inactivos',$nodelist_inac);
    //pr($nodelist);
    //exit;

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
 

function add($ids = null)
{
  $this->set('msj_errvalidacion','Error');
  $error=0;# para controlar el Type de error
  
  $this->set('reg', $ids);
  
  $this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));
  
  if($ids<>null){
  	$this->set('ruta',$this->{$this->model}->getPath($ids, array('name'), null));
  }
  
	if(!empty($this->data)){
			$this->{$this->model}->create();
		
		# valido los datos de entrada de la Condition
		$this->{$this->model}->set($this->data);
		
		if ($this->{$this->model}->validates()){
			if ($this->{$this->model}->save($this->data)){	  
				$this->Session->setflash('La '.$this->model.' ha sido guardada con exito.');
				$this->redirect('index/');
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
	$this->set('reg',$id);	
	
  $this->set('msj_errvalidacion', 'Error');
  $photo_error=0;
  $error=0;# para controlar el Type de error
	 
  $this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));
  $this->set('selectedEstado', null);
  
	if (empty($this->data))#se cargan los datos
	{
	        $this->{$this->model}->id = $id;
	        $this->data = $this->{$this->model}->read();
	        $data =$this->{$this->model}->read(null, $id);
      		$this->set($this->name, $data); 
	    
	}else # se actualizan los datos
	    {            
            
	    $this->{$this->model}->set($this->data);
	    
		  if ($this->{$this->model}->validates())
		      {     # si son validos
					# guardo los cambios
					if ($this->{$this->model}->save($this->data[$this->model]))
			        {	    
					     $this->Session->setflash('El '.$this->model.' '. $this->data[$this->model]['name'] .' ha sido actualizada con exito.');
			    		     $this->redirect('index/');
			        }
	    		
	    	}else{
				$errors = $this->{$this->model}->invalidFields();
				pr($errors);
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
	$hijos = $this->{$this->model}->children($id);
   
	if(count($hijos)>0){
		$this->Session->setflash($datosCat[$this->model]['name'].' - NO PUEDE SER ELIMINADO porque tiene registros relacionados<br/> Elimine primer los registros relacionados, para continuar con la eliminacion');
	} else {
		
		$this->{$this->model}->del($id);
		$this->Session->setflash('El '.$this->model.' fue eliminada exitosisamente');
	}
    $this->redirect('index/');
}	 

}
?>