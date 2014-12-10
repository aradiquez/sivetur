<? class ThumbnailComponent extends Object
     {
     /** Tipos de imagenes aceptados */ #,'image/png'
    var $allowed_mime_types = array('image/jpg','image/jpeg','image/pjpeg','image/gif');
     
	 /**
     ** Localizacion de la carpeta donde vamos a guardar las fotos
     **
	 **/
	var $image_location = '../../../fotos/';
	
	/** tumbnails ***/
	var $thumb_location = '../../../fotos/tn_';
	
	var $menor_location = '../../../fotos/f_';
    
	/** Array de errores */
    var $errors = array();
    
	/** Ancho por default si no se especifica */
    var $width = 150;
    /** Alto  por default si no se especifica */
    var $height = 150;
     /** agregar zoom a la imagen */
    var $zoom_crop = 0;
     
	 /**  La imagen original
     * @acceso privado */
    var $file;
    var $controller;
    var $model;

 function startup(&$controller ){$this->controller = &$controller;}
 
 function setWidth($nwidth){$this->width =$nwidth;}
 
 function setAlto($nheight){$this->height =$nheight;}
 
 function setRuta($nruta){$this->image_location =$nruta;$this->thumb_location = $nruta.'tn_';}
 
/**
 Funcion que genera el el thumnail y redimenciona la imagen original agregandole la marca de agua.
 
 * @param  string  $filename Nombre del archivo(.jpg o .gif).
 * @param  string  $model Nombre del Modelo al que pertenesen los datos (data)
 * @param  boolean  $marca Indicacion para aplicar marca de agua.
 * @param  boolean  $generar Indicacion para generar el thumnail o solamemente redimencionar.
 * @param  boolean $return 

 * @access public
 */
 function cargar($filename,$model,$marca,$generar=true)
 {
        $generar==''? $generar=true:'';# anteriormente pasaba un blanco y ahora necesito un true o false para generar el thumnail,para no tener q cambiar en todas partes. 
        
		# Make sure we have the name of the uploaded file and that the Model is specified
		if(empty($filename) || !$this->controller->data[$model][$filename])
		 {
            $this->addError('No existe el archivo'.$filename);
            return false;
         }
        # save the file to the object
        $this->file = $this->controller->data[$model][$filename];
		
        # verify that the size is greater than 0 ( emtpy file uploaded )
        if($this->file['size']<= 0)
		{
            $this->addError('TamaÒo del Archivo 0');
            return false;
        }

        if($this->file['size']>300000)
		{
            $this->addError('TamaÒo del Archivo supera el maximo permitido');
            return false;
        }

        # verify that our file is one of the valid mime types
        if(!in_array($this->file['type'],$this->allowed_mime_types))
		{
            $this->addError('No es valido el tipo de archivo: '.$this->file['type']);
            return false;
        }
 		
	   if (is_uploaded_file($this->file['tmp_name']))
        {
            $nfile=$this->reempazar($this->file['name']);
			$orgfile=$this->file['name'];
			
			 if(file_exists($this->image_location.$nfile))
			 {
				$this->addError('Ya existe un archivo con el nombre:'.$nfile);
				return false;
			 }
			
			if (copy($this->file['tmp_name'],$this->image_location.$this->file['name']))
		    { 
				if($generar)# si deseo generar la foto pequeÒa
				{	  
				  $picsize=getimagesize($this->image_location.$this->file['name']);
				  
			      if(!$this->proporcional($this->image_location.$this->file['name'],$this->width,$this->thumb_location.$nfile,80))
					{
						#esto es para ver cual valor debo enviarle
						# si es vertical u horizontal.
						if($picsize[0]>$picsize[1])#esta imagen es vertical
							$imgAlto  = $picsize[1];
						else
							$imgAlto  = $picsize[0];
							
						$this->proporcional($this->image_location.$this->file['name'],$imgAlto-1, $this->thumb_location.$nfile,80,$this->width);	
					
					}
				}		
					# si la foto es mas grande q 640 en uno de sus lados
					if($this->proporcional($this->image_location.$this->file['name'],640, $this->menor_location.$nfile,80))
					  {    
						   unlink($this->image_location.$this->file['name']);
					       #le quitamos el prefijo f_
						   rename($this->image_location."f_".$nfile,$this->image_location.$nfile);
					   }else{				   	     						
					rename($this->image_location.$orgfile,$this->image_location."r_".$nfile);
					rename($this->image_location."r_".$nfile,$this->image_location.$nfile);
					   }
					   
					  if($marca)
						{
						 	$this->marcadeagua($this->image_location.$nfile,$this->image_location."marca.png",$this->image_location.$nfile,80);
						 }
                }else
				{
				   $this->addError('No se pudo mover a la ruta especificada ');
                   return false;
				}
				
        }else
		{
		  $this->addError('No se pudo leer la imagen.');
          return false;
		}
	
	return true;
    }
/** ===== ===== ===== ===== ===== ===== ===== ===== ===== ===== ===== ===== ====== */

function proporcional($sourcefile,$altura,$targetfile,$calidad,$altura_original="")
 { 
 /*Recopilacion de codigo por Henry Ferreto y adaptacion del codigo a la
  funcion ya existente por Guillermo Arias para Zews S.A
  Se mejoro para que  haga el ancho del  thumbnail segun la altura que se le especifica.
 
  * ResizeToFile cambia una imagen y la almacena en el disco duro
  * $sourcefile = el nombre de la imagen que va a ser redimensionada
  * $ancho   = tamaÒo X de la foto destino en pixeles
  * $altura  = tamaÒo Y de la foto destino en pixelex
  * $targetfile = El nombre que tendr· el thumbnail
  * $jpegqual = La tasa de compresiÛn a utilizar (porcentaje de calidad del thumbnail)*/
 /* Se obtienen las dimensiones a partir del archivo original*/
  
  #Se volvio a mejorar para que se generen tanto gif como jpg, por Rolando Avalos Avalos (24 ene 2007)
  # ⁄ltima actualizacion 03 de DIC del 2007 por Henry Ferreto
  
  $cambiar=false;#para ejecutar cambio
 
  #obtendremos la anchura y altura de la imagen original
  $picsize=getimagesize($sourcefile);
  $imgAncho = $picsize[0];//w
  $imgAlto  = $picsize[1];//h

  # extraer el tipo de imagen seg˙n su la extension del fichero
  $origen=strtok($sourcefile,".");
  while ($origen){
	   $tipo=$origen;#para guardar la extencion ya que $origen queda con en false
	   $origen = strtok(".");
   }
  $tipo=strtolower($tipo);#por si la extencion viene en mayusculas
   
   # las diferentes opciones dependiendo del formato de la imagen --"jpeg"
  switch($tipo){
    case "jpg":
          $source_id=imagecreatefromjpeg($sourcefile);
    	  break;
    case "jpeg":
          $source_id=imagecreatefromjpeg($sourcefile);
    	  break;
	case "gif":
          $source_id=imagecreatefromgif($sourcefile);
    	  break;
   }	
   #Crea un nuevo objeto de imagen, no necesariamente true color
   #Este IF se creo para que la imagen sea proporcional dependiendo
   #si es 640x480 o 480x640 =ejemplo= para que quede siempre proporcional.
  
   if ($imgAncho < $imgAlto)#si es mas alta que ancha
   {   
	   if ($picsize[0] > $altura)#si es mas ancha que la altura predeterminada se estira
	   {
		   # esto lo que hace es colocarle obligado a la altura, la altura original que se habia perdido, a la hora de no generar el thum normal porque uno de los lados de la imagen original es menor a la altura que enviamos.
		   ($altura_original<>"")? $altura=$altura_original:'';
		   
		   $cambiar =true;
		   $ratio = ($picsize[1]/ $altura);
		   
		   #Redondeamos el tamaÒo para que la imagen no se deforme.
		   $anchura = round($picsize[0] / $ratio);
		
		   /*En este caso, para una foto de 500x375 pixeles y una altura dada de 100 pixeles
		   se genera un thumbnail de 100x75 pixeles*/
		   
		   if($tipo=="jpg" or $tipo=="jpeg")
		   
		   		$target_id=imagecreatetruecolor($anchura, $altura); 
			
			else{
			   #AGREGADO POR HEFE, 03 DE DICIEMBRE 2007, PARA EL MANEJO DE IMAGENES TRANSPARENTES
			   $colorTransparent = imagecolortransparent($source_id); 
			   $target_id = imagecreate($anchura, $altura);
			   imagepalettecopy($target_id, $source_id);
			   imagefill($target_id, 0, 0, $colorTransparent);
			   imagecolortransparent($target_id, $colorTransparent);
			   
			}#FIN DE MANEJO DE IMAGENES TRANSPARENTES
			   
		   #Se redimensiona la imagen original y se copia en el objeto imagen reciÈn creado.
		   $target_pic=imagecopyresampled($target_id,$source_id,0,0,0,0,$anchura,$altura,$picsize[0],$picsize[1]);
       }
   }else #si es mas ancha que alta
   {	
	   if ($picsize[1] > $altura){#si es mas alta que la altura predeterminada se estira
		   #esto lo que hace es colocarle obligado a la altura, la altura original que se habia perdido.
		   ($altura_original<>"")? $altura=$altura_original:'';
		   
		   $cambiar =true;		   
		   $ratio = ($picsize[0]/ $altura);
		   #Redondeamos el tamaÒo para que la imagen no se deforme.
		   $anchura = round($picsize[1]/ $ratio);
		   
		   #utilizar imagecreate() e imagecopyresized()caso de tener solo la libreria GD 1.6 y no la 2.0.1 o sup
		   if($tipo=="jpg" or $tipo=="jpeg")
		   
				$target_id=imagecreatetruecolor($altura, $anchura);
				
		   else{
			  #AGREGADO POR HEFE, PARA EL MANEJO DE IMAGENES TRANSPARENTES
			   $colorTransparent = imagecolortransparent($source_id);
			   $target_id = imagecreate($altura, $anchura);
			   imagepalettecopy($target_id, $source_id);
  			   imagefill($target_id, 0, 0, $colorTransparent);
 			   imagecolortransparent($target_id, $colorTransparent);
			   
			}#FIN DE MANEJO DE IMAGENES TRANSPARENTES
		   
		   #Se redimensiona la imagen original y se copia en el objeto imagen reciÈn creado.
		   $target_pic=imagecopyresampled($target_id,$source_id,0,0,0,0,$altura,$anchura,$picsize[0],$picsize[1]);
   	    };
   }
 
  /*Se crea un nuevo jpeg con la calidad del par·metro $calidad en el objeto imagen $target_pic
  Ser· salvado como $targetfile*/
  
  if($cambiar)//si se realizo un rezize
  {
	   # las diferentes opciones dependiendo del formato de la imagen
	  switch($tipo){
		case "jpg"://or "jpeg"
			  imagejpeg ($target_id,"$targetfile",$calidad);
			  break;
		case "jpeg"://or "jpeg"
			  imagejpeg ($target_id,"$targetfile",$calidad);
			  break;
		case "gif":
			  imagegif($target_id,"$targetfile",$calidad);
		      break;
	   }
	   return true;
  }else
  {
	   return false;
   }
 }

/* ===== ===== ===== ===== ===== ===== ===== ===== ===== ===== ===== ===== ====== */

 function marcadeagua($img_original, $img_marcadeagua, $img_nueva, $calidad) {
		# obtener datos de la fotografia
		$info_original = getimagesize($img_original);
		$anchura_original = $info_original[0];
		$altura_original = $info_original[1];
		
		# extraer el tipo de imagen seg˙n su la extension del fichero
		$origen=strtok($img_original,".");
		while ($origen){
		   $tipo=$origen;//para guardar la extencion ya que $origen queda con en false
		   $origen = strtok(".");
		}
		$tipo=strtolower($tipo);//por si la extencion viene en mayusculas

		# obtener datos de la "marca de agua"
		$info_marcadeagua = getimagesize($img_marcadeagua);
		$anchura_marcadeagua = $info_marcadeagua[0];
		$altura_marcadeagua = $info_marcadeagua[1];

		# calcular la posiciÛn donde debe copiarse la "marca de agua" en la fotografia
		$horizextra = $anchura_original - $anchura_marcadeagua;
		$vertextra = $altura_original - $altura_marcadeagua;
		$horizmargen = round($horizextra );
		$vertmargen = round($vertextra);
		
	 	# crear imagen desde el original segun el tipo
		if($tipo=="jpg" or $tipo=="jpeg")
		{
			$original=imagecreatefromjpeg($img_original);
			imagealphablending($original, true);
		 	# crear nueva imagen desde la marca de agua
			$marcadeagua = imagecreatefrompng($img_marcadeagua);
	     	#copiar la "marca de agua" en la fotografia
			imagecopy($original, $marcadeagua, $horizmargen, $vertmargen, 0, 0, $anchura_marcadeagua,$altura_marcadeagua);
			# guardar la nueva imagen
			imagejpeg($original, $img_nueva, $calidad);
	        # cerrar las im·genes
			imagedestroy($original);
			imagedestroy($marcadeagua);
		}
  }
/** ==== === === === === === === === === === === === === === === === === === === === */  
function addError($msg)
{
	$this->errors[] = $msg;
}
/** ===== ===== ===== ===== ===== ===== ===== ===== ===== ===== ===== ===== ====== */
function eliminar($foto)
{   
	if(file_exists($this->image_location.$foto)){
    	if(unlink($this->image_location.$foto))
	    	{//if(@unlink($this->image_location."tn_".$foto))
	        	@unlink($this->image_location."tn_".$foto);
				return true;
	            /*else
	            return false;*/
          	
			}else
	    		return false;
    		
		}#fin existe externo
		else{
 			return true;
		}
}
/** === === === === === === === === === === === === === === === === === === === === */
	function ThumbFijo($sourcefile, $dest_x, $dest_y, $img_nueva,$calidad) 
	{

		#obtendremos la anchura y altura de la imagen original
		$picsize=getimagesize($sourcefile);
		$imgAncho = $picsize[0];//w
		$imgAlto  = $picsize[1];//h
		
		# extraer el tipo de imagen seg˙n su la extension del fichero
		$origen=strtok($sourcefile,".");
		while ($origen){
		   $tipo=$origen;//para guardar la extencion ya que $origen queda con en false
		   $origen = strtok(".");
		}
		$tipo=strtolower($tipo);//por si la extencion viene en mayusculas
		
		# las diferentes opciones dependiendo del formato de la imagen  "jpeg"
		switch($tipo){
		case "jpg" :
		      $source_id=imagecreatefromjpeg($sourcefile);
			  break;
		case "jpeg":
	          $source_id=imagecreatefromjpeg($sourcefile);
	    	  break;
		case "gif":
		      $source_id=imagecreatefromgif($sourcefile);
			  break;
		}
		//$source_id = imageCreateFromJPEG("$sourcefile");
		
		$target_id=imagecreatetruecolor($dest_x, $dest_y);
		
		$target_pic=imagecopyresampled($target_id,$source_id,0,0,0,0,$dest_x,$dest_y,$imgAncho,$imgAlto);
		
		
		switch($tipo){
		case "jpg":
			  imagejpeg ($target_id,$img_nueva,$calidad);
			  break;
		case "jpeg":
			  imagejpeg ($target_id,$img_nueva,$calidad);
			  break;
		case "gif":
			  imagegif($target_id,$img_nueva,$calidad);
		      break;
	   }
		
		return true;
	}
	
/*=== === === === === === === === === === === === === === === === === === === === */
function generaThumLogo($filename,$model,$width,$height,$solothum=false)
{
        // Make sure we have the name of the uploaded file and that the Model is specified
		 if(empty($filename) || !$this->controller->data[$model][$filename])
		 {
            $this->addError('No existe el archivo '.$filename);
            return false;
         }
        // save the file to the object
        $this->file = $this->controller->data[$model][$filename];

        // verify that the size is greater than 0 ( emtpy file uploaded )
        if(!$this->file['size']>0)
		{
            $this->addError('TamaÒo del Archivo 0');
            return false;
        }

        if($this->file['size']> 300000)
		{
            $this->addError('TamaÒo del Archivo supera el maximo permitido.');
            return false;
        }

        #verify that our file is one of the valid mime types
        if(!in_array($this->file['type'],$this->allowed_mime_types))
		{
            $this->addError('No es valido el tipo de archivo: '.$this->file['type']);
            return false;
        }
 		
		 #verifico si existe el archivo
 		if (file_exists($this->image_location.$this->file['name']))
		 {
			$this->addError('Ya existe un archivo con el nombre:'.$this->file['name']);
            return false;
		}
 		
 		$nfile=$this->reempazar($this->file['name']);
 		
	   if (is_uploaded_file($this->file['tmp_name']))
        {
			if(copy($this->file['tmp_name'],$this->image_location.$this->file['name']))
		    {   
		      if($this->ThumbFijo($this->image_location.$this->file['name'],$width,$height,$this->thumb_location.$nfile,85))
				{
				 if(!$solothum){#ambas imagenes el thumb y al imagen
					rename($this->image_location.$this->file['name'],$this->image_location."l_".$nfile);
					rename($this->image_location."l_".$nfile,$this->image_location.$nfile);
				 }else{
					@unlink($this->image_location.$this->file['name']);#borro la original
					rename($this->image_location."tn_".$nfile,$this->image_location.$nfile);
				}
					
					return true;
				}
				
            }else
			{
			   $this->addError('No se pudo mover a la ruta especificada.');
               return false;
			}
				
        }else
		{
		  $this->addError('No se pudo leer la imagen.');
          return false;
		}
	//return true;	
}
    
function reempazar($texto)
{
	static $novalidos = "·ÈÌÛ˙¡…Õ”⁄‡ËÏÚ˘¿»Ã“Ÿ‚ÍÓÙ˚¬ Œ‘€‰ÎÔˆ¸ƒÀœ÷‹«Á≈Â’ıÿ¯ˇÒ— ";
        static $validos = "aeiouAEIOUaeiouAEIOUaeiouAEIOUaeiouAEIOUCcAaOoOoynN_";

	$texto=trim($texto);
	$texto = strtolower(strtr($texto,$novalidos,$validos));
    $textolimpio = "";
    
    #solo caracteres alfanumÈricos(letras y n˙meros),el guion bajo(_) y el guion(-)
	for($i=0;$i<strlen($texto);$i++)
        if(ereg("[a-z0-9_.-]",$texto[$i])) $textolimpio.=$texto[$i];
        
    return $textolimpio;
}

}
?>