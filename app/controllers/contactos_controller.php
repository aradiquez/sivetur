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
        $this->Email->send($this->data[$this->model]['message']);
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