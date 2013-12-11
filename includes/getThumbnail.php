<?php
function getThumbnail($url) {
    $file   = substr(substr(strrchr($url, '/'), 1), 0, -4);
    $exists = file_exists("img/thumb/$file.jpg");

    if(!$exists) {
        $img = new Imagick($url);
        $img->cropThumbnailImage(370, 370);
        $img->setImageCompression(Imagick::COMPRESSION_JPEG);
        $img->setImageCompressionQuality(30);
        $img->setImageFormat('jpg');
        $img->stripImage();
        $img->writeImage("img/thumb/$file.jpg");
    }

    return "img/thumb/$file.jpg";
}