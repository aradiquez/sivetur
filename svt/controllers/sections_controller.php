<?
class SectionsController extends AppController{
  var $name="Sections";
  var $helpers = array('Html','Form','Javascript','Fck');
  var $pageTitle = 'Modulo Sections';	
   
  function index(){
	 $this->set('Sections',$this->Section->find('all'));
  }
  function view($id){
  	$this->set('Sections',$this->Section->read(null, $id));
  }
  function logout(){
	$this->SdAuth->logout();
	$this->redirect("/index.php");
  }
  
  function edit($id=null){	
     if(empty($this->data)) {  
		  $this->Section->id = $id;
	      $this->data = $this->Section->read();
	      $data =$this->Section->read(null, $id);
	      $this->set('Sections', $data);
	   }else {   
		  if ($this->Section->validates($this->data)){
          	$this->Section->save($this->data);
		  	$this->Session->setflash('La seccion ha sido actualizada.','default',array("class"=>"success"));
		  	$this->redirect('index');
		  } else {
          	$this->validateErrors($this->Section);
		  }	  
		  $data= $this->data;
		  $this->set('Sections',$data);
		  $Section=null;
	   }
	   $this->set("section_id", $id);
  }
}

?>
