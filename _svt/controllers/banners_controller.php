<?
class BannersController extends AppController{
   var $name= 'Banners';
      
   var $helpers = array('Html','Form','Javascript','Fck','Funciones');
   var $components = array('Thumbnail','Image');
   var $pageTitle = 'Modulo Banners';
   
   var $index_page = 'index';
	var $model="Banner";
   
   	var $msjadd = "El Banner ha sido guardado satisfactoriamente.";
	var $msjedit = "El Banner ha sido actualizado satisfactoriamente.";
	var $msjdel = "El Banner ha sido eliminado satisfactoriamente.";
    
    var $estados = array('A' =>'Activo','I' =>'Inactivo');	
	var $prioridades = array('1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10');
	var $tipos = array('1' => 'Banner 965X102', '2' => 'Panel izquierdo 164X523', '3' => 'Footer 234X60');

function beforeRender() {   
        
          $this->set('mensajes',Configure :: load('messages'));
        //$this->Session->setflash(Configure::read('Categorie.nombre_i_required'));
     }


function index()
{
          
    $this->{$this->model}->recursive = 0; 
    $this->paginate['limit'] = 20;
    $condicion = '';//array('keyword'=>$tip);
    $this->set($this->name, $this->paginate($this->modelClass,$condicion));
    //$this->set('tip',$tip);
  }
function logout(){
		$this->SdAuth->logout();
		$this->redirect("/index.php");
	}
 
function view() {
		$this->set($this->name, $this->{$this->model}->read(null, $id));
	}
/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
 

function add()
{
  $this->set('msj_errvalidacion','Error');
  $this->set('msj_photo_error', array());
  $error=0;# para controlar el tipo de error
  $fileName="";
  
  $this->set('estadoArray',$this->estados);
  $this->set('prioridadArray',$this->prioridades);
  $this->set('tipoArray',$this->tipos);
  
 if(!empty($this->data))
   {

    $this->{$this->model}->set($this->data);
    
    //pr($this->data);
	
	switch($this->data[$this->model]['tipo']){
		case '1':
			$this->Image->setSize('965','102');
		break;
		case '2':
			$this->Image->setSize('164','523');
		break;
		case '3':
			$this->Image->setSize('234','60');
		break;
	}
    
		//BANNER ESPAÑOL
        if (!empty($this->data[$this->model]['banner']['tmp_name']))//pnt
             {   if($fileName= $this->Image->upload_image($this->data,$this->model,'banner', '278',true)){
                    $this->data[$this->model]['banner'] = $fileName;
            } else { 
                      //$this->data['Service']['banner']='';
                      $this->{$this->model}->invalidate('banner');
                      $this->set('msj_photo_error',$this->Image->errors);
                    }
            }else { 
                      unset($this->data[$this->model]['banner']);
                      $this->data[$this->model]['banner']="";
                   }

	# valido los datos de entrada de la Categorie
	//$this->Service->set($this->data);
	if ($this->{$this->model}->validates())
	{
		if ($this->{$this->model}->save($this->data))
	      {	  
			$this->Session->setFlash($this->msjadd,'default',array("class"=>"success"));
			 
            $this->redirect('index');
	      
              
              }
	}else
	{
		if(!empty($fileName))
		{
			$this->Thumbnail->eliminar($fileName);
			$this->data[$this->model]['banner']='';
		}

    }
    
  	 $data = $this->data;
	 $this->set($this->name,$data);
	 $this->set('selectedEstado', null);
	 $this->set('selectedPrioridad', null);
	 $this->set('selectedTipo',null);
   }
   else
   {
      
        $this->set('selectedEstado', null);
        $this->set('selectedPrioridad', '5');
        $this->set('selectedTipo', null);
             
   }

}
/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
/** start edit */


function edit($id)
{
   

  $this->set('msj_errvalidacion', 'Error');
  $photo_error=0;
  $error=0;# para controlar el tipo de error
    
  $this->set('estadoArray',$this->estados);
  $this->set('prioridadArray',$this->prioridades);
  $this->set('tipoArray',$this->tipos);
  
  
	if (empty($this->data))#se cargan los datos
	    {
	        $this->{$this->model}->id = $id;
	        $this->data = $this->{$this->model}->read();
	        $data =$this->{$this->model}->read(null, $id);
      		$this->set($this->name, $data);
      		
      		$this->set('selectedTipo', $data[$this->model]['tipo']); 
	    
		}else # se actualizan los datos
	    {            
            
                    $this->{$this->model}->set($this->data);
           
          			switch($this->data[$this->model]['tipo']){
						case '1':
							$this->Image->setSize('965','102');
						break;
						case '2':
							$this->Image->setSize('164','523');
						break;
						case '3':
							$this->Image->setSize('234','60');
						break;
					}
                    
                    //BANNER ESPAÑOL
                    if (!empty($this->data[$this->model]['banner']['tmp_name'])) { //pnt
                        if($fileName= $this->Image->upload_image($this->data,$this->model,'banner', '278',true)){
                         	$this->data[$this->model]['banner'] = $fileName;                            
                      	} else {                            
                            $this->{$this->model}->invalidate('banner');                            
                            $this->set('msj_photo_error',$this->image->errors);
                        }
                    } else { 
                        $fotoeli='eliminar_photo';
              			if (!empty($this->data[$this->model][$fotoeli])) {
                            # la elimino fisicamente
                            $this->image->delete_image($this->data[$this->model]['banner_a'],'');
                            $this->data[$this->model]['banner']='';
                         } else { $this->data[$this->model]['banner'] = $this->data[$this->model]['banner_a'];}
                    }
                    
              if ($this->{$this->model}->validates())
		      {     
                     
					if ($this->{$this->model}->save($this->data[$this->model]))
			        {	    
                        $this->Session->setflash($this->msjedit,'default',array("class"=>"success"));
                        $this->redirect('index');
			        }
	    		
	    	}
	    	//pr($this->data);
		    $data = $this->data;
			$this->set($this->name,$data);
			                        
            $this->set('rc',$id);   
			$this->set('selectedTipo', null);
			$this->set('selectedEstado', null);
			$this->set('selectedPrioridad', null);
	    }

}
/*fin edit*/
/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
 
function delete($id)
{
   
 
   # obtengo los datos actuales      
	$datosCat= $this->{$this->model}->read(null,$id);  

            if(!empty($datosCat[$this->model]['banner']))
            {
                    $this->image->delete_image($datosCat[$this->model]['banner'],'');
            }
                
			$this->{$this->model}->del($id);
			 $this->Session->setflash($this->msjdel,'default',array("class"=>"success"));
		
        $this->redirect('index');
}	 

}
?>