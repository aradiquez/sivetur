<?
class InfphotosController extends AppController{
   var $name= 'Infphotos';
   var $displayField='filename';

	var $model = 'Infphoto';
   var $uses = array('Infphoto','Informacione');
   var $helpers = array('Html','Form','Javascript','Fck','Funciones');
   var $components = array('Thumbnail','Image');
   var $pageTitle = 'Modulo Information Photos';
   var $nfotos = 5;

function beforeRender() {
         Configure :: load('messages');
         //$this->Session->setflash('afasdf sdfadsf sad.');
      }


function index($idg)
{
   $this->{$this->model}->recursive = 0;
	$condicion =array('informacione_id'=>$idg);
	$this->set('idg',$idg); 
	$nombre_info = $this->Informacione->find('first',array('fields' =>array('name_e'), 'conditions' =>array('id' => $idg)));
	
	$this->set('nombre_info', $nombre_info); 
	
    $this->set($this->name,$this->{$this->model}->findAll($condicion,null,'filename ASC'));
}
function logout(){
		$this->SdAuth->logout();
		$this->redirect("/index.php");
	}
function view($id){
   $this->set($this->name, $this->{$this->model}->read(null, $id));
}

/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/

 function add($idg='') {
    $this->set('generic',$idg);
           
	  if (empty($this->data)) {
	    $this->{$this->model}->create();
            //$this->set('generic',$idg);
           // $this->set('clave',$clave);
	  } else {
	    //inicio del ciclo
            
	    	$this->Image->setPath('informationes');
			
            $img=1;
            
            while($img<=$this->nfotos){//start while
	       
               $nombreNumero='foto'.$img;
               $d_e='description_e'.$img;
               $d_i='description_i'.$img;
            	$err = false;
            
            
	            ////
	            if (!empty($this->data[$this->model][$nombreNumero]['tmp_name']))//pnt
	             {   if($fileName= $this->Image->upload_image_and_thumbnail($this->data,$this->modelClass,$nombreNumero, '640','110','',false,true,false)){
		           $this->data[$this->model]['filename'] = $fileName;
	                   $this->data[$this->model]['description_e'] = $this->data[$this->model][$d_e];
	                   $this->data[$this->model]['description_i'] = $this->data[$this->model][$d_i];
			           if ($this->{$this->model}->save($this->data)){ 
					   		$this->{$this->model}->id += $this->{$this->model}->getLastInsertID();
		               } else { 
				          $this->{$this->model}->invalidate('foto'.$img);
		                  $this->set('msj_foto_error',$this->Image->errors);
				        }
	                }else {
	                  $errors[$nombreNumero]= $this->Image->errors;
	                  $err=true;
	                  unset($this->Image->errors);
	                  //falta algo
	                }
				  
	            } //end pnt 
    
            $img++;
          }//end while
            
            
        if ($err){//echo 'saludos';
	      //Something failed. Remove the image uploaded if any.
	      //$this->Photo->deleteMovedFile(WWW_ROOT.IMAGES_URL.$fileName);
	      $this->set('error', $errors);
	      $this->set('data', $this->data);
	      $this->validateErrors($this->Photo);
	      //$this->render();
	    }else{
	    
	      $this->redirect('index/'.$this->data[$this->model]['informacione_id']);
             
        }
            
	  }
}
/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
/** start edit */
function edit($id = null){   
  $this->set('msj_errvalidacion', 'Error');
  $this->set('msj_foto_error', '');
  $foto_error=0;
  $error=0;# para controlar el tipo de error
  
  $this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));
  $this->set('prioridadArray',array('5' => '5','4' => '4','3' => '3','2' => '2','1' => '1'));
  //$this->set('tipoArray',array('1' =>'Productos','2' =>'Clientes','3'=> 'Anuncios Clasificados'));
  
	if (empty($this->data))#se cargan los datos
	    {
	        $this->{$this->model}->id = $id;
	        $this->data = $this->{$this->model}->read();
	        $data =$this->{$this->model}->read(null, $id);
            $this->set($this->name, $data);
      		//$this->set('Attachments', $data);
	    
		}else # se actualizan los datos
	    {
               $this->Image->setPath('informationes');
                
                 $img='';
              
               $nombreNumero='filename'.$img;
               $d_e='description_e'.$img;
               $d_i='description_i'.$img;
              // $url='url'.$img;
              // $size='size'.$img;
               $err = false;
             ////
            if (!empty($this->data[$this->model][$nombreNumero]['tmp_name']))//pnt
             {

               if($fileName= $this->Image->upload_image_and_thumbnail($this->data,$this->modelClass,$nombreNumero, '640','150','',false,true,false)){
           			$this->data[$this->model]['filename'] = $fileName;
                  // $this->data['Photo']['description_e'] = 'no aplica';
                  // $this->data['Photo']['description_i'] = 'no aplica';
                   $this->data[$this->model]['description_e'] = $this->data[$this->model][$d_e];
                   $this->data[$this->model]['description_i'] = $this->data[$this->model][$d_i];
                   // $this->data['Photo']['url'] = $this->data['Photo'][$url];
                   //$this->data['Photo']['size'] = $this->data['Photo'][$size];
	           		$this->Image->delete_image($this->data[$this->model]['filenameant'],'');
                }else {
                  $errors[$nombreNumero]= $this->Image->errors;
                  $err=true;
                  unset($this->Image->errors);
                  //falta algo
                }
			  
            } //end pnt
             else {
            	unset($this->data[$this->model]['filename']);            
            }
      
           
            //$img++;
         // }//end while
            
            
             if ($err)
	    	{//echo 'saludos';
	      //Something failed. Remove the image uploaded if any.
	      //$this->Photo->deleteMovedFile(WWW_ROOT.IMAGES_URL.$fileName);
	      $this->set('error', $errors);
	      $this->set('data', $this->data);
	      $this->validateErrors($this->{$this->model});
	      //$this->render();
	    }else
            {
               if ($this->{$this->model}->save($this->data))
	                { //$this->{$this->model}->id += $this->{$this->model}->getLastInsertID();
                        } 
                      else
		        { 
	          			$this->{$this->model}->invalidate('foto');
                          $this->set('msj_foto_error',$this->Image->errors);
		        }
	    
	     $this->redirect('index/'.$this->data[$this->model]['informacione_id']);
             
            }
                
                
                //
               
               //
            }
			 
			
}
/*fin edit*/
/** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
 
function delete($id)
{
	$this->Image->setPath('informationes');
     # obtengo los datos actuales      
	$datosCat= $this->{$this->model}->read(null,$id);  
	
	 
			# elimino la foto actual
			if(!empty($datosCat[$this->model]['filename']))
			{
				$this->Image->delete_image($datosCat[$this->model]['filename'],'');
                        
            }
			$this->{$this->model}->del($id);
			$this->Session->setflash('La foto: '.$datosCat[$this->model]['filename'].' fue eliminada satisfactoriamente del servidor...');
		 
	 	
    $this->redirect('index/'.$datosCat[$this->model]['informacione_id']);            
}	 

}
?>