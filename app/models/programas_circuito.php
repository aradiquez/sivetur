<?
class ProgramasCircuito extends AppModel {
    var $name="ProgramasCircuito";
     /** ** relacion entre programas y foto (de tiene muchos) ***/
     # dependent => true (elimina en cascada )
     var $hasMany = array('Photos' =>
                            array('className'     => 'Photo',
                                  'conditions'    => array('key' => 2),
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
                            ),
                            'ProgramasCircuitos' =>
                              array('className' => 'ProgramasCircuito',
                                    'order' => '',
                                    'foreignKey' => 'parent_id',
                                     'counterCache' => '')
                     );
}
?>