<?
class Contacto extends AppModel {

    var $name = 'Contacto';
    var $useTable = false;

    var $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'Debes ingresar tu nombre.'
        ),
        'phone' => array(
            'rule' => 'numeric',
            'message' => 'Debe ingresar un número de teléfono.'
        ),
        'email' => array(
            'rule' => 'email',
            'message' => 'Debe ingresar un email valido.'
        ),
        'message' => array(
            'rule' => 'notEmpty',
            'message' => 'No has ingresado tu comentario o pregunta.'
        )
    );
}
?>