<?
class HomesController extends AppController{
    var $helpers = array('Html','Form','Javascript','Funciones','Ajax','Image', 'Text', 'ImageSize');
    var $components = array('RequestHandler');
    var $uses = array('Section', 'Params', 'ProgramasCircuito', 'Colaboradore', 'Oferta', 'Photo', 'Tag');
	
  	function getNavegador(){
      $this->Section->unBindModel(array('hasMany' => array('Photos', 'FirstPhoto')));
  		return $this->Section->find('all', array('conditions' => array('id <> 1'), 'fields' => array('`Section`.`title`', '`Section`.`direccion`'), 'order' => '`Section`.`id` asc'));
  	}
	
  	function getSection($id=null){
  		$fields=array('`Section`.`title`','`Section`.`keyword`','`Section`.`description`','`Section`.`text`','`Section`.`direccion`');
  		return $this->Section->find('first', array('conditions' => array('id' => $id), 'fields' => $fields));
  	}

  	function getParams(){
  		return $this->Params->find("first");
  	}
    
    function getInfoSlideShow(){
      $params = $this->getParams();
      $hoy = date("Y-m-d");
      $fields = array('name', 'introduccion', 'precio');
      $this->Oferta->unBindModel(array('hasAndBelongsToMany' => array('Tag'), 'hasMany' => array('Photos')));
      return $this->Oferta->find('all', array('conditions' => array('programacircuito_id' => $params['Params']['categoria_elementos_slide_home'], 'start_date <= '."'$hoy'", 'end_date >= '."'$hoy'"), 'fields' => $fields, 'limit' => $params['Params']['elementos_slide_home'], 'order' => 'prioridad'));
      
    }
    
    function getTagsForSearch(){
       return $this->Tag->find('all', array('conditions' => array('estado' => "A"), 'fields' => array('id','name'), 'limit' => 16));
    }
    
    function getLastMinute(){
      $params = $this->params['params'];
      $fields = array('name', 'introduccion', 'precio');
      $this->Oferta->unBindModel(array('hasAndBelongsToMany' => array('Tag'), 'hasMany' => array('Photos'), 'belongsTo' => array('ProgramasCircuito')));
      return $this->Oferta->find('all', array('conditions' => array("start_date <= '".$params['Params']['start_date_last_minute']."'", "end_date >= '".$params['Params']['end_date_last_minute']."'"), 'fields' => $fields, 'limit' => $params['Params']['elementos_last_minute'], 'order' => 'prioridad'));
    }
	
    function getEarlyBooking(){
      $params = $this->params['params'];
      $fields = array('name', 'introduccion', 'precio');
      $this->Oferta->unBindModel(array('hasAndBelongsToMany' => array('Tag'), 'hasMany' => array('Photos'), 'belongsTo' => array('ProgramasCircuito')));
      return $this->Oferta->find('all', array('conditions' => array("start_date <= '".$params['Params']['start_date_early_booking']."'", "end_date >= '".$params['Params']['end_date_early_booking']."'"), 'fields' => $fields, 'limit' => $params['Params']['elementos_early_booking'], 'order' => 'prioridad'));
    }
    
    function getHotDeals(){
      $params = $this->params['params'];
      $fields = array('name', 'introduccion', 'precio');
      $this->Oferta->unBindModel(array('hasAndBelongsToMany' => array('Tag'), 'hasMany' => array('Photos'), 'belongsTo' => array('ProgramasCircuito')));
      return $this->Oferta->find('all', array('conditions' => array("start_date <= '".$params['Params']['start_date_hot_deals']."'", "end_date >= '".$params['Params']['end_date_hot_deals']."'"), 'fields' => $fields, 'limit' => $params['Params']['elementos_hot_deals'], 'order' => 'prioridad'));
    }
	
	function getTopDeals(){
		$params = $this->params['params'];
		$fields = array('name', 'introduccion', 'precio');
		$this->Oferta->unBindModel(array('hasAndBelongsToMany' => array('Tag'), 'hasMany' => array('Photos'), 'belongsTo' => array('ProgramasCircuito')));
		return $this->Oferta->find('all', array('conditions' => array('programacircuito_id' => $params['Params']['categoria_elementos_top_deals']), 'fields' => $fields, 'limit' => $params['Params']['elementos_top_deals'], 'order' => 'prioridad'));
	}
	
	function getFeatureOffers(){
		$params = $this->params['params'];
		$fields = array('name', 'introduccion', 'precio');
		$this->Oferta->unBindModel(array('hasAndBelongsToMany' => array('Tag'), 'hasMany' => array('Photos'), 'belongsTo' => array('ProgramasCircuito')));
		return $this->Oferta->find('all', array('conditions' => array('programacircuito_id' => $params['Params']['categoria_elementos_feature_offers']), 'fields' => $fields, 'limit' => $params['Params']['elementos_feature_offers'], 'order' => 'prioridad'));
	}
	
	function getFooterA(){
		$params = $this->params['params'];
		$fields = array('name', 'introduccion', 'precio');
		$this->Oferta->unBindModel(array('hasAndBelongsToMany' => array('Tag'), 'hasMany' => array('Photos', 'FirstPhoto'), 'belongsTo' => array('ProgramasCircuito')));
		return $this->Oferta->find('all', array('conditions' => array('programacircuito_id' => $params['Params']['categoria_footer_bloquea']), 'fields' => $fields, 'limit' => 6, 'order' => 'prioridad'));
	}
	
	function getFooterB(){
		$params = $this->params['params'];
		$fields = array('name', 'introduccion', 'precio');
		$this->Oferta->unBindModel(array('hasAndBelongsToMany' => array('Tag'), 'hasMany' => array('Photos', 'FirstPhoto'), 'belongsTo' => array('ProgramasCircuito')));
		return $this->Oferta->find('all', array('conditions' => array('programacircuito_id' => $params['Params']['categoria_footer_bloqueb']), 'fields' => $fields, 'limit' => 6, 'order' => 'prioridad'));
	}
}
?>
