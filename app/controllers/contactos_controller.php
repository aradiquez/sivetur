<?php
class ContactosController extends AppController {
  var $helpers = array('Html','Form','Javascript','Funciones','Ajax','Image', 'Text', 'ImageSize');
  var $components = array('RequestHandler', 'Email');
  var $uses = array('Section', 'Params', 'Contacto');
	var $name = 'Contactos';
  var $model = 'Contacto';
  
  function index(){
    $seccion = $this->getSection(6);
    $this->set('seccion', $seccion);
  }

  function send() {
    $seccion = $this->getSection(6);
    $this->set('seccion', $seccion);
    $parametros = $this->Params->find("first");
    if(!empty($this->data)) {
      $this->{$this->model}->set($this->data);

      if($this->{$this->model}->validates()) {
        $this->Email->from = $this->data[$this->model]['name'] .' <' . $this->data[$this->model]['email'] . '>';
        $this->Email->to = $parametros['Params']['correo_general'];
        $this->Email->subject = 'Contacto para Sivetur S.A.';
        
        $this->set('nombre', $this->data[$this->model]['name']);
        $this->set('telefono', $this->data[$this->model]['phone']);
        $this->set('email', $this->data[$this->model]['email']);
        $this->set('comentario', str_replace('\n\r', '<br/>', $this->data[$this->model]['message']));
        
        $this->Email->template = 'contacto';
        $this->Email->sendAs = 'html';
        
        $this->Email->send();
        //++++++++++++++++ HAY QUE ENVIAR TAMBIEN AL USUARIO +++++++++++++++++++++++
        $this->Email->reset();
        
        $this->Email->from = $this->data[$this->model]['name'] .' <' . $this->data[$this->model]['email'] . '>';
        $this->Email->to = $this->data[$this->model]['email'];
        $this->Email->subject = 'Consulta a Sivetur S.A.';
        
        $this->Email->template = 'cliente_contacto';
        $this->Email->sendAs = 'html';
        
        $this->Email->send();
        
        $this->Session->setFlash('Su mensaje se ha enviado con éxito.');
        // Display the success.ctp page instead of the form again
        $this->redirect("index");
      } else {
        $this->render('index');
      }
    }
  }
  
}
?>