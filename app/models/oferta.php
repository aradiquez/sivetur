<?
class Oferta extends AppModel {
    var $name="Oferta";
    
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
            'message' => 'No has ingresado tu mensaje.'
        ),
        'checkin' => array(
            'rule' => array('date', 'dmy'),
            'message' => 'fecha de Check in incorrecta',
            'allowEmpty' => true
        ),
        'checkout' => array(
            'rule' => array('date', 'dmy'),
            'message' => 'fecha de Check out incorrecta',
            'allowEmpty' => true
        )
    );
    
   	function suma_visitas($id){       
      return $this->query("update ofertas set visitas=visitas+1 WHERE id=".$id);
   }
    var $belongsTo = array(
            'ProgramasCircuito' => array(
                'className'    => 'ProgramasCircuito',
                'conditions'    => '',
                'order'         => '',
                'limit'         => '',
                'foreignKey'    => 'programacircuito_id',
                'dependent'     => true,
                'exclusive'     => false,
                'finderQuery'   => ''
            )
        );
    
  	/** ** relacion entre regiones y clientes (de tiene muchos) ***/
    	# dependent => true (elimina en cascada )
  	var $hasAndBelongsToMany = array('Tag' =>
                                 array('className'    => 'Tag',
                                       'joinTable'    => 'ofertas_tags',
                                       'foreignKey'   => 'oferta_id',
                                       'associationForeignKey'=> 'tag_id',
                                       'conditions'   => '',
                                       'order'        => '',
                                       'limit'        => '',
                                       'unique'       => true,
                                       'finderQuery'  => '',
                                       'deleteQuery'  => '',
                                 		)
                                 );
     /** ** relacion entre programas y foto (de tiene muchos) ***/
     # dependent => true (elimina en cascada )
     var $hasMany = array('Photos' =>
                            array('className'     => 'Photo',
                                  'conditions'    => array('key' => 3),
                                  'order'         => '',
                                  'limit'         => '',
                                  'foreignKey'    => 'generic_id',
                                  'dependent'     => true,
                                  'exclusive'     => false,
                                  'finderQuery'   => ''
                            ),
                          'FirstPhoto' =>
                              array('className'     => 'Photo',
                                    'conditions'    => array('key' => 3, 'first' => '1'),
                                    'order'         => '',
                                    'limit'         => 1,
                                    'foreignKey'    => 'generic_id',
                                    'dependent'     => true,
                                    'exclusive'     => false,
                                    'finderQuery'   => ''
                              )
                     );
}
?>