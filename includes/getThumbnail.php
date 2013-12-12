<?php
function getThumbnail($url, $loadmore = false) {
    $up     = ($loadmore) ? '../' : '';
    $file   = substr(substr(strrchr($url, '/'), 1), 0, -4);
    $exists = file_exists($up . "img/thumb/$file.jpg");

    if(!$exists) {
        $img = new Imagick($url);
        $img->cropThumbnailImage(370, 370);
        $img->setImageCompression(Imagick::COMPRESSION_JPEG);
        $img->setImageCompressionQuality(30);
        $img->setImageFormat('jpg');
        $img->stripImage();
        $img->writeImage($up . "img/thumb/$file.jpg");
    }

    return $up . "img/thumb/$file.jpg";
}