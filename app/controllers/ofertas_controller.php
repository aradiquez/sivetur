<?
class OfertasController extends AppController{
    var $helpers = array('Html','Form','Javascript','Funciones','Ajax','Image', 'Text', 'ImageSize');
    var $components = array('RequestHandler');
    var $uses = array('Section', 'Params', 'Oferta', 'Photo', 'Tag', 'ProgramasCircuito');
  	var $paginate = array(
                          'conditions' => array(
                                                'Oferta.estado' => 'A'
                                                ),
                          'order' => array(
                                          'prioridad, visitas' => 'desc'
                                          ),
                          );
  
  
	function index() {
    $seccion = $this->getSection(3);
    $this->set('seccion', $seccion);
    $params = $this->getParams();
    $hoy = date("Y-m-d");
    $fields = array('name', 'introduccion', 'precio');
    $this->Oferta->unBindModel(array('hasAndBelongsToMany' => array('Tag'), 'hasMany' => array('Photos')));
  	$this->paginate['limit'] = $params['Params']['paginacion'];
    $this->paginate['conditions'] = array('Oferta.start_date <= '."'$hoy'", 'Oferta.end_date >= '."'$hoy'");
    $this->paginate['fields'] = $fields;
  	$ofertas = $this->paginate('Oferta');
    $this->set('parametros', $params);
    $this->set('ofertas', $ofertas);
    $this->set('nodo_actual', array());
  }
  
  function detalle($id){
    $this->Oferta->suma_visitas($id);
    $seccion = $this->getSection(3);
    $this->set('seccion', $seccion);
    $params = $this->getParams();
    $detail = $this->Oferta->find('first', array('conditions' => array('`Oferta`.`id`' => $id)));
    $this->set('oferta', $detail);
    $this->set('nodo_actual', array($detail));
  }
  
  
  
  function getFilterInformation(){
    $this->Oferta->unBindModel(array('hasAndBelongsToMany' => array('Tag'), 'hasMany' => array('Photos', 'FirstPhoto')));
    $mayor = $this->Oferta->find('first', array('fields' => array('precio'), 'order' => array('precio' => 'desc')));
    $menor = $this->Oferta->find('first', array('fields' => array('precio'), 'order' => array('precio' => 'asc')));
    $tags = $this->Tag->find('all', array('fields' => array('id', 'name')));
    $this->ProgramasCircuito->unBindModel(array('hasMany' => array('Photos', 'ProgramasCircuitos')));
    $programas_circuitos = $this->ProgramasCircuito->find('all', array('fields' => array('id', 'name')));
    return array('mayor' => $mayor, 'menor' => $menor, 'tags' => $tags, 'programs' => $programas_circuitos);
  }
  
  function search() {
    $seccion = $this->getSection(3);
    $this->set('seccion', $seccion);
    $paginate = array(
                  'Tag' => array(
                        'joins' => array(
                            array(
                                'table' => 'ofertas_tags', // or products_categories
                                'alias' => 'OferTags',
                                'type' => 'INNER',
                                'conditions' => array(
                                    'OferTags.tag_id' => $this->params['data']['Ofertas']['tags'],
                                )
                            )
                        )
                     ),
                   'ProgramasCircuito' => array(
                         'joins' => array(
                             array(
                                 'type' => 'INNER',
                                 'conditions' => array(
                                     'ProgramasCircuito.programacircuito_id' =>  $this->params['data']['Ofertas']['programas'],
                                 )
                             )
                         )
                      )                            
                  );
    
    
    $parameters = $this->getParams();
    $price_params = explode(";", $this->params['form']['Ofertas']['price']);
    $hoy = date("Y-m-d");    
    $fields = array('name', 'introduccion', 'precio');
    $this->Oferta->unBindModel(array('hasMany' => array('Photos')));
  	$this->paginate['limit'] = $parameters['Params']['paginacion'];
    $this->paginate['conditions'] = array('Oferta.start_date <= '."'$hoy'", 'Oferta.end_date >= '."'$hoy'", 'Oferta.precio <=' => $price_params[0], 'Oferta.precio >=' => $price_params[1]);
    #'Tag.tag_id' => $this->params['data']['Ofertas']['tags'],
    $this->paginate['fields'] = $fields;
  	$ofertas = $this->paginate('Oferta');
    $this->set('parametros', $params);
    $this->set('ofertas', $ofertas);
  }
}
?>
