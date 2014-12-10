<?
class HighlightHelper extends FormHelper
{
	
	var $highlightover='#ffefdb';
	var $highlightclick='#ffcc99';
	
	var $helpers = array('Form');
    
	function td($numero)//color a los td
     {
		if ($numero % 2 == 0)
		{
			 return 'bgcolor="#DEE7EC"';
		}
		else{
		 return 'bgcolor="#FFFFFF"';
	    }
    }


function over($nuevo="")
     {
		 if($nuevo!="")
		   $this->highlightover=$nuevo;
		 return $this->highlightover;
	    
      }
      function click($nuevo="")
     {  
		   if($nuevo!="")
		      $this->highlightclick=$nuevo;
		 return $this->highlightclick;
	    
      }
//============================================================================================
function tr($numero)//color a los tr
{
	if ($numero % 2 == 0)
	{
      return "#DEE7EC";
     }
	else
	{  return "#FFFFFF";
     }

}
/**************************************************/
function fnCambiaf_normal($fecha){ 
    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha); 
    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1]; 
    return $lafecha; 
} 
}
?>
