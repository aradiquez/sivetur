<?
class Oferta extends AppModel {
    var $name="Oferta";
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