<?
class OfertasController extends AppController{
    var $helpers = array('Html','Form','Javascript','Funciones','Ajax','Image', 'Text', 'ImageSize');
    var $components = array('RequestHandler', 'Email');
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
    
    $options['conditions']= array(
      "Oferta.start_date <= "."'".$hoy."'", 
      "Oferta.end_date >= "."'".$hoy."'",
    );
    
    if (!empty($this->params['form']['Ofertas']['price'])){
      $price_params = explode(";", $this->params['form']['Ofertas']['price']);
      if ($price_params[0] != 0 && $price_params[1] != 0) {
        array_push($options['conditions'], 
                                          array(
                                              "Oferta.precio >="."'".$price_params[0]."'",  
                                              "Oferta.precio <="."'".$price_params[1]."'"
                                            )
                                          );
      }
    }
    if (!empty($this->params['data']['Ofertas']['programas'])){
      array_push($options['conditions'], 
                                        array(
                                            "Oferta.programacircuito_id" =>  $this->params['data']['Ofertas']['programas']
                                          )
                                        );
    }

    if (!empty($this->params['data']['Ofertas']['criterion'])){
      array_push($options['conditions'], array(
                                          'OR' => array(
                                            'MATCH(Oferta.name) AGAINST(? IN BOOLEAN MODE)' => $this->params['data']['Ofertas']['criterion'],
                                            'MATCH(Oferta.introduccion) AGAINST(? IN BOOLEAN MODE)' => $this->params['data']['Ofertas']['criterion'],
                                            'MATCH(Oferta.detalle) AGAINST(? IN BOOLEAN MODE)' => $this->params['data']['Ofertas']['criterion']
                                          )
                                        )
                                      );
    }  
    
    
    
    if (!empty($this->params['data']['Ofertas']['tags'])){
      $options['joins'] = array(
                            array(
                                'table' => 'ofertas_tags', // or products_categories
                                'alias' => 'OferTags',
                                'conditions' => array(
                                    'OferTags.tag_id' => $this->params['data']['Ofertas']['tags'],
                              )
                            )
                          );
      } 
    
    
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
        
        $this->set('oferta_nombre', $detail['Oferta']['name']);
        $this->set('programa_name', $detail['ProgramasCircuito']['name']);
        $this->set('valido_desde', $detail['Oferta']['start_date']);
        $this->set('valido_hasta', $detail['Oferta']['end_date']);
        $this->set('precio_oferta', $detail['Oferta']['precio']);
        $this->set('oferta_id', $detail['Oferta']['id']);
        
        $this->set('nombre', $this->data[$this->model]['name']);
        $this->set('telefono', $this->data[$this->model]['phone']);
        $this->set('email', $this->data[$this->model]['email']);
        $this->set('check_in', $this->data[$this->model]['checkin']);
        $this->set('check_out',$this->data[$this->model]['checkout'] );
        $this->set('adultos', $this->data[$this->model]['adultos']);
        $this->set('ninos', $this->data[$this->model]['Ninos']);
        $this->set('comentario', str_replace('\n\r', '<br/>', $this->data[$this->model]['message']));
        
        $this->Email->from = $this->data[$this->model]['name'] .' <' . $this->data[$this->model]['email'] . '>';
        $this->Email->to = $parametros['Params']['correo_general'];
        $this->Email->subject = 'Consulta de la oferta '.$detail['Oferta']['name'].' - Sivetur S.A.';
        
        $this->Email->template = 'reserva_oferta';
        $this->Email->sendAs = 'html';
        
        $this->Email->send();
        //++++++++++++++++ HAY QUE ENVIAR TAMBIEN AL USUARIO +++++++++++++++++++++++
        $this->Email->reset();
        
        $this->Email->from = $this->data[$this->model]['name'] .' <' . $this->data[$this->model]['email'] . '>';
        $this->Email->to = $this->data[$this->model]['email'];
        $this->Email->subject = 'Consulta de la oferta '.$detail['Oferta']['name'].' a Sivetur S.A.';
        
        $this->Email->template = 'cliente_reserva_oferta';
        $this->Email->sendAs = 'html';
        
        $this->Email->send();
        
        $this->Session->setFlash("El mensaje ha sido enviado satisfactoriamente");
        // Display the success.ctp page instead of the form again
        $this->redirect("index");
      } else {
        $this->render('reservation');
      }
    }
  }
  
}
?>
