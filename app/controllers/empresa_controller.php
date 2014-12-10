<?
class EmpresaController extends AppController{
    var $helpers = array('Html','Form','Javascript','Funciones','Ajax','Image', 'Text', 'ImageSize');
    var $components = array('RequestHandler');
    var $uses = array('Section', 'Params', 'Colaboradore', 'Photo');
	
	function index() {
    $seccion = $this->getSection(2);
    $this->set('seccion', $seccion);
    $this->Colaboradore->unBindModel(array('hasMany' => array('Photos')));
		$colaboradores = $this->Colaboradore->find('all', array('conditions' => array('estado' => 'A'), 'fields' => array('nombre', 'departamento', 'facebook', 'linkedin', 'googleplus', 'twitter', 'skype')));
    $this->set('nodo_actual', array());
    $this->set('colaboradores', $colaboradores);
	}
  
  function colaborador($id=null,$nombre=null){
    $seccion = $this->getSection(2);
    $this->set('seccion', $seccion);
		$colaboradores = $this->Colaboradore->find('first', array('conditions' => array('id' => $id)));
    $this->set('nodo_actual', array($colaboradores));
    $this->set('colaborador', $colaboradores);
  }
}
?>
