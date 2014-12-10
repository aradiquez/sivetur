<?php
class ProgramasYCircuitosController extends AppController {
  var $helpers = array('Html','Form','Javascript','Funciones','Ajax','Image', 'Text', 'ImageSize');
  var $components = array('RequestHandler');
  var $uses = array('Section', 'Params', 'Oferta', 'Photo', 'Tag', 'ProgramasCircuito');
  var $array_of_parent = array();
	var $paginate = array(
                    'conditions' => array(
                        'ProgramasCircuito.estado' => 'A'
                        )
                    );
  
	function index($parent_id="NULL") {
    $seccion = $this->getSection(4);
    $params = $this->getParams();
    $fields = array('id','name', 'introduccion');
  	$this->paginate['limit'] = $params['Params']['paginacion'];
    $this->paginate['conditions'] = array("parent_id ".($parent_id == "NULL" ? ' IS ' : ' = ').$parent_id." AND id <> 1");
    $this->paginate['fields'] = $fields;
  	$programacircuito = $this->paginate('ProgramasCircuito');
    $this->set('programacircuito', $programacircuito);
    $this->set('seccion', $seccion);
    $this->set('parametros', $params);
    if ($parent_id=="NULL"){
      $this->set('seccion_title', $seccion['Section']['title']);
      $this->set('seccion_description', $seccion['Section']['description']);
      $this->set('seccion_text', $seccion['Section']['text']);
      $this->set('nodo_actual', array());
    } else {
      $program = $this->ProgramasCircuito->find(array('id' => $parent_id));
      $this->set('seccion_title', $program['ProgramasCircuito']['name']);
      $this->set('seccion_description', $seccion['Section']['description']);
      $this->set('seccion_text', $program['ProgramasCircuito']['detalle']);
      $this->set('nodo_actual', $this->get_parents($program));
    }
  }
  
  function get_parents($link){
    if ($link['ProgramasCircuito']['parent_id'] != NULL){
      $this->ProgramasCircuito->unBindModel(array('hasMany' => array('Photos', 'FirstPhoto','ProgramasCircuito')));
      $fields = array('id', 'name');
      $new_link = $this->ProgramasCircuito->find(array('id' => $link['ProgramasCircuito']['parent_id']));
      array_push($this->array_of_parent, $link);
      $this->get_parents($new_link);
    } else {
      array_push($this->array_of_parent, $link);
    }
    return $this->array_of_parent;
  }
  
}
?>