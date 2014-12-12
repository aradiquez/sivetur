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
    var $model = 'Oferta';
  
  
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
  
  function reservation($id){
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
    $hoy = date("Y-m-d");   
    $price_params = explode(";", $this->params['form']['Ofertas']['price']);
    $options['joins'] = array(
                            array(
                                'table' => 'ofertas_tags', // or products_categories
                                'alias' => 'OferTags',
                                'conditions' => array(
                                    'OferTags.tag_id' => $this->params['data']['Ofertas']['tags'],
                                )
                            )
                        );
     $options['conditions']= array( 
                      "Oferta.start_date <= "."'".$hoy."'", 
                      "Oferta.end_date >= "."'".$hoy."'", 
                      "Oferta.precio >="."'".$price_params[0]."'",  
                      "Oferta.precio <="."'".$price_params[1]."'", 
                      "Oferta.programacircuito_id" =>  $this->params['data']['Ofertas']['programas']
                  );
    
    
    $parameters = $this->getParams();
    $options['fields'] = array('DISTINCT id', 'name', 'introduccion', 'precio');
    $this->Oferta->unBindModel(array('hasMany' => array('Photos')));
  	$options['limit'] = $parameters['Params']['paginacion'];
  	$ofertas = $this->Oferta->find('all', $options);
    $this->set('parametros', $parameters);
    $this->set('ofertas', $ofertas);
    $this->set('nodo_actual', array());
  }
  
  function send() {
    $seccion = $this->getSection(3);
    $this->set('seccion', $seccion);
    $parametros = $this->Params->find("first");
    $detail = $this->Oferta->find('first', array('conditions' => array('`Oferta`.`id`' => $this->data[$this->model]['id'])));
    $this->set('oferta', $detail);
    $this->set('nodo_actual', array($detail));
    
    if(!empty($this->data)) {
      $this->{$this->model}->set($this->data);

      if($this->{$this->model}->validates()) {
        $this->Email->from = $this->data[$this->model]['name'] .' <' . $this->data[$this->model]['email'] . '>';
        $this->Email->to = $parametros['Params']['correo_general'];
        $this->Email->subject = 'Contacto para Sivetur S.A.';
        $this->Email->send($this->data[$this->model]['message']);
        $this->Session->setFlash('Su mensaje se ha enviado con éxito.');
        // Display the success.ctp page instead of the form again
        $this->redirect("index");
      } else {
        $this->render('reservation');
      }
    }
  }
  
}
?>
