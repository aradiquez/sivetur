<?
class PhotosController extends AppController{
   var $name= 'Photos';
   var $displayField='filename';
   
   var $helpers = array('Html','Form','Javascript','Fck','Funciones');
   var $components = array('Thumbnail','Image');
   var $uses = array('Photo','Section', 'ProgramasCircuito', 'Oferta', 'Colaboradore');
   
   var $pageTitle = 'Modulo Photos';
   
   var $nphotos = 5;

   function beforeRender() {
     Configure :: load('messages');
   }
   /** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
   function index($idg=null, $key=null) {
   	  $this->Photo->recursive = 0;
      $condicion =array('`Photo`.`generic_id`'=>$idg, '`Photo`.`key`' => $key);
	    $this->set('idg',$idg);
	    $this->set('key',$key);
	
    	switch($key){
    		case "1":
    			$nombre_album = $this->Section->find('first',array('fields' =>array('title'), 'conditions' =>array('id' => $idg)));
    			$this->set('nombre_album', $nombre_album['Section']['title']); 
    		break;
    		case "2":
    			$nombre_album = $this->ProgramasCircuito->find('first',array('fields' =>array('name'), 'conditions' =>array('id' => $idg)));
    			$this->set('nombre_album', $nombre_album['ProgramasCircuito']['name']); 
    		break;
    		case "3":
    			$nombre_album = $this->Oferta->find('first',array('fields' =>array('name'), 'conditions' =>array('`Oferta`.id' => $idg)));
    			$this->set('nombre_album', $nombre_album['Oferta']['name']); 				
    		break;
    		case "4":
    			$nombre_album = $this->Colaboradore->find('first',array('fields' =>array('nombre'), 'conditions' =>array('id' => $idg)));
    			$this->set('nombre_album', $nombre_album['Colaboradore']['nombre']);
    		break;
    	}
      $this->set('Photos',$this->Photo->find('all',array('conditions' => $condicion, 'order' => array('name ASC'))));
  }
  
  function view($id){
     $this->set('Photos', $this->Photo->read(null, $id));
   }
   /** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
   function add($idg=null, $key=null) {
    $this->set('generic_id',$idg);
    $this->set('key',$key);
	  if (empty($this->data)) {
	    $this->Photo->create();
	  }  else {
      $img=1;
      while($img<=$this->nphotos){//start while
	      $nombreNumero='foto'.$img;
        $d_e='details'.$img;
        $err = false;
        
        if (!empty($this->data['Photo'][$nombreNumero]['tmp_name'])) {   
          if($fileName= $this->Image->upload_image_and_thumbnail($this->data,$this->modelClass,$nombreNumero, '640','110','',false,false,false)){
            $this->data['Photo']['name'] = $fileName;
            $this->data['Photo']['details'] = $this->data['Photo'][$d_e];
            if ($this->Photo->save($this->data)){ 
              $this->Photo->id += $this->Photo->getLastInsertID();
            } else { 
              $this->Photo->invalidate('foto');
              $this->set('msj_foto_error',$this->Image->errors);
            }
          }else {
            $errors[$nombreNumero]= $this->Image->errors;
            $err=true;
            unset($this->Image->errors);
          }
        } //end pnt 
        $img++;
      }//end while
      if ($err) {
        //$this->Photo->deleteMovedFile(WWW_ROOT.IMAGES_URL.$fileName);
        $this->set('error', $errors);
        $this->set('data', $this->data);
        $this->validateErrors($this->Photo);
      }else {
        $this->redirect('index/'.$this->data['Photo']['generic_id']."/".$this->data['Photo']['key']);
      }

    }
   }
  /** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
  /** start edit */
  function edit($id = null) {   
    $error=0;# para controlar el tipo de error
    $this->set('estadoArray',array('A' => 'Activa','I' => 'Inactiva'));
    
  	if (empty($this->data)) {
  	  $this->Photo->id = $id;
  	  $this->data = $this->Photo->read();
  	  $data =$this->Photo->read(null, $id);
      $this->set('Photos', $data);
    } else  {
      $nombreNumero='name';
      $d_e='details';
      $err=false;
      if (!empty($this->data['Photo'][$nombreNumero]['tmp_name']))  {
         if($fileName= $this->Image->upload_image_and_thumbnail($this->data,$this->modelClass,$nombreNumero, '1024','150','',false,false,false)){
           $this->data['Photo']['name'] = $fileName;
           $this->Image->delete_image($this->data['Photo']['nameant'],'');
         } else {
           $errors[$nombreNumero]= $this->Image->errors;
           $err=true;
           unset($this->Image->errors);
         }
       } else {
          unset($this->data['Photo']['name']);
       }
       if ($err) {
	      $this->set('error', $errors);
	      $this->set('data', $this->data);
	      $this->validateErrors($this->Photo);
	    }else {
        if ($this->Photo->save($this->data)) { 
        
        }  else  { 
          $this->Photo->invalidate('foto');
          $this->set('msj_foto_error',$this->Image->errors);
        }

        $this->redirect('index/'.$this->data['Photo']['generic_id']."/".$this->data['Photo']['key']);
      }    
    }		
  }
  /*fin edit*/
  /** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
  function delete($id) {
    # obtengo los datos actuales      
  	$datosCat= $this->Photo->read(null,$id);  
  	# elimino la foto actual
  	if(!empty($datosCat['Photo']['name'])) {
  	  if ($this->Image->delete_image($datosCat['Photo']['name'],'/')){
      	$this->Photo->delete($id);
      	$this->Session->setflash('La foto: '.$datosCat['Photo']['name'].' fue eliminada satisfactoriamente del servidor...','default', array('class' => 'success'));
  	  } else {
      	$this->Session->setflash('La foto: '.$datosCat['Photo']['name'].' NO fue eliminada del servidor...','default', array('class' => 'error'));
  	  }
    }
  	
		$this->redirect('index/'.$datosCat['Photo']['generic_id']."/".$datosCat['Photo']['key']);
              
  }	 
  /** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/
  function set_primary($id){
    $primary_photo= $this->Photo->read(null,$id);  
    $condicion =array('`Photo`.`generic_id`'=>$primary_photo['Photo']['generic_id'], '`Photo`.`key`' => $primary_photo['Photo']['key']);
    $all_photos = $this->Photo->find('all',array('conditions' => $condicion, 'order' => array('name ASC')));
    foreach($all_photos as $key => $phtos){
      $this->Photo->id = $phtos['Photo']['id'];//setting the element
      if ($phtos['Photo']['id'] == $id){
        $this->Photo->saveField('first', true);
      } else {
        $this->Photo->saveField('first', false);
      }
    }
    $this->redirect('index/'.$primary_photo['Photo']['generic_id']."/".$primary_photo['Photo']['key']);
  }
  /** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** **/  
}
?>