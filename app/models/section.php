<?
class Section extends AppModel {
    var $name="Section";
	var $displayField='title';

  /** ** relacion entre programas y foto (de tiene muchos) ***/
  # dependent => true (elimina en cascada )
  var $hasMany = array('Photos' =>
                         array('className'     => 'Photo',
                               'conditions'    => array('key' => 1, 'first' => '0'),
                               'order'         => '',
                               'limit'         => '',
                               'foreignKey'    => 'generic_id',
                               'dependent'     => true,
                               'exclusive'     => false,
                               'finderQuery'   => ''
                         ),
                          'FirstPhoto' =>
                              array('className'     => 'Photo',
                                    'conditions'    => array('key' => 1, 'first' => '1'),
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