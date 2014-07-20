<?php
function getOrientation($url) {
    $imagesize = getimagesize($url);
    $w = $imagesize[0];
    $h = $imagesize[1];

    if($w < $h) {
        return 'portrait';
    } elseif ($w > $h) {
        return 'landscape';
    } else {
        return 'portrait';
    }
}