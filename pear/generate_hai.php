<?php
$post = $_POST;
$data = array();
$i = 0;
$base = ImageCreateTrueColor(1500, 73);
imagefill($base , 0 , 0 , 0xFFFFFF);
$vertical_count = 0;
$vertical_array =array();
foreach($post as $key=>$value) {
  if (preg_match("/^dir*/", $key)) {
    if ($value == 2) {
      $rep = substr_replace($key, 'hai', 0, 3);
      array_push($vertical_array, $rep);
    }
  }
}

foreach($post as $key=>$value){
 $degrees = 0;
 $vertical_flag = false;
 if (preg_match("/^hai*/", $key)) {
   if ($value <= 9 ) {
       $name = $value . "m";
   } elseif ($value <= 18) {
       $name = ($value - 9) . "s";
   } elseif ($value <= 27) {
       $name = ($value - 18) . "p";
   } elseif ($value == 28) {
       $name = "ton";

   } elseif ($value == 29) {
       $name = "nan";

   } elseif ($value == 30) {
       $name = "sya";
   } elseif ($value == 31) {
       $name = "pe";
   } elseif ($value == 32) {
       $name = "haku";
   } elseif ($value == 33) {
       $name = "hatsu";
   } elseif ($value == 34) {
       $name = "tyun";
   } elseif ($value == 35) {
       $name = "a5m";
   } elseif ($value == 36) {
       $name = "a5s";
   } elseif ($value == 37) {
       $name = "a5p";
   } elseif ($value == 38) {
       $name = "ura";
   } elseif ($value ==39) {
       $name = "back";
   }

   foreach ($vertical_array as $value) {
     if ($key == $value ) {
       $degrees = 90;
       $vertical_flag = true;
     } 
   }
   
   $dig = ImageCreateFromPng("../img/" . $name . ".png");
   $digit = imagerotate($dig, $degrees, 0);
   if ($vertical_flag) {
     ImageCopy($base, $digit, $i * 54 + $vertical_count * 19, 19, 0, 0, 73, 73);
     $vertical_count += 1;
   } else {
     ImageCopy($base, $digit, $i * 54 + $vertical_count * 19, 0, 0, 0, 54, 73);
   }

   imagedestroy($digit);
   $i = $i + 1;
 }

}
header("Content-Type: image/png");
imagepng($base);
imagedestroy($base);
?>
