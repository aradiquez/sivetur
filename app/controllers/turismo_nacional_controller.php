<?php
class TurismoNacionalController extends AppController {
  var $helpers = array('Html','Form','Javascript','Funciones','Ajax','Image', 'Text', 'ImageSize');
  var $components = array('RequestHandler');
  var $uses = array('Section', 'Params', 'Oferta', 'Photo', 'Tag', 'ProgramasCircuito');
  var $name = 'TurismoNacional';
  
  function index($parent_id = "NULL"){
    $seccion = $this->getSection(5);
    $params = $this->getParams();
    $fields = array('id','name', 'introduccion');
  	$this->paginate['limit'] = $params['Params']['paginacion'];
    if ($parent_id=="NULL"){
      $this->paginate['conditions'] = array("parent_id ".($parent_id == "NULL" ? ' IS ' : ' = ').$parent_id." AND id = 1");
    } else {
      $this->paginate['conditions'] = array("parent_id = ".$parent_id);
    }
    $this->paginate['fields'] = $fields;
  	$programacircuito = $this->paginate('ProgramasCircuito');
    $this->set('programacircuito', $programacircuito);
    $this->set('seccion', $seccion);
    $this->set('parametros', $params);
    if ($parent_id=="NULL"){
      $this->set('seccion_title', $seccion['Section']['title']);
      $this->set('seccion_description', $seccion['Section']['description']);
      $this->set('seccion_text', $seccion['Section']['text']);
    } else {
      $program = $this->ProgramasCircuito->find(array('id' => $parent_id));
      $this->set('seccion_title', $program['ProgramasCircuito']['name']);
      $this->set('seccion_description', $seccion['Section']['description']);
      $this->set('seccion_text', $program['ProgramasCircuito']['detalle']);
    }
  }
  
}
?>