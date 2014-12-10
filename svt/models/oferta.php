<?
class Oferta extends AppModel {
    var $name="Oferta";
    
	  var $validate = array(
   			'name' =>  array('required' => 
   											array(
	            								'rule' => 'notEmpty',
	            								'message' => 'El nombre es requerido.'
	        									)
								 		)
    );  
    var $belongsTo = array(
            'ProgramasCircuito' => array(
                'className'    => 'ProgramasCircuito',
                'foreignKey'    => 'programacircuito_id'
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
                                  'conditions'    => array('key' => 1),
                                  'order'         => '',
                                  'limit'         => '',
                                  'foreignKey'    => 'generic_id',
                                  'dependent'     => true,
                                  'exclusive'     => false,
                                  'finderQuery'   => ''
                            )
                     );
                     
}
?>