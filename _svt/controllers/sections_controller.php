<?
class SectionsController extends AppController{
  var $name="Sections";
  var $helpers = array('Html','Form','Javascript','Fck');
  var $pageTitle = 'Modulo Sections';	
   
   function index(){

		$this->set('Sections',$this->Section->findAll());
  
   }
  function view($id){
    	//$this->set('Albumes',$this->Albume->read(null, $id));
  }
  function logout(){
		$this->SdAuth->logout();
		$this->redirect("/index.php");
	}

  function edit($id=null){
  	
  	
     if(empty($this->data))
	    {  
		  $this->Section->id = $id;
	      $this->data = $this->Section->read();
	      $data =$this->Section->read(null, $id);
	      $this->set('Sections', $data);

	   }else
	   {   
	      
			 
		if ($this->Section->validates($this->data))
	      {
	          $this->Section->save($this->data);
	          $this->Session->setflash('La seccion ha sido actualizada.');
			  $this->redirect('index');
	
	      } else {
	           $this->validateErrors($this->Section);
	      }	  
				  
		   $data= $this->data;
		   $this->set('Sections',$data);
	   
	   $Section=null;
	 }
  }
}

?>
