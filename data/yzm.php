<?php
session_start();
$image=imagecreatetruecolor(100,30);
$bgcolor=imagecolorallocate($image,255,255,255);
imagefill($image,0,0,$bgcolor);
$content="ASDFGHJKLZXCVBNMQWERTYUIOPasdfghjklzxcvbnmqwertyuiop";
$captcha="";
for($i=0;$i<4;i++){
    $fontcolor =imagecolorallocate($image,mt_rand(0,120),
    mt_rand(0,120),mt_rand(0,120));
    $fontcontent=substr($content,mt_rand(0,strlen($content)),1);
    $x=($i*100/4)+mt_rand(5,10);
    $y=mt_rand(5,10);
    imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
}
for ($i = 0; $i < 200; $i++) {
    $pointcolor = imagecolorallocate($image, mt_rand(50, 200), mt_rand(50, 200), mt_rand(50, 200));
    imagesetpixel($image, mt_rand(1, 99), mt_rand(1, 29), $pointcolor);
}
//4.4 设置干扰线
for ($i = 0; $i < 3; $i++) {
    $linecolor = imagecolorallocate($image, mt_rand(50, 200), mt_rand(50, 200), mt_rand(50, 200));
    imageline($image, mt_rand(1, 99), mt_rand(1, 29), mt_rand(1, 99), mt_rand(1, 29), $linecolor);
}
//5.向浏览器输出图片头信息
header('content-type:image/png');
//6.输出图片到浏览器
imagepng($image);
//7.销毁图片
imagedestroy($image);


?>


