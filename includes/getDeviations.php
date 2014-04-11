<?php
include 'getThumbnail.php';

function getDeviations($url, $limit = null, $start = 0, $loadmore = false) {
    // Thanks: http://forums.phpfreaks.com/topic/108035-solved-problem-with-functionsimplexml-load-file/
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_USERAGENT, 'JaL-User-Agent');
    curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $feed      = simplexml_load_string(curl_exec($curl));
    $channel   = $feed->channel;
    $i         = 0;
    $html      = '';

    foreach($channel->item as $item) {
        if($i < $start) { $i++; continue; }
        if(isset($limit) && $i == $start + $limit) break;

        $title = (String)$item->title;
        $image = (String)$item->children('media', true)->content->attributes()->url;
        $thumb = getThumbnail($image, $loadmore);

        $html .= "<a href=\"$image\" class=\"imagebox\"><img src=\"$thumb\" alt=\"$title\" title=\"$title\"/></a>";
        $i++;
    }

    return $html;
}