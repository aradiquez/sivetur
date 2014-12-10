<?
class EncuestasController extends AppController{
   var $name= 'Encuestas';
   var $displayField='name';
   
   var $helpers = array('Html','Form','Javascript','Fck','Funciones');
   var $components = array('Thumbnail','Image');
   var $pageTitle = 'Modulo Encuestas';
   
   var $model = 'Encuesta';

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
  $error=0;# para controlar el Encuesta de error
  
  $this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));
  
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
			if($error==1)
				$this->set('msj_errvalidacion', $this->model.' ya existe...');
			else
				$this->set('msj_errvalidacion', 'Nombre de la '.$this->model.' requerido.');
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
  $error=0;# para controlar el Encuesta de error
	 
  $this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));
  
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
				if($error==1)
					$this->set('msj_errvalidacion',$this->model.' ya existe.');
				else
					$this->set('msj_errvalidacion','Nombre del '.$this->model.' requerido.');
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
	$err = false;
	
	$datosCat= $this->{$this->model}->read(null,$id);  

	if((count($datosCat['Noticias'])>0))
 	{
		//$this->Session->setflash('No es posible eliminar el Encuesta '.$datosCat[$this->model]['name'].', porque tiene registros relacionados.');	
		
		$this->Image->setPath('Noticia');
		
		foreach($datosCat['Noticias'] as $noticia){
			for ($e=1;$e<=5;$e++)
			{
				if(!empty($noticia['photo'.$e]))
				{    
		            //echo $datos['New']['photo'.$e]."<br/>";
					if(!$this->Image->delete_image($noticia['photo'.$e],''))
					{
						$err=true;
						break;
					}
				}
			}
		}//fin foreach
		
		if(!$err){
			$this->{$this->model}->del($id);
			$this->Session->setFlash('La noticia fue borrada...');
		}else {
			$this->Session->setFlash('Problemas al borrar la noticia...');
		}
		
	}else{   
		$this->{$this->model}->del($id);
		$this->Session->setflash('El '.$this->model.' fue eliminada exitosisamente');
	}
    $this->redirect('index/');
}	 

}
?>