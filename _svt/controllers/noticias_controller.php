<?
ini_set("memory_limit","503M");
ini_set("max_execution_time","600");

class NoticiasController extends AppController {
    var $name= 'Noticias';
    var $helpers = array('Html','Form','Javascript','Fck','Funciones');
 	var $components = array('Image', 'Thumbnail');
	var $index_page = 'index';
	var $uses = array('Noticia', 'Topic');
  	var $nfotos= 3;
  	var $ancho= 150;//224
  	
  	var $paginate = array(
                        'limit' => 50,
                       // 'fields' => array(
                        //					'`Noticia`.`name`', '`Noticia`.`status`', '`Noticia`.`created`',  '`Topic`.`name`'	
                    //    				),
                        'order' => array(
                                        '`Noticia`.`id`' => 'desc'
                                        ),
                        );
  	
  	var $model = 'Noticia';

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
	
	$this->set('error',false);
	
	$error=0;
	
	$this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));	
 	$this->set('topicoArray',$this->{$this->model}->topicos());
 	//$this->set('topicoArray',$this->{$this->model}->topicos());
 	$this->set('prioridadArray',array('1' => '1','2' => '2','3' => '3','4' => '4','5' => '5'));
 
	if(empty($this->data))
	{
		$this->set('selectedEstado', 'A');		
		$this->set('selectedTopico',null);
	
	}else  {
		/*pr($this->data);
		exit;	
		*/
		$this->{$this->model}->set($this->data);
		
		if ($this->{$this->model}->validates($this->data))
		{
			///////////////////////////////////////////////////////////////////////////////////////////
			$img=1;
			  //$this->Image->setPath('Noticia');
			  while($img<=$this->nfotos){//start while
	               $nombreNumero='foto'.$img;
	            $err = false;
	            if (!empty($this->data[$this->model][$nombreNumero]['tmp_name']))//pnt
	             {
	               if($fileName= $this->Image->upload_image_and_thumbnail($this->data,$this->model,$nombreNumero, '640','150','',false,true,false)){
		           $this->data[$this->model][$nombreNumero] = $fileName;
				   echo "Entro aqui";
	                }else
	                {
	                  $errors[$nombreNumero]= $this->Image->errors;
		  			  $this->set('msj_foto_error'.$img,$this->Image->errors);
	                  $err=true;
	                  unset($this->Image->errors);
					  echo "Da error";
	                }
	            }else {
					unset($this->data[$this->model][$nombreNumero]);
					$this->data[$this->model][$nombreNumero] = '';
				}
	            $img++;
	          }//end while
			///////////////////////////////////////////////////////////////////////////////////////////

			if($this->{$this->model}->save($this->data))
		      {	  
				$this->Session->setflash('La Noticia ha sido guardada con exito.');
				$this->redirect($this->index_page);
		      }
		}else{# SI DA ALGUN ERROR LIMPIO TODO
				//echo "error validacion";
//pr($this->data);
			# elimino las fotos y su thumbnail en las q no se dio un error 
			# ya q se generaron siempre
			for ($e=1;$e<=$this->nfotos;$e++)
			{
				if(!empty($this->data[$this->model]['foto'.$e]))
				{
					$this->Thumbnail->eliminar($this->data[$this->model]['foto'.$e]);
					$this->data[$this->model]['foto'.$e]='';
				}
			}
			
			if($error==1)
				$this->set('msj_errvalidacion', 'Esta Noticia ya existe.');
			else
				$this->set('msj_errvalidacion', 'Titulo de la Noticia requerido.');
			
			if(!empty($this->Thumbnail->errors[0]))
				$this->set('msj_foto_error1',$this->Thumbnail->errors[0]);
			if(!empty($this->Thumbnail->errors[1]))
				$this->set('msj_foto_error2',$this->Thumbnail->errors[1]);
			if(!empty($this->Thumbnail->errors[2]))
				$this->set('msj_foto_error3',$this->Thumbnail->errors[2]);
			#if(!empty($this->Thumbnail->errors[3]))
			#	$this->set('msj_foto_error4',$this->Thumbnail->errors[3]);
			#if(!empty($this->Thumbnail->errors[4]))
			#	$this->set('msj_foto_error5',$this->Thumbnail->errors[4]);
			
			$this->set('error',true);
			$errors = $this->{$this->model}->invalidFields();
		}	

		 $data = $this->data;
		 $this->set($this->name, $data);
		 ${$this->model} = null;
		 $this->set('selectedEstado', null);
		 $this->set('selectedTopico',null);
    }
}

/** ************************ start edit ********************************************/
function edit($id=null)
{
	$this->set('msj_errvalidacion','error');
	$error=0;
	$this->set('msj_foto_error1','');
	$this->set('msj_foto_error2','');
	$this->set('msj_foto_error3','');
	$this->set('error',false);
	
	//$this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));	
 	//$this->set('topicoArray', $this->New->Topico->generateList(array('estado'=>'A'),'Topico.topico_e ASC',null,null,null));
 	//$this->set('topicoArray',$this->New->topicos());
         
	$this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));	
 	$this->set('topicoArray',$this->{$this->model}->topicos());
 	$this->set('prioridadArray',array('1' => '1','2' => '2','3' => '3','4' => '4','5' => '5'));
 
	 
	     
   if(empty($this->data))
   {
		#cargo los datos del New
		$this->{$this->model}->id = $id;
		$this->data = $this->{$this->model}->read();
		$data =$this->{$this->model}->read(null, $id);
		$this->set($this->name,$data);
   }else
   {
		$this->{$this->model}->set($this->data);
		
		# valido los datos de entrada de la New
		if ($this->{$this->model}->validates($this->data))
		{
			/*********************************************************************************/
			
			/*START  FOTOS*/
		 $img=1;
		  //$this->Image->setPath('Noticia');
			while($img<=$this->nfotos){//start while
	           $nombreNumero='foto'.$img;//foto que viene ne los datos
		       $fot_act=$this->data[$this->model]['foto_a'.$img];//foto actualmente en la base de datos
	           //echo $fot_act;
	            $err = false;
            	//para cuando no quiero hacer nada con  la foto que ya estaba en el registro! 
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
			  		  $this->set('msj_foto_error'.$img,$this->Image->errors);
		 
	                  $err=true;
	                  unset($this->Image->errors);
	                  //falta algo
	                }
	            } else {
			    $fotoeli='eliminar_foto'.$img;
	           
			  		if (!empty($this->data[$this->model][$fotoeli])){
	                        if($this->Image->delete_image($fot_act,''))
							$this->data[$this->model][$nombreNumero]='';
						 }else
						 	 {$this->data[$this->model][$nombreNumero] = $fot_act;}
				}
	            $img++;
	          }//end while
			/* END FOTOS*/
		/********************************************************************************/
			
			
			
			# si son validos
			# guardo los cambios
			if ($this->{$this->model}->save($this->data))
	        {	    
				$this->Session->setflash('Datos de la noticia actualizados con exito...');
	    		$this->redirect($this->index_page);
	        }  
		}else
		{	
			# elimino las fotos y su thumbnail en las q no se dio un error 
			# ya q se generaron siempre
			/*for ($e=1;$e<=$this->nfotos;$e++)
			{
				if($fotos_nerr[$e]!='X')
				{
					$this->Thumbnail->eliminar($fotos_nerr[$e]);
					$this->data['New']['foto'.$e]='';
				}
			}
			*/
			if($error==1)
				$this->set('msj_errvalidacion','Ya existe una New con este titulo.');
			else
				$this->set('msj_errvalidacion','Nombre de la New requerido.');
			
			if(!empty($this->Thumbnail->errors[0]))
				$this->set('msj_foto_error1',$this->Thumbnail->errors[0]);
			if(!empty($this->Thumbnail->errors[1]))
				$this->set('msj_foto_error2',$this->Thumbnail->errors[1]);
			if(!empty($this->Thumbnail->errors[2]))
				$this->set('msj_foto_error3',$this->Thumbnail->errors[2]);
			if(!empty($this->Thumbnail->errors[3]))
				$this->set('msj_foto_error4',$this->Thumbnail->errors[3]);
			if(!empty($this->Thumbnail->errors[4]))
				$this->set('msj_foto_error5',$this->Thumbnail->errors[4]);
			 
			$this->set('error',true);	
			#$this->validateErrors($this->New);
		}

     	 //$data = $this->data;
        $this->set($this->name,$this->data);
		${$this->name} = null;
   }
}

/** ********************** fin edit ******************************************/
function delete($id)
{
	$datos= $this->{$this->model}->findById($id);
	$err=false;
    //pr($datos);exit;
	# elimino las fotos y su thumbnail
   //$this->Image->setPath('Noticia');
	for ($e=1;$e<=$this->nfotos;$e++)
	{
		if(!empty($datos[$this->model]['foto'.$e]))
		{    
            //echo $datos['New']['foto'.$e]."<br/>";
			if(!$this->Image->delete_image($datos[$this->model]['foto'.$e],''))
			{
				$err=true;
				break;
			}
		}
	}
	if(!$err)
	{
		$this->{$this->model}->del($id);
		$this->Session->setFlash('La noticia fue borrada...');
	}else
		$this->Session->setFlash('Problemas al borrar la noticia...');
		
	$this->redirect($this->index_page);	
}
}

?>
