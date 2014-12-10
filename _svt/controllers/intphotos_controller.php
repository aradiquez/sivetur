<?
class IntphotosController extends AppController{
   var $name= 'Intphotos';
   var $displayField='filename';
   
   var $helpers = array('Html','Form','Javascript','Fck','Funciones');
   var $components = array('Thumbnail','Image');
   var $pageTitle = 'Modulo Intphotos';
   var $width= 708;
   var $height= 244;

function beforeRender() {
         Configure :: load('messages');
         //$this->Session->setflash('afasdf sdfadsf sad.');
      }


function index()
{
   $this->Intphoto->recursive = 0;
    //$this->modelClass->recursive=0;
    //$condicion =array('generic_id'=>$idg,'clave'=>$clave);
	$condicion ="";
    //$this->set('idg',$idg);
    //$this->set('clave',$clave);	   
    $this->set('Intphotos',$this->Intphoto->findAll(null,null,'filename ASC'));
     
  }
function logout(){
		$this->SdAuth->logout();
		$this->redirect("/index.php");
	}
function view($id){
   $this->set('Intphotos', $this->Intphoto->read(null, $id));
}

/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/

 function add()
	{
           //$this->set('generic',$idg);
           //$this->set('clave',$clave);
	  if (empty($this->data))
	  {
	    $this->Intphoto->create();
            //$this->set('sizeArray',array('A' => '618 x 120'));
            //$this->set('selectedSize',null);
	  }
	  else
	  {
	    //inicio del ciclo
            
            $img=1;
              //$this->Image->setPath('secciones');
    /* switch($this->data['Intphoto']['clave']){
	case 'se':
		 
                $this->Image->setPath('rotativas');
		break;
		
		
         case 'otro':
		$this->Image->setPath('otro');
		break;
		
	default:
	         $this->Image->setPath('rotativas');
	break;
     } */
	 $this->Image->setPath('rotativas');
	 
        while($img<=5){//start while
            $nombreNumero='foto'.$img;
            $err = false;
            ////
            if (!empty($this->data['Intphoto'][$nombreNumero]['tmp_name'])){ //pnt
			  //si ocupamos tamaños fijos ancho y alto  
			   $this->Image->setSize($this->width,$this->height);
			   //$this->Image->setSizetn('180','40');
                 
           
               //if($fileName= $this->Image->upload_image_and_thumbnail($this->data,$this->modelClass,$nombreNumero, '618','120','',false,false,true)){
               if($fileName= $this->Image->upload_image($this->data,$this->modelClass,$nombreNumero, $this->width,true)){
					   $this->data['Intphoto']['filename'] = $fileName;
				   if ($this->Intphoto->save($this->data)){ 
				   		$this->Intphoto->id += $this->Intphoto->getLastInsertID();
					} else { 
						$this->set('msj_foto_error',$this->Image->errors);
					}
                } else {
                    $errors[$nombreNumero]= $this->Image->errors;
                    $err=true;
                    unset($this->Image->errors);
                  //falta algo
                }
			  
            } //end pnt 
            $img++;
        }//end while
            
            
        if ($err) {//echo 'saludos';
	      //Something failed. Remove the image uploaded if any.
	      //$this->Intphoto->deleteMovedFile(WWW_ROOT.IMAGES_URL.$fileName);
	      $this->set('error', $errors);
	      $this->set('data', $this->data);
	      $this->validateErrors($this->Intphoto);
	      //$this->render();
	    }else{
             
	     	$this->redirect('index/');
             
        }
            
	 }
}
/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
/** start edit */
function edit($id = null)
{   
  $this->set('msj_errvalidacion', 'Error');
  $this->set('msj_foto_error', '');
  $foto_error=0;
  $error=0;# para controlar el tipo de error
  
  $this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));
  //$this->set('prioridadArray',array('5' => '5','4' => '4','3' => '3','2' => '2','1' => '1'));
  //$this->set('sizeArray',array('G' => '618 x 120'));
            
  //$this->set('tipoArray',array('1' =>'Productos','2' =>'Clientes','3'=> 'Anuncios Clasificados'));
  
	if (empty($this->data))#se cargan los datos
	    {
	        $this->Intphoto->id = $id;
	        $this->data = $this->Intphoto->read();
	        $data =$this->Intphoto->read(null, $id);
      		$this->set('secphotos', $data);
	    
		}else { # se actualizan los datos
	               
		//
     $img='';
    /*          
     switch($this->data['Intphoto']['clave']){
            case 'se':		 
                $this->Image->setPath('rotativas');
            break;
		
            case 'otro':
                $this->Image->setPath('otro');
            break;
		
            default:
                     $this->Image->setPath('rotativas');
            break;
     } */
             
	       $this->Image->setPath('rotativas');
               $nombreNumero='filename'.$img;
               $err = false;
             ////
            if (!empty($this->data['Intphoto'][$nombreNumero]['tmp_name']))//pnt
             {
               
                      //si ocupamos tamaños fijos ancho y alto  
                       $this->Image->setSize($this->width,$this->height);
           
               //if($fileName= $this->Image->upload_image_and_thumbnail($this->data,$this->modelClass,$nombreNumero, '618','120','',false,false,true)){
               if($fileName= $this->Image->upload_image($this->data,$this->modelClass,$nombreNumero, $this->width,true)){
	           		$this->data['Intphoto']['filename'] = $fileName;
	           		$this->Image->delete_image($this->data['Intphoto']['filenameant'],'');
                }else {
                  $errors[$nombreNumero]= $this->Image->errors;
                  $err=true;
                  unset($this->Image->errors);
                  //falta algo
                  
                }
			  
             } //end pnt
                else
                {
                  unset($this->data['Intphoto']['filename']);
                  
                }
      
           
            //$img++;
         // }//end while
            
            
             if ($err)
	    {//echo 'saludos';
	      //Something failed. Remove the image uploaded if any.
	      //$this->Intphoto->deleteMovedFile(WWW_ROOT.IMAGES_URL.$fileName);
	      $this->set('error', $errors);
	      $this->set('data', $this->data);
	      $this->validateErrors($this->Intphoto);
	      //$this->render();
	    }else
            {
               if ($this->Intphoto->save($this->data))
	                { $this->Intphoto->id += $this->Intphoto->getLastInsertID();
                        } 
                      else
		        { 
		          $this->Region->invalidate('foto');
                          $this->set('msj_foto_error',$this->Image->errors);
		        }
	    
	     $this->redirect('index/');
             
            }
                
                
                //
			
	    }

}
/*fin edit*/
/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
 
function delete($id)
{
    # obtengo los datos actuales      
	$datosCat= $this->Intphoto->read(null,$id);  
	
	 
			# elimino la foto actual
			if(!empty($datosCat['Intphoto']['filename']))
			{
				$this->Image->delete_image($datosCat['Intphoto']['filename'],'rotativas');
                        
            }
			$this->Intphoto->del($id);
			$this->Session->setflash('La foto fue eliminada...');
		 
	 	
    $this->redirect('index/');
    //$this->redirect('index/'.$this->data['Intphoto']['generic_id'].'/'.$this->data['Intphoto']['clave']);
             
}	 

}
?>