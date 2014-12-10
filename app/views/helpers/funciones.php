<? 
 /**
 * created by: Esteban Cordero
 * Helper created for different functions need it on the system, this functions will usually be available on all the system
 */
?> 
<?
class FuncionesHelper extends FormHelper {
	var $helpers = array('Form','Html');
    var $mime_types = array('jpg','jpeg','pjpeg','gif','png');
    
	function td($numero){ //color a los td
		$tdBg = ($numero % 2 == 0) ? 'bgcolor="#F1F1F1"' : 'bgcolor="#FFFFFF"';
		return $tdBg;
	}
	function tr($numero){ //color a los tr 
		$trBg = ($numero % 2 == 0)? "#F1F1F1" : "#FFFFFF";
		return $trBg;
	}
	/** *********************************************** **************************************
	* Funcion para formatear la fecha (dd/mm/yyyy) 
	*********************************************** ***************************************/
	function fnCambiaf_normal($fecha) { 
	    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha); 
	    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1]; 
	    return $lafecha; 
	}

	function fncFormatoFecha($fecha, $separador="/") { 
	    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha); 
	    $lafecha = $mifecha[3].$separador.$mifecha[2].$separador.$mifecha[1]; 
	    return $lafecha; 
	}
	
	function fncCambiaFnum($actual) {
		list($fechaAct) = explode(" ", $actual);
		list($yearAct, $mesAct, $dayAct) = explode("-", $fechaAct);
		$sAct = mktime( 0,0,0,$mesAct, $dayAct, $yearAct);
		return $sAct;
	}

	function TextoHtml($string)  {
	    $string = html_entity_decode($string);
		return $string;
	}
  
  function formatDate($date){
    return date('m/d/Y', strtotime($date));
  }
	 
	/**
	*	Encuentra si un anuncio ya vencio, dependiendo de los siguientes paramentros
	*   @author Esteban Cordero =}
	*	@param int $activo  Es el numero de meses de validez que tiene el anuncio
	*	@param date $fecha_vence  Es es argumento created del registro
	*   @return boolean true/false | True si esta acitivo / False si ya vencio  
	*/
	function valida_activo($activo,$fecha_vence){
		//descochera la fecha para ver el mes
		$fecha_listo = explode(" ",$fecha_vence);	
		list($years,$months,$days) = explode("-",$fecha_listo[0]);
		//descochera la fecha actual
		list($yearAc,$monthAct,$dayAct) = explode("-",date("Y-m-d"));
		//calcula la vara
		if($months+$activo < 12){
			$nuevo_month = 	$months+$activo;
		} else { //QUIERE DECIR QUE $month + $activo = 999 < 12
			$nuevo_month = 	$months+$activo;
			$nuevo_month = $nuevo_month-12;
			$years++;
		}
		//Comprueba
		if($this->fncCambiaFnum($years."-".$nuevo_month."-".$days) > $this->fncCambiaFnum($yearAc."-".$monthAct."-".$dayAct)){
			return true;
		} else {
			return false;
		}
	}

	/**
	* Funcion para obtener la extencion de un archivo y saber si está dentro de las conocidos/permitidos. Ej: jpg,gif...
	*/
	function getAllowExtension($str) {
		$hizo=false;
		# extraer el tipo según su la extension del fichero
		$subStr=strtok($str,".");
		while($subStr)
		{
		   $tipo=$subStr;//para guardar la extencion ya que $subStr queda con en false
		   $subStr = strtok(".");
		   $hizo=true;
		}
		
		if(!$hizo){$tipo="";}
		
		if(in_array($tipo,$this->mime_types))
			return true;
		else
			return false;
	}

	function array_ereg_search($val, $array) {         
		$i = 0;
		$return = array();
		foreach($array as $v) {
		   if(eregi($val, $v)) $return[] = $i;
		   $i++;
		}
		return $return;
    }
	
    function array_search_all($needle, $haystack) {
	    foreach ($haystack as $k=>$v) {
	        if($haystack[$k]==$needle){
	           $array[] = $k;
	        }
	    }
	    return ($array);
	}
  
  function sanitize_tags_programs($collection, $model) {
    $new_array = array();
    foreach($collection as $collect) {
      $new_array[$collect[$model]['id']] = $collect[$model]['name'];
    } 
    return $new_array;
  }
  
  function sanitize_title_to_controller_name($name){
    return str_replace(" ", "_", strtolower($name));
  }
  
  function handle_breadcrum($session, $nombre_actual = array()){
    switch($session){
      case 2:
        $breadcrum = "";
        foreach ($nombre_actual as $nombre) {
          $breadcrum .= "<li>".$this->Html->link($nombre['Colaboradore']['nombre'], '#')."</li>";
        }
        return $breadcrum;
        break;
      case 3:
        "";
          break;
      case 4:
      $breadcrum = "";
      $nombre_actual = array_reverse($nombre_actual);
      foreach ($nombre_actual as $nombre) {
        $breadcrum .= "<li>".$this->Html->link($nombre['ProgramasCircuito']['name'], array('controller' => 'programas_y_circuitos', 'action' => 'index', $nombre['ProgramasCircuito']['id'], slug($nombre['ProgramasCircuito']['name'])))."</li>";
        $breadcrum .= "<li>/</li>";
      }
      return $breadcrum;
      break;
      case 5:
      $breadcrum = "";
      $nombre_actual = array_reverse($nombre_actual);
      foreach ($nombre_actual as $nombre) {
        $breadcrum .= "<li>".$this->Html->link($nombre['ProgramasCircuito']['name'], array('controller' => 'programas_y_circuitos', 'action' => 'index', $nombre['ProgramasCircuito']['id'], slug($nombre['ProgramasCircuito']['name'])))."</li>";
        $breadcrum .= "<li>/</li>";
      }
      return $breadcrum;
      break;
      case 6:
        return "Contacto";
          break;    
    }
    
  }
  
}
?>
