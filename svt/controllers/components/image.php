<?php
 /* File: /app/controllers/components/image.php
 */
class ImageComponent extends Object {
	var $image_location = '../../fotos';	
  var $tmp_location = '../../fotos';	
	var $errors = array();
        var $tn='tn_';
        //cuando se necesita fijas
        var $fixed=false;
        var $wi=150;
        var $he=113;
        
	function upload_image_and_thumbnail($data,$modelo, $datakey, $imgscale, $thumbscale, $folderName, $square,$marca,$fixed='false') {
		  if (strlen($data[$modelo][$datakey]['name'])>4){ 
					$error = 0;
					$tempuploaddir = $this->tmp_location."temp"; // the /temp/ directory, should delete the image after we upload
					$biguploaddir = $this->image_location; // the /big/ directory
					$smalluploaddir = $this->image_location; // the /small/ directory for thumbnails
					
					if(!is_dir($tempuploaddir)) mkdir($tempuploaddir,true);
					if(!is_dir($biguploaddir)) {
							mkdir($biguploaddir,true);
							chmod($biguploaddir, 0777);
					}
					if(!is_dir($smalluploaddir)) mkdir($smalluploaddir,true);
	
					$filetype = $this->getFileExtension($data[$modelo][$datakey]['name']);
					$filetype = strtolower($filetype);
 
					if (($filetype != "jpeg")  && ($filetype != "jpg") && ($filetype != "gif") && ($filetype != "png")) {
						$this->addError('No es valido el tipo de archivo: '.$filetype);
            return false;
					} else {
						// Get the image size
						$imgsize = GetImageSize($data[$modelo][$datakey]['tmp_name']);
					}
          if($data[$modelo][$datakey]['size']<= 0) {
            $this->addError('Tamaño del Archivo 0');
             return false;
           }
           if($data[$modelo][$datakey]['size'] > 3000000) {
                $this->addError('Tamaño del Archivo supera el maximo permitido 3000 kb');
                return false;
            }
           $filename=$this->generateUniqueFilename($data[$modelo][$datakey]['name'],$this->image_location);
           $tempfile = $tempuploaddir . "/$filename";
					 $resizedfile = $biguploaddir . "/$filename";
					 $croppedfile = $smalluploaddir . "/$this->tn$filename";
           //aqui se copia la imagen             
			     if (is_uploaded_file($data[$modelo][$datakey]['tmp_name'])) {                    
					   // Copy the image into the temporary directory
             if (!copy($data[$modelo][$datakey]['tmp_name'],"$tempfile")) {            
			         $this->addError('No se pudo mover a la ruta especificada ');
               return false;
             } else {				
			         /**	Generate the big version of the image with max of $imgscale in either directions */
			         if($square) {
  					     /**	Generate the small square version of the image with scale of $thumbscale */
    					   $this->crop_img($tempfile, $thumbscale, $croppedfile);
    					 } else {
                 /* Generate the big version of the image with max of $imgscale in either directions */
                 if($fixed)
                   $this->cropFixed($tempfile,$this->tnwi,$this->tnhe, $croppedfile,100);
                 else
					         $this->resize_img($tempfile, $thumbscale, $croppedfile);
					     }
  
			         if($fixed){
                  $this->cropFixed($tempfile,$this->wi,$this->he, $resizedfile,100);
               }else{
                  $this->resize_img($tempfile, $imgscale, $resizedfile);
               }
               if($marca) {
				         $this->marcadeagua($resizedfile,$this->dirmarca."marca.png",$resizedfile,100);
				       }	
							// Delete the temporary image
			        unlink($tempfile);
			      }
          }
          return $filename;   
		   }
	}
	
	/*para logos*/

	function upload_image($data,$modelo, $datakey, $imgscale,$fixed) {
		  if (strlen($data[$modelo][$datakey]['name'])>4){ 
					$error = 0;
					$tempuploaddir = $this->tmp_location."temp"; // the /temp/ directory, should delete the image after we upload
					$biguploaddir = $this->image_location; // the /big/ directory
					 // Make sure the required directories exist, and create them if necessary
					if(!is_dir($tempuploaddir)) mkdir($tempuploaddir,true);
					if(!is_dir($biguploaddir)) {
            mkdir($biguploaddir,true);
            chmod($biguploaddir, 0777);
          }
					$filetype = $this->getFileExtension($data[$modelo][$datakey]['name']);
					$filetype = strtolower($filetype);
 
					if (($filetype != "jpeg")  && ($filetype != "jpg") && ($filetype != "gif") && ($filetype != "png")) {
						$this->addError('No es valido el tipo de archivo: '.$filetype);
            return false;
					} else {
						// Get the image size
						$imgsize = GetImageSize($data[$modelo][$datakey]['tmp_name']);
					}
          if($data[$modelo][$datakey]['size']<= 0) {
            $this->addError('Tamaño del Archivo 0');
            return false;
          }
          if($data[$modelo][$datakey]['size'] >3000000) {
            $this->addError('Tamaño del Archivo supera el maximo permitido');
            return false;
          }
          $filename=$this->generateUniqueFilename($data[$modelo][$datakey]['name'],$this->image_location);
          $tempfile = $tempuploaddir . "/$filename";
					$resizedfile = $biguploaddir . "/$filename";
          //aqui se copia la imagen             
			    if (is_uploaded_file($data[$modelo][$datakey]['tmp_name'])) {                    
					  // Copy the image into the temporary directory
            if (!copy($data[$modelo][$datakey]['tmp_name'],"$tempfile")) {                           
			        $this->addError('No se pudo mover a la ruta especificada ');
              return false;
			      } else {				
			        /**	Generate the big version of the image with max of $imgscale in either directions */
			        if($fixed){
                $this->cropFixed($tempfile,$this->wi,$this->he, $resizedfile,100);
              }else{
                $this->resize_img($tempfile, $imgscale, $resizedfile);
              }               		
							// Delete the temporary image
			        unlink($tempfile);
			      }
          }
          // Image uploaded, return the file name
					return $filename;   
		  }
	}
	
	/**/
	/*
	*	Deletes the image and its associated thumbnail
	*	Example in controller action:	$this->Image->delete_image("1210632285.jpg","sets");
	*
	*	Parameters:
	*	$filename: The file name of the image
	*	$folderName: the name of the parent folder of the images. The images will be stored to /webroot/img/$folderName/big/ and  /webroot/img/$folderName/small/
	*/
	function delete_image($filename,$folderName) {
    $exito=false;
    if($folderName!=""){
      $folderName=$folderName.'/';
      //  echo $this->image_location.$folderName.$filename;
    }
    if(file_exists($this->image_location.$folderName.$filename)){
      if(unlink($this->image_location.$folderName.$filename)){
        if(file_exists($this->image_location.$folderName.$this->tn.$filename)){
          if(unlink($this->image_location.$folderName.$this->tn.$filename)){
            $exito=true;
          } else {
            $exito=false; 
          }
        }
      }
    }
    return $exito;
	}
	
	function delete_archivo($filename,$folderName) {
		$exito=false;
		if($folderName!=""){
			 $folderName=$folderName.'/';
		}
		
		if(file_exists($this->image_location.$folderName.$filename))
			 if(unlink($this->image_location.$folderName.$filename))
				$exito=true;
			 else
				$exito=false;
		return $exito;
	}
	
  function crop_img($imgname, $scale, $filename) {	
		$filetype = $this->getFileExtension($imgname);
		$filetype = strtolower($filetype);
			  
		switch($filetype){
			case "jpeg":
			case "jpg":
			  $img_src = ImageCreateFromjpeg ($imgname);
			 break;
			 case "gif":
			  $img_src = imagecreatefromgif ($imgname);
			 break;
			 case "png":
			  $img_src = imagecreatefrompng ($imgname);
			 break;
		}
	   
    $width = imagesx($img_src);
    $height = imagesy($img_src);
    $ratiox = $width / $height * $scale;
    $ratioy = $height / $width * $scale;
	 
    //-- Calculate resampling
    $newheight = ($width <= $height) ? $ratioy : $scale;
    $newwidth = ($width <= $height) ? $scale : $ratiox;
	
    //-- Calculate cropping (division by zero)
    $cropx = ($newwidth - $scale != 0) ? ($newwidth - $scale) / 2 : 0;
    $cropy = ($newheight - $scale != 0) ? ($newheight - $scale) / 2 : 0;
          
    //-- Setup Resample & Crop buffers
    $resampled = imagecreatetruecolor($newwidth, $newheight);
    $cropped = imagecreatetruecolor($scale, $scale);
              
    //-- Resample
    imagecopyresampled($resampled, $img_src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    //-- Crop
    imagecopy($cropped, $resampled, 0, 0, $cropx, $cropy, $newwidth, $newheight);        
             
		// Save the cropped image
		switch($filetype) {
			case "jpeg":
			case "jpg":
			   imagejpeg($cropped,$filename,80);
			 break;
			 case "gif":
			   imagegif($cropped,$filename,80);
			 break;
			 case "png":
			   imagepng($cropped,$filename,80);
			 break;
		}
  }
	
	function resize_img($imgname, $size, $filename)	{
		$filetype = $this->getFileExtension($imgname);
		$filetype = strtolower($filetype);

		switch($filetype) {
			case "jpeg":
			case "jpg":
			  $img_src = ImageCreateFromjpeg ($imgname);
			break;
			case "gif":
			  $img_src = imagecreatefromgif ($imgname);
			break;
			case "png":
			  $img_src = imagecreatefrompng ($imgname);
			break;
		}
		$true_width = imagesx($img_src);
		$true_height = imagesy($img_src);
    if(($true_width < $size ) and ( $true_height< $size))
        ($true_width >$true_height)? $size=$true_width: $size=$true_height;        
		if ($true_width>=$true_height) {
			$width=$size;
			$height = ($width/$true_width)*$true_height;
		} else {
      if($size >=$true_width) {
         if($true_height > $size) {
              $width=($true_width/$true_height)*$true_width;
              $height=$size;
           }else {    
              if($true_height == $size) {
                $width=$true_width;
                $height=$size;
              } else {
                $width=$size;
                $height = ($width/$true_width)*$true_height;
              }
           }     
       } else {
          $width=$size;
          $height = ($width/$true_width)*$true_height;
       }
		}
		$img_des = ImageCreateTrueColor($width,$height);
		imagecopyresampled ($img_des, $img_src, 0, 0, 0, 0, $width, $height, $true_width, $true_height);

		// Save the resized image
		switch($filetype) {
			case "jpeg":
			case "jpg":
			 imagejpeg($img_des,$filename,80);
			break;
			case "gif":
			 imagegif($img_des,$filename,80);
			break;
			case "png":
			 imagepng($img_des,$filename,80);
			break;
		}
	}
         
  function getFileExtension($str) {
    $i = strrpos($str,".");
    if (!$i) { return ""; }
    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
  }
    
  function generateUniqueFilename($fileName, $path='') {
    $path = empty($path) ? WWW_ROOT.'/files/' : $path;
    $no = 1;
    //arreglo el nombre si trae caracteres no validos
    $fileName=$this->reemplazarCaracteres($fileName);
    $newFileName =$fileName;
    while (file_exists("$path/".$newFileName)) {
      $no++;
      $newFileName = substr_replace($fileName, "_$no.", strrpos($fileName, "."), 1);
    }
    return $newFileName;
  }
    
  function reemplazarCaracteres($texto) {
	  static $novalidos = "áéíóúÁÉÍÓÚàèìòùÀÈÌÒÙâêîôûÂÊÎÔÛäëïöüÄËÏÖÜÇçÅåÕõØøÿñÑ ";
    static $validos = "aeiouAEIOUaeiouAEIOUaeiouAEIOUaeiouAEIOUCcAaOoOoynN_";

	  $texto=trim($texto);
	  $texto = strtolower(strtr($texto,$novalidos,$validos));
    $textolimpio = "";
    #solo caracteres alfanuméricos(letras y números),el guion bajo(_) y el guion(-)
	  for($i=0;$i<strlen($texto);$i++)
      if(ereg("[a-z0-9_.-]",$texto[$i])) $textolimpio.=$texto[$i];  
    return $textolimpio;
  }

  function marcadeagua($img_original, $img_marcadeagua, $img_nueva, $calidad) {
		# obtener datos de la fotografia
		$info_original = getimagesize($img_original);
		$anchura_original = $info_original[0];
		$altura_original = $info_original[1];
		
		# extraer el tipo de imagen según su la extension del fichero
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

		# calcular la posición donde debe copiarse la "marca de agua" en la fotografia
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
	        # cerrar las imágenes
			imagedestroy($original);
			imagedestroy($marcadeagua);
		}
  }
  /********************************************************************/
  function addError($msg) {
	  $this->errors[] = $msg;
  }
  
  function setSize($width,$height) {
    $this->fixed=true;
	  $this->wi=$width;
    $this->he=$height;      
  }
  
  function setSizetn($width,$height) {
	  $this->tnwi=$width;
    $this->tnhe=$height;      
  }
    
  function setPath($path) {
	  $this->image_location=$this->image_location.$path.'/';
  }    
  
  function getSize() {
	  if($this->fixed)
      return 'verdad';
    else
      return 'mentira';  
  }
  /******************************************************/
  function cropFixed($sourcefile, $dest_x, $dest_y, $img_nueva,$calidad) {
		#obtendremos la anchura y altura de la imagen original
		$picsize=getimagesize($sourcefile);
		$imgAncho = $picsize[0];//w
		$imgAlto  = $picsize[1];//h
		
		# extraer el tipo de imagen según su la extension del fichero
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
  /*********************************************************************/
} ?>
