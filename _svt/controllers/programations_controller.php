<?
class ProgramationsController extends AppController {
    var $name= 'Programations';
    var $helpers = array('Html','Form','Javascript','Fck','Funciones');
 	var $components = array('Image', 'Thumbnail');
	var $index_page = 'index';
  	//var $nfotos= 5;
  	var $ancho= 150;//224
  	
  	var $model = 'Programation';
  	
  	var $horario = array('0' => 'a.m.', '1' => 'p.m.');

function index()
{
    $this->{$this->model}->recursive = 2;
    $this->set($this->name, $this->paginate());
}
function logout()
{
	$this->SdAuth->logout();
	$this->redirect("/");
}
function view($id)
{
   $this->set($this->model,$this->{$this->model}->read(null, $id));
}

/** ******************* ****************** ******************* ******************** ******/
function add()
{
	$this->set('msj_errvalidacion','Error');
	$this->set('msj_foto_error','');
	$this->set('error',false);
	
	$error=0;
	
	$this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));	
 
	if(empty($this->data))
	{
		$this->set('selectedEstado', 'A');	
		$this->set("selectedHora","01");	
		$this->set('selectedMinuto', '00');
	
	}else  {
		
		$this->{$this->model}->set($this->data);
		
		$this->data[$this->model]['hour'] = $this->data[$this->model]['hour']['hour'];
		$this->data[$this->model]['min'] = $this->data[$this->model]['min']['min'];
		$this->data[$this->model]['meridian'] = $this->data[$this->model]['meridian']['meridian'];

		
		if ($this->{$this->model}->validates($this->data))
		{
			///////////////////////////////////////////////////////////////////////////////////////////
			  $this->Image->setPath('programations');
	            
			    $nombreNumero='foto';
	            $err = false;
	            if (!empty($this->data[$this->model][$nombreNumero]['tmp_name']))//pnt
	             {
	               if($fileName= $this->Image->upload_image_and_thumbnail($this->data,$this->model,$nombreNumero, '640','150','',false,true,false)){
		           		$this->data[$this->model][$nombreNumero] = $fileName;
	                }else{
	                  $errors[$nombreNumero]= $this->Image->errors;
		  			  $this->set('msj_foto_error',$this->Image->errors);
	                  $err=true;
	                  unset($this->Image->errors);
	                }
	            }else {
					unset($this->data[$this->model][$nombreNumero]);
					$this->data[$this->model][$nombreNumero] = '';
				}
			///////////////////////////////////////////////////////////////////////////////////////////
		
			if($this->{$this->model}->save($this->data))
		      {	  
				$this->Session->setflash('El programa ha sido guardado con exito.');
				$this->redirect($this->index_page);
		      }
		}else{# SI DA ALGUN ERROR LIMPIO TODO
				
			# elimino las fotos y su thumbnail en las q no se dio un error 
			# ya q se generaron siempre

			if(!empty($this->data[$this->model]['foto']))
			{
				$this->Thumbnail->eliminar($this->data[$this->model]['foto']);
				$this->data[$this->model]['foto']='';
			}
			
			if(!empty($this->Thumbnail->errors[0]))
				$this->set('msj_foto_error1',$this->Thumbnail->errors[0]);
			
			$this->set('error',true);
			$errors = $this->{$this->model}->invalidFields();
		}	

		 $data = $this->data;
		 $this->set($this->name, $data);
		 ${$this->model} = null;
		 $this->set('selectedEstado', null);
		 $this->set("selectedHora",null);
		 $this->set('selectedMinuto', null);
    }
}

/** ************************ start edit ********************************************/
function edit($id=null)
{
	$this->set('msj_errvalidacion','error');
	$error=0;
	$this->set('msj_foto_error','');
	$this->set('error',false);
         
	$this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));	
 
   if(empty($this->data))
   {
		#cargo los datos del New
		$this->{$this->model}->id = $id;
		$this->data = $this->{$this->model}->read();
		$data =$this->{$this->model}->read(null, $id);
		$this->set($this->name,$data);
		
		$this->set('selectedEstado',null);
		$this->set("selectedHora",null);
		$this->set('selectedMinuto', null);
   }else
   {
		$this->{$this->model}->set($this->data);
		
		# valido los datos de entrada de la New
		if ($this->{$this->model}->validates($this->data))
		{
			/*********************************************************************************/
			
			/*START  FOTOS*/
		  	$this->Image->setPath('programations');
	           $nombreNumero='foto';//foto que viene ne los datos
		       $fot_act=$this->data[$this->model]['foto_a'];//foto actualmente en la base de datos
	           //echo $fot_act;
	            $err = false;
	            
	            if (!empty($this->data[$this->model][$nombreNumero]['tmp_name']))//pnt
	             {
	               if($fileName= $this->Image->upload_image_and_thumbnail($this->data,$this->model,$nombreNumero, '640','150','',false,true,false)){
		           $this->data[$this->model][$nombreNumero] = $fileName;
			   		if($fot_act!=='')
			   			$this->Image->delete_image($fot_act,'');    
	                }else
	                {
	                  $errors[$nombreNumero]= $this->Image->errors;
	  				  $this->data[$this->model][$nombreNumero] = $fot_act;
			  		  $this->set('msj_foto_error',$this->Image->errors);
		 
	                  $err=true;
	                  unset($this->Image->errors);
	                  //falta algo
	                }
	            } else {
			    $fotoeli='eliminar_foto';
	           
			  		if (!empty($this->data[$this->model][$fotoeli])){
	                        if($this->Image->delete_image($fot_act,''))
							$this->data[$this->model][$nombreNumero]='';
						 }else
						 	 {$this->data[$this->model][$nombreNumero] = $fot_act;}
				}

			/* END FOTOS*/
		/********************************************************************************/
			
			$this->data[$this->model]['hour'] = $this->data[$this->model]['hour']['hour'];
			$this->data[$this->model]['min'] = $this->data[$this->model]['min']['min'];
			$this->data[$this->model]['meridian'] = $this->data[$this->model]['meridian']['meridian'];
			
			# si son validos
			# guardo los cambios
			if ($this->{$this->model}->save($this->data))
	        {	    
				$this->Session->setflash('Datos del '.$this->model.' actualizados con exito...');
	    		$this->redirect($this->index_page);
	        }  
		}else
		{	
			# elimino las fotos y su thumbnail en las q no se dio un error 
			# ya q se generaron siempre
			
			if(!empty($this->Thumbnail->errors[0]))
				$this->set('msj_foto_error1',$this->Thumbnail->errors[0]);
				
			$this->set('error',true);	
		}

     	 //$data = $this->data;
        $this->set($this->model,$this->data);
		${$this->model} = null;
   }
}

/** ********************** fin edit ******************************************/
function delete($id)
{
	$datos= $this->{$this->model}->findById($id);
	$err=false;
    //pr($datos);exit;
	# elimino las fotos y su thumbnail
    $this->Image->setPath('programations');

	if(!empty($datos[$this->model]['photo']))
	{    
        //echo $datos['New']['photo'.$e]."<br/>";
		if(!$this->Image->delete_image($datos[$this->model]['photo'],''))
		{
			$err=true;
			break;
		}
	}

	if(!$err)
	{
		$this->{$this->model}->del($id);
		$this->Session->setFlash('El '.$this->model.' fue borrada...');
	}else
		$this->Session->setFlash('Problemas al borrar el '.$this->model.'...');
		
	$this->redirect($this->index_page);	
}
}

?>