<?
class PhotosController extends AppController{
   var $name= 'Photos';
   var $displayField='filename';
   
   var $helpers = array('Html','Form','Javascript','Fck','Funciones');
   var $components = array('Thumbnail','Image');
   var $uses = array('Photo','Album', 'Empresa', 'Programation', 'Link', 'Patrocinadore');
   
   var $pageTitle = 'Modulo Photos';
   
   var $nphotos = 5;

function beforeRender() {
         Configure :: load('messages');
         //$this->Session->setflash('afasdf sdfadsf sad.');
      }


function index($idg=null, $key=null)
{
   	$this->Photo->recursive = 0;
    $condicion =array('`Photo`.`related_id`'=>$idg, '`Photo`.`keynum`' => $key);
	$this->set('idg',$idg);
	$this->set('keynum',$key);
	
	switch($key){
		case "1":
			$nombre_album = $this->Empresa->find('first',array('fields' =>array('name'), 'conditions' =>array('id' => $idg)));
			$this->set('nombre_album', $nombre_album['Empresa']['name']); 
		break;
		case "2":
			$nombre_album = $this->Programation->find('first',array('fields' =>array('name'), 'conditions' =>array('id' => $idg)));
			$this->set('nombre_album', $nombre_album['Programation']['name']); 
		break;
		case "3":
			$nombre_album = $this->Album->find('first',array('fields' =>array('name'), 'conditions' =>array('id' => $idg)));
			$this->set('nombre_album', $nombre_album['Album']['name']); 				
		break;
		case "4":
			$nombre_album = $this->Link->find('first',array('fields' =>array('name'), 'conditions' =>array('id' => $idg)));
			$this->set('nombre_album', $nombre_album['Link']['name']);
		break;
		case "5":
			$nombre_album = $this->Patrocinadore->find('first',array('fields' =>array('name'), 'conditions' =>array('id' => $idg)));
			$this->set('nombre_album', $nombre_album['Patrocinadore']['name']);
		break;
	}

	
	  
    $this->set('Photos',$this->Photo->find('all',array('conditions' => $condicion, 'order' => array('filename ASC'))));
     
  }
function logout(){
		$this->SdAuth->logout();
		$this->redirect("/index.php");
	}
function view($id){
   $this->set('Photos', $this->Photo->read(null, $id));
}

/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/

 function add($idg=null, $key=null)
	{
           $this->set('generic',$idg);
           $this->set('keynum',$key);

	  if (empty($this->data))
	  {
	    $this->Photo->create();
            //$this->set('generic',$idg);
           // $this->set('clave',$clave);
	  }
	  else
	  {
	    //inicio del ciclo
            
			
            $img=1;
			//$this->Image->setPath('albums');
			
            while($img<=$this->nphotos){//start while
	       
               $nombreNumero='foto'.$img;
               $d_e='details'.$img;
            $err = false;
            
            
            ////
            if (!empty($this->data['Photo'][$nombreNumero]['tmp_name']))//pnt
             {   if($fileName= $this->Image->upload_image_and_thumbnail($this->data,$this->modelClass,$nombreNumero, '640','110','',false,true,false)){
	           $this->data['Photo']['filename'] = $fileName;
                   $this->data['Photo']['details'] = $this->data['Photo'][$d_e];
	           if ($this->Photo->save($this->data)){ 
			   		$this->Photo->id += $this->Photo->getLastInsertID();
               } else { 
		          $this->Photo->invalidate('foto');
                  $this->set('msj_foto_error',$this->Image->errors);
		        }
                }else
                {
                  $errors[$nombreNumero]= $this->Image->errors;
                  $err=true;
                  unset($this->Image->errors);
                  //falta algo
                  
                }
			  
                } //end pnt 
      
           
            $img++;
          }//end while
            
            
             if ($err)
	    {//echo 'saludos';
	      //Something failed. Remove the image uploaded if any.
	      //$this->Photo->deleteMovedFile(WWW_ROOT.IMAGES_URL.$fileName);
	      $this->set('error', $errors);
	      $this->set('data', $this->data);
	      $this->validateErrors($this->Photo);
	      //$this->render();
	    }else
            {
               //echo 'otto';
             //$this->redirect('index/'.$idg.'/'.$clave);
	     
	    
	     $this->redirect('index/'.$this->data['Photo']['related_id']."/".$this->data['Photo']['keynum']);
             
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
  $this->set('prioridadArray',array('5' => '5','4' => '4','3' => '3','2' => '2','1' => '1'));
  //$this->set('tipoArray',array('1' =>'Productos','2' =>'Clientes','3'=> 'Anuncios Clasificados'));
  
	if (empty($this->data))#se cargan los datos
	    {
	        $this->Photo->id = $id;
	        $this->data = $this->Photo->read();
	        $data =$this->Photo->read(null, $id);
                $this->set('Photos', $data);
      		//$this->set('Attachments', $data);
	    
		}else # se actualizan los datos
	    {
               //$this->Image->setPath('albums');
                
                 $img='';
              
    /* switch($this->data['Photo']['clave']){
	case 'se':
		 
                $this->Image->setPath('secciones');
		break;
		
		
         case 'ho':
		$this->Image->setPath('hoteles');
		break;
		
	default:
	         $this->Image->setPath('secciones');
	break;
     }*/
             
	       
               $nombreNumero='filename'.$img;
               $d_e='details'.$img;
              // $url='url'.$img;
              // $size='size'.$img;
               $err = false;
             ////
            if (!empty($this->data['Photo'][$nombreNumero]['tmp_name']))//pnt
             {
                /*if($this->data['Photo'][$size]=='G'){
                      //si ocupamos tamaños fijos ancho y alto  
                       $this->Image->setSize('641','224');
                       $this->Image->setSizetn('150','52');
                  }else{
                       $this->Image->setSize('314','224');
                       $this->Image->setSizetn('150','107');
                     }
                */
               if($fileName= $this->Image->upload_image_and_thumbnail($this->data,$this->modelClass,$nombreNumero, '640','150','',false,true,false)){
	           $this->data['Photo']['filename'] = $fileName;
                  // $this->data['Photo']['description_e'] = 'no aplica';
                  // $this->data['Photo']['description_i'] = 'no aplica';
                   $this->data['Photo']['details'] = $this->data['Photo'][$d_e];
                   // $this->data['Photo']['url'] = $this->data['Photo'][$url];
                   //$this->data['Photo']['size'] = $this->data['Photo'][$size];
	           $this->Image->delete_image($this->data['Photo']['filenameant'],'');
                }else
                {
                  $errors[$nombreNumero]= $this->Image->errors;
                  $err=true;
                  unset($this->Image->errors);
                  //falta algo
                  
                }
			  
                } //end pnt
                else
                {
                  unset($this->data['Photo']['filename']);
                  
                }
      
           
            //$img++;
         // }//end while
            
            
             if ($err)
	    {//echo 'saludos';
	      //Something failed. Remove the image uploaded if any.
	      //$this->Photo->deleteMovedFile(WWW_ROOT.IMAGES_URL.$fileName);
	      $this->set('error', $errors);
	      $this->set('data', $this->data);
	      $this->validateErrors($this->Photo);
	      //$this->render();
	    }else
            {
               if ($this->Photo->save($this->data))
	                { //$this->Photo->id += $this->Photo->getLastInsertID();
                        } 
                      else
		        { 
		          $this->Photo->invalidate('foto');
                          $this->set('msj_foto_error',$this->Image->errors);
		        }
	    
	     $this->redirect('index/'.$this->data['Photo']['related_id']."/".$this->data['Photo']['keynum']);
             
            }
                
                
                //
               
               //
            }
			 
			
}
/*fin edit*/
/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
 
function delete($id)
{
     # obtengo los datos actuales      
	$datosCat= $this->Photo->read(null,$id);  
	//$this->Image->setPath('albums');
	 
			# elimino la foto actual
			if(!empty($datosCat['Photo']['filename']))
			{
				$this->Image->delete_image($datosCat['Photo']['filename'],'');
                        
                        }
			$this->Photo->del($id);
			$this->Session->setflash('La foto: '.$datosCat['Photo']['filename'].' fue eliminada satisfactoriamente del servidor...');
		 
	 	
    $this->redirect('index/'.$datosCat['Photo']['related_id']."/".$datosCat['Photo']['keynum']);
              
}	 

}
?>