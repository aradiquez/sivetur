<?php
/*
//ultima modificación por 24 de abril 2009
//por Henry Ferreto
//Se modificó de tal forma que se puedan crear esquinas redondeadas a las imágines, así como el ángulo o posición de las mismas.
*/
$image = $_GET['i'];
$max_width = $_GET['w'];
$max_height = $_GET['h'];

//para las curvas de las esquinas
$corner_radius = isset($_GET['radius']) ? $_GET['radius'] : 20; // The default corner radius is set to 20px
$angle = isset($_GET['angle']) ? $_GET['angle'] : 0; // The default angle is set to 0º
$topleft = (isset($_GET['topleft']) and $_GET['topleft'] == "no") ? false : true; // Top-left rounded corner is shown by default
$bottomleft = (isset($_GET['bottomleft']) and $_GET['bottomleft'] == "no") ? false : true; // Bottom-left rounded corner is shown by default
$bottomright = (isset($_GET['bottomright']) and $_GET['bottomright'] == "no") ? false : true; // Bottom-right rounded corner is shown by default
$topright = (isset($_GET['topright']) and $_GET['topright'] == "no") ? false : true; // Top-right rounded corner is shown by default
/*
$corner_radius = isset($_GET['radius']) ? $_GET['radius'] : 20; // The default corner radius is set to 20px
$angle = isset($_GET['angle']) ? $_GET['angle'] : 0; // The default angle is set to 0º
$topleft = (isset($_GET['topleft']) and $_GET['topleft'] == "s") ? true : false; // Top-left esquina no redondeada por defecto
$bottomleft = (isset($_GET['bottomleft']) and $_GET['bottomleft'] == "s") ? true : false; // Bottom-left esquina no redondeada por defecto
$bottomright = (isset($_GET['bottomright']) and $_GET['bottomright'] == "s") ? true : false ; // Bottom-right esquina no redondeada por defecto
$topright = (isset($_GET['topright']) and $_GET['topright'] == "s") ? true : false ; // Top-right esquina no redondeada por defecto
*/

$picture_location = $image;

$picture_save = str_replace($image, array(".jpg", ".jpeg", ".gif", ".png"), ".temp");

$im_size = GetImageSize ( $picture_location);
$imageWidth = $im_size[0];
$imageHeight = $im_size[1];

if (eregi('.jpg', $picture_location) || eregi('.jpeg', $picture_location)) { //If file is a JPG
  $im2 = ImageCreateFromJPEG($picture_location);
} elseif (eregi('.gif', $picture_location)) { //If file is a GIF
  $im2 = ImageCreateFromGIF($picture_location);
} elseif (eregi('.png', $picture_location)) { //If file is a PNG
  $im2 = ImageCreateFromPNG($picture_location);
}
  $x_ratio = $max_width / $imageWidth;
  $y_ratio = $max_height / $imageHeight;

  if ( ($imageWidth <= $max_width) || ($imageHeight <= $max_height) ) {
    $tn_width = $imageWidth;
    $tn_height = $imageWeight;
  }


  if (($x_ratio * $imageHeight) < $max_height) {
    $tn_height = ceil($x_ratio * $imageHeight);
    $tn_width = $max_width;
  }
  else {
    $tn_width = ceil($y_ratio * $imageWidth);
    $tn_height = $max_height;
  }
  
if (eregi('.jpg', $picture_location) || eregi('.jpeg', $picture_location)) { //If file is a JPG
		$im = imageCreateTrueColor( $tn_width, $tn_height );
}else{
	
	//AGREGADO POR HEFE, 07 DE DICIEMBRE 2007, PARA EL MANEJO DE IMAGENES TRANSPARENTES
	$colorTransparent = imagecolortransparent($im2);
				   
	$im = imagecreate($tn_width, $tn_height);
				   
	imagepalettecopy($im, $im2);
	imagefill($im, 0, 0, $colorTransparent);
	imagecolortransparent($im, $colorTransparent);
	//FIN DE MANEJO DE IMAGENES TRANSPARENTES
}

if($bottomleft==true){

/*==== ==== ==== ==== ==== ==== ==== ==== ==== ==== ==== ==== ==== ==== */
//$bottomleft=true;
//$corner_radius=40;
$rounded="rounded/roundedcorner".$corner_radius.".png";
$corner_source = imagecreatefrompng($rounded);
$corner_width = imagesx($corner_source);  
$corner_height = imagesy($corner_source);  
$corner_resized = ImageCreateTrueColor($corner_radius, $corner_radius);
ImageCopyResampled($corner_resized, $corner_source, 0, 0, 0, 0, $corner_radius, $corner_radius, $corner_width, $corner_height);
$corner_width = imagesx($corner_resized);  
$corner_height = imagesy($corner_resized);  
//$iim = imagecreatetruecolor($corner_width, $corner_height);  

//$image1 = $im2; //imagecreatefromjpeg($images_dir . $image_file); // replace filename with $_GET['src'] 
$size = getimagesize($image); // replace filename with $_GET['src'] 
$white = ImageColorAllocate($im,255,255,255);
$black = ImageColorAllocate($im,0,0,0);


// Top-left corner
if ($topleft == true) {
    $dest_x = 0;  
    $dest_y = 0;  
    imagecolortransparent($corner_resized, $black); 
    imagecopymerge($im2, $corner_resized, $dest_x, $dest_y, 0, 0, $corner_width, $corner_height, 100);
} 
// Bottom-left corner
if ($bottomleft == true) {
    $dest_x = 0;  
    $dest_y = $size[1] - $corner_height; 
    $rotated = imagerotate($corner_resized, 90, 0);
    imagecolortransparent($rotated, $black); 
    imagecopymerge($im2, $rotated, $dest_x, $dest_y, 0, 0, $corner_width, $corner_height, 100);  
}

// Bottom-right corner
if ($bottomright == true) {
    $dest_x = $size[0] - $corner_width;  
    $dest_y = $size[1] - $corner_height;  
    $rotated = imagerotate($corner_resized, 180, 0);
    imagecolortransparent($rotated, $black); 
    imagecopymerge($im2, $rotated, $dest_x, $dest_y, 0, 0, $corner_width, $corner_height, 100);  
}

// Top-right corner
if ($topright == true) {
    $dest_x = $size[0] - $corner_width;  
    $dest_y = 0;  
    $rotated = imagerotate($corner_resized, 270, 0);
    imagecolortransparent($rotated, $black); 
    imagecopymerge($im2, $rotated, $dest_x, $dest_y, 0, 0, $corner_width, $corner_height, 100);  
}

// por si quiere que queda cortada de lada
//$im2 = imagerotate($im2, $angle, $white);

/*==== ==== ==== ==== ==== ==== ==== ==== ==== ==== ==== ==== ==== ==== */
}//fin de si se necesita redondear esquinas

ImageCopyResampled ($im,$im2, 0, 0, 0, 0, $tn_width, $tn_height,$imageWidth, $imageHeight);

// Rotate image
if($angle>0){
    $im = imagerotate($im, $angle, $white);
}
if (eregi('.jpg', $picture_location) || eregi('.jpeg', $picture_location)) { //If file is a JPG
  Header("Content-type: image/jpeg");
  Imagejpeg($im,'',100); //to print to screen
  Imagejpeg($im,$picture_save,100);
} elseif (eregi('.gif', $picture_location)) { //If file is a GIF
  Header("Contrnt-type: image/gif");
  Imagegif($im,'',100);
  Imagegif($im,$picture_save,100);
} elseif (eregi('.png', $picture_location)) { //If file is a PNG
  Header("Content-type: image/png");
  Imagepng($im,'',100);
  Imagepng($im,$picture_save,100);
}



ImageDestroy($im);
ImageDestroy ($im2);


@unlink(".temp");
?>