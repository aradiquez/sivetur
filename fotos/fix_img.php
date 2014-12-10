<?php
$picture_location = $_GET['i'];

if (eregi('.jpg', $picture_location) || eregi('.jpeg', $picture_location)) { //If file is a JPG
  $image = ImageCreateFromJPEG($picture_location);
} elseif (eregi('.gif', $picture_location)) { //If file is a GIF
  $image = ImageCreateFromGIF($picture_location);
} elseif (eregi('.png', $picture_location)) { //If file is a PNG
  $image = ImageCreateFromPNG($picture_location);
}

$picture_save = str_replace($image, array(".jpg", ".jpeg", ".gif", ".png"), ".temp");
 
$thumb_width = $_GET['w'];
$thumb_height = $_GET['h'];
 
$width = imagesx($image);
$height = imagesy($image);
 
$original_aspect = $width / $height;
$thumb_aspect = $thumb_width / $thumb_height;
 
if ( $original_aspect >= $thumb_aspect )
{
   // If image is wider than thumbnail (in aspect ratio sense)
   $new_height = $thumb_height;
   $new_width = $width / ($height / $thumb_height);
}
else
{
   // If the thumbnail is wider than the image
   $new_width = $thumb_width;
   $new_height = $height / ($width / $thumb_width);
}
 
$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );
 
// Resize and crop
imagecopyresampled($thumb,
                   $image,
                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                   0, 0,
                   $new_width, $new_height,
                   $width, $height);
                   
                   
if (eregi('.jpg', $picture_location) || eregi('.jpeg', $picture_location)) { //If file is a JPG
 Header("Content-type: image/jpeg");
 Imagejpeg($thumb,'',100); //to print to screen
 Imagejpeg($thumb,$picture_save,100);
} elseif (eregi('.gif', $picture_location)) { //If file is a GIF
 Header("Contrnt-type: image/gif");
 Imagegif($thumb,'',100);
 Imagegif($thumb,$picture_save,100);
} elseif (eregi('.png', $picture_location)) { //If file is a PNG
 Header("Content-type: image/png");
 Imagepng($thumb,'',100);
 Imagepng($thumb,$picture_save,100);
}



ImageDestroy($thumb);
ImageDestroy ($image);

@unlink(".temp");                   
                   
#imagejpeg($thumb, $filename, 80);
?>