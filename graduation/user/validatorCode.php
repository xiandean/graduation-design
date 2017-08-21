<?php
   if(!isset($_SESSION)) session_start();
   header("Content-type:image/png");
   $charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789';//随机因子
   $width=100;
   $height=36;
   $font="../common/templates/font/Elephant.ttf";
   $fontsize=18;
   $code='';
   $_len = strlen($charset)-1;
    for ($i=0;$i<4;$i++) {
    $code .= $charset[mt_rand(0,$_len)];
    }
   $_SESSION['code']=$code;
  
   $im=imagecreate($width,$height);
   imagefill($im,0,0,imagecolorallocate($im,mt_rand(150,250),mt_rand(150,250),mt_rand(150,250)));
   imagerectangle($im,0,0,$width-1,$height-1,imagecolorallocate($im,mt_rand(50,150),mt_rand(50,150),mt_rand(50,150)));
 
   $_x = $width / 4;
   for ($i=0;$i<4;$i++) {
     $fontcolor = imagecolorallocate($im,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
     imagettftext($im,$fontsize,mt_rand(-30,30),$_x*$i+mt_rand(1,5),$height / 1.4,$fontcolor,$font,substr($code,$i,1));
   }
 

  //线条
   for ($i=0;$i<6;$i++) {
      $color = imagecolorallocate($im,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
      imageline($im,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),$color);
   }
    
   imagepng($im);
   imagedestroy();
?>