<?php
$post = $_POST;
$data = array();
$i = 0;
$base = ImageCreateTrueColor(756, 73);
foreach($post as $key=>$value){
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
  }

  $digit = ImageCreateFromPng("../img/" . $name . ".png");
  ImageCopy($base, $digit, $i * 54, 0, 0, 0, 54, 73);
  imagedestroy($digit);
  $i = $i + 1;
 
}
header("Content-Type: image/png");
imagepng($base);
imagedestroy($base);
?>
